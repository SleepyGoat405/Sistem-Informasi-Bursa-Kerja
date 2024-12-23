@extends('layouts.navigation')

@section('content')
<style>
    .developer-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin: 20px 0;
    }

    .developer-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    .developer-card img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 15px;
    }

    .developer-card h3 {
        font-size: 1.5rem;
        color: #007BFF;
        margin-bottom: 10px;
    }

    .developer-card p {
        font-size: 1rem;
        color: #555;
        margin: 5px 0;
    }
</style>

<div class="container">
    <h1 class="text-center">About Our Developers</h1>
    <div class="developer-list">
        @forelse ($developers as $developer)
            <div class="developer-card">
                @if ($developer->gambar)
                    <img src="{{ asset('storage/' . $developer->gambar) }}" alt="{{ $developer->nama }}">
                @else
                    <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar">
                @endif
                <h3>{{ $developer->nama }}</h3>
                <p><strong>NIM:</strong> {{ $developer->nim }}</p>
                <p><strong>Jurusan:</strong> {{ $developer->jurusan }}</p>
                <p><strong>Prodi:</strong> {{ $developer->prodi }}</p>
                <p><strong>Peran</strong> {{ $developer->peran }}</p>
            </div>
        @empty
            <p class="text-center">Belum ada data developer.</p>
        @endforelse
    </div>
</div>
@endsection
