@extends('layouts.navigation')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #007BFF;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }

    .form-group textarea {
        height: 100px;
    }

    .submit-button {
        background: #28a745;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        display: block;
        width: 100%;
        transition: background 0.3s ease;
    }

    .submit-button:hover {
        background: #218838;
    }
</style>

<div class="form-container">
    <h2>Lamar Pekerjaan</h2>
    <form action="{{ route('lamaran.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul_pekerjaan">Judul Pekerjaan</label>
            <input type="text" id="judul_pekerjaan" value="{{ $lowongan->judul_pekerjaan }}" disabled>
            <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
        </div>
        <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea id="catatan" name="catatan" placeholder="Tambahkan catatan untuk lamaran ini..."
                required></textarea>
        </div>
        <button type="submit" class="submit-button">Kirim Lamaran</button>
    </form>
</div>
@endsection