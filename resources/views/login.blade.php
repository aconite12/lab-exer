<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <form action="{{ route('login') }}" method="POST">
            @csrf
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
            @error('email')<span>{{ $message }}</span>@enderror

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password">
            @error('password')<span>{{ $message }}</span>@enderror

            <button type="submit">Login</button>
        </form>
    </body>
</html>
