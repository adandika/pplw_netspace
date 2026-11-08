<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // # MENAMBAHKAN KOLOM USERNAME DAN ROLE
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Menambahkan username yang harus unik.
            $table->string('username')->unique()->after('name');

            // Menentukan jenis akun pengguna.
            $table->enum('role', ['admin', 'customer'])
                  ->default('customer')
                  ->after('password');

        });
    }

    // # MEMBATALKAN PENAMBAHAN KOLOM
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Menghapus kolom jika migration dibatalkan.
            $table->dropColumn(['username', 'role']);

        });
    }
};
