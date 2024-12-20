<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Market Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1.5s ease-in-out;
            max-width: 900px;
            width: 100%;
        }

        .dashboard h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #007BFF;
            margin-bottom: 20px;
            animation: slideIn 1.2s ease-in-out;
        }

        .dashboard p {
            text-align: center;
            font-size: 1.1rem;
            color: #555;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .grid-item {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .grid-item h3 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 10px;
        }

        .grid-item p {
            text-align: start;
            font-size: 1rem;
            color: #666;
        }

        .grid-item a {
            text-decoration: none;
            font-weight: bold;
            color: white;
        }

        .grid-item a:hover {
            text-decoration: underline;
        }

        .button {
            margin-top: 20px;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 200ms ease;
        }

        .button:hover {
            background-color: rgba(50, 100, 150);
        }

        .logout-button {
            margin-top: 20px;
            display: inline-block;
            background-color: #FF4B4B;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #d43d3d;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <h1>Selamat Datang, {{ session('user')->name }}</h1>
        <p>Kembangkan Bakatmu, Buat Karirmu, Wujudkan Impianmu</p>

        <div class="grid-container">
            <div class="grid-item">
                <h3>SINBUKER</h3>
                <p>Dapat kerja lebih mudah dengan ratusan lowongan di SINBUKER (Sistem Informasi Bursa Kerja)</p>
                <button class="button"><a href="/home">Jelajahi Sekarang</a></button>
            </div>
        </div>
        <a href="/logout" class="logout-button">Logout</a>
    </div>
</body>

</html>