<?php

namespace App\Http\Controllers;

use App\Models\TravelPost;
use App\Models\TravelPostImage;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TravelPostController extends Controller
{
    public function index()
    {
        $posts = TravelPost::with([
            'destination.regency.province',
            'user',
            'images'
        ])
        ->where('is_published', true)
        ->latest()
        ->get();

        return view('travel-posts.index', compact('posts'));
    }

    public function create()
    {
        $destinations = Destination::with('regency.province')
            ->orderBy('name')
            ->get();

        return view('travel-posts.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => [
                'required',
                'exists:destinations,id'
            ],

            'title' => [
                'required',
                'string',
                'max:150'
            ],

            'content' => [
                'required',
                'string',
                'max:5000'
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5'
            ],

            'photos' => [
                'required',
                'array',
                'min:1',
                'max:10'
            ],

            'photos.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Buat Travel Experience
        |--------------------------------------------------------------------------
        */

        $post = TravelPost::create([
            'user_id' => Auth::id(),
            'destination_id' => $validated['destination_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'is_published' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Simpan semua foto
        |--------------------------------------------------------------------------
        */

        foreach ($request->file('photos') as $index => $photo) {

            $path = $photo->store(
                'travel-posts',
                'public'
            );

            TravelPostImage::create([
                'travel_post_id' => $post->id,
                'image' => $path,
                'sort_order' => $index,
            ]);
        }

        return redirect()
            ->route('travel-posts.show', $post->id)
            ->with(
                'success',
                'Travel Experience berhasil dibagikan.'
            );
    }

    public function show($id)
    {
        $post = TravelPost::with([
            'destination.regency.province',
            'user',
            'images'
        ])
        ->where('is_published', true)
        ->findOrFail($id);

        return view('travel-posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = TravelPost::with('images')
            ->findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus cover jika ada
        |--------------------------------------------------------------------------
        */

        if ($post->cover_image) {
            Storage::disk('public')
                ->delete($post->cover_image);
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus semua foto Travel Experience
        |--------------------------------------------------------------------------
        */

        foreach ($post->images as $image) {

            Storage::disk('public')
                ->delete($image->image);
        }

        $post->delete();

        return redirect()
            ->route('travel-posts.index')
            ->with(
                'success',
                'Travel Experience berhasil dihapus.'
            );
    }
}