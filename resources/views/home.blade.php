@extends('layouts.navigation')

@section('content')
<style>
    .hero {
        text-align: center;
        padding: 50px 20px;
        background: linear-gradient(to right, #4facfe, #00f2fe);
        color: white;
        border-radius: 10px;
        margin-bottom: 30px;
        animation: fadeIn 1.5s ease-in-out;
    }

    .hero h1 {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .hero p {
        font-size: 1.2rem;
    }

    .features-container {
        width: 97vw;
        display: flex;
        justify-content: center;
    }

    .features {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80vw;
        gap: 20px;
    }

    .feature {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
    }

    .feature:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .feature h3 {
        font-size: 1.5rem;
        color: #007BFF;
        margin-bottom: 10px;
    }

    .feature p {
        color: #555;
        font-size: 1rem;
    }

    .cta {
        margin-top: 40px;
        text-align: center;
    }

    .cta button {
        background: #007BFF;
        color: white;
        margin: 0 10px;
        padding: 15px 30px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .cta button:hover {
        background: #0056b3;
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<div class="hero">
    <h1>Selamat Datang di Bursa Kerja</h1>
    <p>Tempat terbaik untuk mencari pekerjaan impianmu atau menemukan talenta terbaik untuk perusahaanmu.</p>
</div>
<div class="features-container">
    <div class="features">
        <div class="feature">
            <h3>Ratusan Lowongan</h3>
            <p>Jelajahi berbagai peluang kerja yang sesuai dengan keahlianmu dari berbagai perusahaan terpercaya.</p>
        </div>
        <div class="feature">
            <h3>Perusahaan Terbaik</h3>
            <p>Cari banyak perusahaan ternama yang bagus dan berkualitas</p>
        </div>
        <div class="feature">
            <h3>Dukungan Penuh</h3>
            <p>Dapatkan bantuan dan dukungan teknis kapan saja untuk memaksimalkan pengalamanmu.</p>
        </div>
    </div>
</div>

<div class="cta">
    <button onclick="window.location.href='/lowongan'">Jelajahi Lowongan</button>
    <button onclick="window.location.href='/perusahaan'">Lihat Perusahaan</button>
</div>
@endsection