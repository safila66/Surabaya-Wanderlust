<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function publicProfile($username)
    {
        $user = \App\Models\User::where('username', $username)->firstOrFail();
        $reviews = $user->reviews()->with('reviewable')->latest()->get();
        $posts = $user->travelPosts()->with('destination')->latest()->get();
        $wishlist = $user->wishlist()->with('regency')->get();
        return view('profile.public', compact('user', 'reviews', 'posts', 'wishlist'));
    }

    public function show(Request $request)
    {
        $user = $request->user();

        // Nama relasi ini harus ada di model User (lihat file user_model_and_routes.php)
        $reviews  = $user->reviews()->with('reviewable')->latest()->get();
        $posts    = $user->travelPosts()->with('destination')->latest()->get();
        $wishlist = $user->wishlist()->with('regency')->get();

        // Daftar sesi hanya ada kalau SESSION_DRIVER=database
        $sessionsSupported = config('session.driver') === 'database';
        $sessions = collect();

        if ($sessionsSupported) {
            $sessions = DB::table(config('session.table', 'sessions'))
                ->where('user_id', $user->id)
                ->orderByDesc('last_activity')
                ->get()
                ->map(fn ($s) => (object) [
                    'device'      => $this->describeAgent((string) $s->user_agent),
                    'ip'          => $s->ip_address,
                    'is_current'  => $s->id === $request->session()->getId(),
                    'last_active' => Carbon::createFromTimestamp($s->last_activity),
                ]);
        }

        return view('profile.show', compact(
            'user', 'reviews', 'posts', 'wishlist', 'sessionsSupported', 'sessions'
        ));
    }

    /** Dipakai oleh form Edit profile (modal) dan form ganti email. */
    public function update(Request $request)
    {
        $user = $request->user();

        if ($request->has('username')) {
            $request->merge(['username' => strtolower(trim((string) $request->input('username')))]);
        }
        if ($request->filled('website') && !preg_match('#^https?://#i', $request->input('website'))) {
            $request->merge(['website' => 'https://' . trim($request->input('website'))]);
        }

        $data = $request->validateWithBag('profile', [
            'name'     => ['sometimes', 'required', 'string', 'max:60'],
            'username' => ['sometimes', 'required', 'string', 'max:20', 'regex:/^[a-z0-9_]+$/',
                           Rule::unique('users', 'username')->ignore($user->id)],
            'email'    => ['sometimes', 'required', 'email', 'max:255',
                           Rule::unique('users', 'email')->ignore($user->id)],
            'bio'      => ['nullable', 'string', 'max:160'],
            'location' => ['nullable', 'string', 'max:60'],
            'website'  => ['nullable', 'url', 'max:120'],
            'is_private' => ['nullable', 'boolean'],
            'avatar'   => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'banner'   => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:5120'],
        ], [
            'username.regex' => 'Username hanya boleh huruf kecil, angka, dan underscore.',
        ]);

        // Foto: upload baru, hapus, atau biarkan
        foreach (['avatar', 'banner'] as $field) {
            if ($request->hasFile($field)) {
                if ($user->{$field}) {
                    Storage::disk('public')->delete($user->{$field});
                }
                $data[$field] = $request->file($field)->store($field . 's', 'public');
            } elseif ($request->boolean('remove_' . $field)) {
                if ($user->{$field}) {
                    Storage::disk('public')->delete($user->{$field});
                }
                $data[$field] = null;
            } else {
                unset($data[$field]);
            }
        }

        $data['is_private'] = $request->boolean('is_private');
        $user->forceFill($data)->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    public function password(Request $request)
    {
        $request->validateWithBag('password', [
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $request->user()->forceFill([
            'password' => Hash::make($request->input('password')),
        ])->save();

        return redirect(route('profile.show') . '#settings-password')
            ->with('success', 'Password berhasil diubah.');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();

        abort_if($user->role === 'admin', 403, 'Akun admin tidak bisa dihapus.');

        $request->validateWithBag('delete', [
            'password' => ['required', 'current_password'],
        ]);

        foreach (['avatar', 'banner'] as $field) {
            if ($user->{$field}) {
                Storage::disk('public')->delete($user->{$field});
            }
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Review & cerita ikut terhapus kalau foreign key-nya pakai cascadeOnDelete()
        $user->delete();

        return redirect('/')->with('success', 'Akunmu sudah dihapus.');
    }

    /** Keluarkan semua perangkat lain (hanya untuk SESSION_DRIVER=database). */
    public function destroySessions(Request $request)
    {
        $request->validateWithBag('sessions', [
            'password' => ['required', 'current_password'],
        ]);

        if (config('session.driver') === 'database') {
            DB::table(config('session.table', 'sessions'))
                ->where('user_id', $request->user()->id)
                ->where('id', '!=', $request->session()->getId())
                ->delete();
        }

        return redirect(route('profile.show') . '#settings-sessions')
            ->with('success', 'Semua perangkat lain sudah dikeluarkan.');
    }

    private function describeAgent(string $ua): string
    {
        $browser = match (true) {
            str_contains($ua, 'Edg')     => 'Edge',
            str_contains($ua, 'Chrome')  => 'Chrome',
            str_contains($ua, 'Firefox') => 'Firefox',
            str_contains($ua, 'Safari')  => 'Safari',
            default                      => 'Browser',
        };

        $os = match (true) {
            str_contains($ua, 'Windows') => 'Windows',
            str_contains($ua, 'Android') => 'Android',
            str_contains($ua, 'iPhone'),
            str_contains($ua, 'iPad')    => 'iOS',
            str_contains($ua, 'Mac')     => 'macOS',
            str_contains($ua, 'Linux')   => 'Linux',
            default                      => 'Unknown',
        };

        return "$browser di $os";
    }
}