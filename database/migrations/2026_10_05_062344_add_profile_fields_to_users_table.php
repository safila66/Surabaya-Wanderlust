<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /** Username yang tidak boleh diberikan otomatis ke user lama (sama dengan ProfileController). */
    private const RESERVED = ['admin', 'administrator', 'support', 'root', 'system', 'staff', 'moderator'];

    public function up(): void
    {
        // Tiap kolom dicek dulu, jadi aman walau sebagian sudah ada
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username', 20)->nullable()->unique()->after('name');
            }
            if (!Schema::hasColumn('users', 'bio')) {
                $table->string('bio', 160)->nullable();
            }
            if (!Schema::hasColumn('users', 'location')) {
                $table->string('location', 60)->nullable();
            }
            if (!Schema::hasColumn('users', 'website')) {
                $table->string('website', 120)->nullable();
            }
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable();
            }
            if (!Schema::hasColumn('users', 'banner')) {
                $table->string('banner')->nullable();
            }
        });

        // Isi username untuk user yang sudah ada, diambil dari bagian depan email-nya
        $taken = DB::table('users')->whereNotNull('username')->pluck('username')->all();

        DB::table('users')->whereNull('username')->orderBy('id')->get()->each(function ($user) use (&$taken) {
            $base = Str::of(Str::before($user->email, '@'))
                ->lower()
                ->replaceMatches('/[^a-z0-9_]/', '')
                ->limit(15, '')
                ->toString();

            // Minimal 3 karakter dan bukan nama yang dicadangkan
            if (strlen($base) < 3 || in_array($base, self::RESERVED, true)) {
                $base = 'user' . $user->id;
            }

            $username = $base;
            $i = 1;
            while (in_array($username, $taken, true)) {
                $username = $base . $i++;
            }

            $taken[] = $username;
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
        });
    }

    public function down(): void
    {
        $columns = array_values(array_filter(
            ['username', 'bio', 'location', 'website', 'avatar', 'banner'],
            fn ($col) => Schema::hasColumn('users', $col)
        ));

        if ($columns) {
            Schema::table('users', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }
};