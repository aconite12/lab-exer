<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Tourist Blog</title>

    <!-- You can add some styling here to highlight success/error messages -->
    <style>
        /* Overall Page Style */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://www.example.com/path/to/your/travel-image.jpg');
            /* Replace with your image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            margin: 0;
            text-align: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.6);
            /* Transparent black overlay */
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1em;
            font-weight: 600;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #ff9e2c;
        }

        button {
            background-color: #ff9e2c;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff7f1e;
        }

        /* Success and Error messages */
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }

        /* Footer */
        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            color: white;
            font-size: 1.2em;
        }

        .footer a {
            color: #ff9e2c;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Welcome to Our Travel Blog</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message (for failed login, etc.) -->
        @if (session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="text">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email"
                    required>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>
