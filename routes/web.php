<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
use App\Models\Perusahaan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Models\Lowongan;

Route::get('/', function () {
    return Session::has('user') ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', function () {
    if (!Session::has('user')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');
Route::get('/logout', function () {
    Session::forget('user');
    return redirect()->route('login');
})->name('logout');


// Rute Dashboard
Route::get('/home', function () {
    if (!Session::has('user')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }
    return view('home');
})->name('home');

// Rute Perusahaan
Route::get('/perusahaan', function () {
    if (!Session::has('user')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }
    $search = request('search');
    $perusahaan = Perusahaan::query()
        ->when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%");
        })
        ->get();
    return view('perusahaan', ['perusahaan' => $perusahaan]);
})->name('perusahaan');

Route::get('/pt/{id}/lowonganpt', function ($id) {
    if (!Session::has('user')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $perusahaan = Perusahaan::with('lowongan')->findOrFail($id);

    return view('pt.lowonganpt', compact('perusahaan'));
})->name('pt.lowonganpt');

// Rute Lowongan
Route::get('/lowongan', function () {
    if (!Session::has('user')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }
    $search = request('search');
    $lowongan = Lowongan::with('perusahaan')
        ->when($search, function ($query, $search) {
            $query->where('judul_pekerjaan', 'like', "%$search%")
                ->orWhere('posisi', 'like', "%$search%");
        })
        ->get();

    return view('lowongan', compact('lowongan'));
})->name('lowongan');

Route::get('/lamaran/create/{lowongan_id}', function ($lowongan_id) {
    if (!Session::has('user')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $lowongan = Lowongan::findOrFail($lowongan_id);
    return view('lamaran.create', compact('lowongan'));
})->name('lamaran.create');

Route::post('/lamaran/store', function (Request $request) {
    $request->validate([
        'lowongan_id' => 'required|exists:lowongan,id',
        'catatan' => 'required|string',
    ]);

    Lamaran::create([
        'lowongan_id' => $request->lowongan_id,
        'pengguna_id' => Session::get('user')->id,
        'catatan' => $request->catatan,
    ]);

    return redirect()->route('lowongan')->with('success', 'Lamaran berhasil diajukan.');
})->name('lamaran.store');

// Rute About
Route::get('/about', function () {
    if (!Session::has('user')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }
    return view('about');
})->name('about');

