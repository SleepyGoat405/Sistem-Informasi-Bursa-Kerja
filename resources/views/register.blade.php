<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            width: 350px;
            text-align: center;
        }

        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ffffff;
        }

        .form-control {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-control label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #ffffff;
        }

        .form-control input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .form-control input::placeholder {
            color: #d1d1d1;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #ff6a00, #ee0979);
            border: none;
            border-radius: 6px;
            font-size: 16px;
            color: #ffffff;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        .login-link {
            margin-top: 15px;
            font-size: 14px;
            color: #ffffff;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-control">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>

            <div class="form-control">
                <label for="notelp">No Telp</label>
                <input type="text" name="notelp" id="notelp" placeholder="Enter your phone number" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <a href="{{ route('login') }}" class="login-link">Already have an account? Login here</a>
    </div>
</body>

</html>