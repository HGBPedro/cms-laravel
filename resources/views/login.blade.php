<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @inject('storage', 'Illuminate\Support\Facades\Storage')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('js/app.js') }}" />

        @vite('resources/css/app.css')

        <!-- Styles -->

    </head>
    <body class="antialiased">
        <div class="login">
            <form method='POST' action='/login'>
                <img class="login__icon" src="{{ asset('/storage/company_logo.png') }}" alt='company logo of a construcion site and the company name as "Terraplana"' />
                @csrf
                <div class="login__field">
                    <label class="login__label" for='email'>E-mail</label>
                    <input class="login__input" type='text' name='email' required/>
                </div>
                <div class="login__field">
                    <label class="login__label" for='password'>Senha</label>
                    <input class="login__input" type='password' name='password' required/>
                </div>
                <button class="login__button" type='submit'>Enviar</button>
            </form>
        </div>
    </body>
</html>
