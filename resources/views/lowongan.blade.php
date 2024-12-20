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

    .job-list {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        justify-items: center;
    }

    .job-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 400px;
        width: 100%;
        text-align: left;
        animation: slideIn 1.2s ease-in-out;
    }

    .job-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .job-card h3 {
        font-size: 1.5rem;
        color: #007BFF;
        margin-bottom: 10px;
    }

    .job-card p {
        font-size: 1rem;
        color: #555;
        margin: 5px 0;
    }

    .apply-button {
        margin-top: 10px;
        display: inline-block;
        background-color: #28a745;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .apply-button:hover {
        background-color: #218838;
    }

    @keyframes slideIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<div class="header-container">
    <div class="search-container">
        <form method="GET" action="{{ route('lowongan') }}">
            <input type="text" name="search" class="search-input" placeholder="Cari lowongan...">
        </form>
    </div>
</div>

<div class="job-list">
    @forelse ($lowongan as $job)
        <div class="job-card">
            <h3>{{ $job->judul_pekerjaan }}</h3>
            <p><strong>Perusahaan:</strong> {{ $job->perusahaan->nama }}</p>
            <p><strong>Posisi:</strong> {{ $job->posisi }}</p>
            <p><strong>Gaji:</strong> Rp{{ number_format($job->gaji, 0, ',', '.') }}</p>
            <p>{{ $job->deskripsi }}</p>
            <a href="{{ route('lamaran.create', ['lowongan_id' => $job->id]) }}" class="apply-button">Lamar Sekarang</a>
        </div>
    @empty
        <p>Tidak ada lowongan yang tersedia.</p>
    @endforelse
</div>
@endsection