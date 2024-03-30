<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('/images/background.webp') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            width: 400px; /* Adjust the width of the card as needed */
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .card img {
            width: 100%; /* Make the image inside the card take up the full width */
            border-radius: 10px;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container a {
            margin: 0 10px;
            text-decoration: none;
            color: black;
            padding: 10px 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .button-container a:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="card">
        <img src="/images/logos.png" alt="Logo Image">
        <div class="button-container">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
