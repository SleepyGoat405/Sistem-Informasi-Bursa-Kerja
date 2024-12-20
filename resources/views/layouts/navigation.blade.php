<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Layout</title>
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
        }

        header {
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease-in-out;
        }

        header h1 {
            font-size: 1.5rem;
            color: #007BFF;
            font-weight: bold;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        nav a {
            text-decoration: none;
            color: #555;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background: #007BFF;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }

        .logout-button {
            background: #FF4B4B;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .logout-button:hover {
            background: #d43d3d;
            transform: scale(1.1);
            box-shadow: 0 4px 10px rgba(255, 75, 75, 0.3);
        }

        .container {
            padding: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            nav a {
                margin: 5px 0;
            }

            header h1 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>SINBUKER</h1>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('perusahaan') }}">Perusahaan</a>
            <a href="{{ route('lowongan') }}">Lowongan</a>
            <a href="{{ route('about') }}">About</a>
            <a href="/logout" class="logout-button">Logout</a>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>