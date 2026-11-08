<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // # MENAMPILKAN HALAMAN LOGIN
    // Menampilkan satu halaman login untuk Admin dan Customer.
    public function showLogin()
    {
        return view('auth.login');
    }

    // # MENAMPILKAN HALAMAN REGISTRASI
    // Menampilkan formulir pendaftaran Customer.
    public function showRegister()
    {
        return view('auth.register');
    }

    // # MEMPROSES REGISTRASI
    // Memvalidasi dan menyimpan akun Customer baru.
    public function register(Request $request)
    {
        // Validasi data registrasi.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|alpha_dash|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'username.unique' => 'Username sudah digunakan.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Menyimpan akun baru dengan role Customer.
        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'customer',
        ]);

        // Mengarahkan Customer ke halaman login.
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // # MEMPROSES LOGIN
    // Memeriksa identitas, password, dan role pengguna.
    public function login(Request $request)
    {
        // Validasi input login.
        $validated = $request->validate([
            'identity' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari akun berdasarkan email atau username.
        $user = User::where('email', $validated['identity'])
            ->orWhere('username', $validated['identity'])
            ->first();

        // Memeriksa akun dan password.
        if (
            !$user ||
            !Auth::attempt([
                'email' => $user->email,
                'password' => $validated['password'],
            ])
        ) {
            return back()
                ->withErrors([
                    'identity' => 'Email/username atau password salah.',
                ])
                ->onlyInput('identity');
        }

        // Memperbarui session setelah login berhasil.
        $request->session()->regenerate();

        // Mengarahkan pengguna berdasarkan role.
        if ($user->role === 'admin') {
            return redirect()->route('admin.home');
        }

        if ($user->role === 'customer') {
            return redirect()->route('customer.home');
        }

        // Mengakhiri sesi jika role tidak dikenali.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->withErrors([
                'identity' => 'Role akun tidak dikenali.',
            ]);
    }

    // # MEMPROSES LOGOUT
    // Mengakhiri sesi login pengguna.
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
