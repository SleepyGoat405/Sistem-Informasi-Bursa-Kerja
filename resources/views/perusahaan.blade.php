@extends('layouts.navigation')

@section('content')
<style>
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        margin-bottom: 20px;
    }

    .search-container {
        flex: 1;
    }

    .search-input {
        width: 100%;
        max-width: 300px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 1rem;
    }

    .add-button {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .add-button:hover {
        background: linear-gradient(to right, #5e10b7, #1f60e0);
        transform: scale(1.05);
    }

    .company-list {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-top: 30px;
    }

    .company-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 300px;
        width: 100%;
        animation: slideIn 1.2s ease-in-out;
    }

    .company-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .company-card h3 {
        font-size: 1.5rem;
        color: #007BFF;
        margin-bottom: 10px;
    }

    .company-card p {
        font-size: 1rem;
        color: #555;
        margin: 5px 0;
    }

    .visit-button {
        display: inline-block;
        margin-top: 15px;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .visit-button:hover {
        background: linear-gradient(to right, #5e10b7, #1f60e0);
        transform: scale(1.05);
    }

    @keyframes slideIn {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<!-- Header: Tombol & Pencarian -->
<div class="header-container">
    <div class="search-container">
        <form action="/perusahaan" method="GET">
            <input type="text" name="search" class="search-input" placeholder="Cari perusahaan..."
                value="{{ request('search') }}">
        </form>
    </div>
</div>

<!-- Daftar Perusahaan -->
<div class="company-list">
    @foreach ($perusahaan as $item)
        <div class="company-card">
            <h3>{{ $item->nama }}</h3>
            <p><strong>Alamat:</strong> {{ $item->alamat }}</p>
            <p><strong>Telepon:</strong> {{ $item->telepon }}</p>
            <a href="{{ route('pt.lowonganpt', ['id' => $item->id]) }}" class="visit-button">Lihat Lowongan</a>
        </div>
    @endforeach
</div>
@endsection