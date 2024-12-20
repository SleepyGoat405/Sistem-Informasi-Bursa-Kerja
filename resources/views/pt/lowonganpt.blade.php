@extends('layouts.navigation')

@section('content')
<style>
    .company-header {
        text-align: center;
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .company-header h1 {
        background: white;
        padding: 10px 15px;
        border-radius: 10px;
        margin: 10px;
        width: max-content;
        color: #007BFF;
        font-size: 2rem;
    }

    .company-header p {
        font-size: 1.2rem;
        color: #555;
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
        animation: fadeIn 1.2s ease-in-out;
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

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="company-header">
    <h1>{{ $perusahaan->nama }}</h1>
    <p>{{ $perusahaan->alamat }}</p>
</div>

<div class="job-list">
    @forelse ($perusahaan->lowongan as $lowongan)
        <div class="job-card">
            <h3>{{ $lowongan->judul_pekerjaan }}</h3>
            <p><strong>Posisi:</strong> {{ $lowongan->posisi }}</p>
            <p><strong>Gaji:</strong> Rp{{ number_format($lowongan->gaji, 0, ',', '.') }}</p>
            <p>{{ $lowongan->deskripsi }}</p>
            <a href="{{ route('lamaran.create', ['lowongan_id' => $lowongan->id]) }}" class="apply-button">Lamar</a>
        </div>
    @empty
        <p>Belum ada lowongan yang tersedia untuk perusahaan ini.</p>
    @endforelse
</div>
@endsection