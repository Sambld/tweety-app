<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <section class="px-8 py-4">
        <header class="container mx-auto flex justify-between">
            <div>
                <h1>
                    <img src="/images/logo.svg" alt="tweety">
                </h1>
            </div>
            @if(auth()->user())


                <div>
                    <form action="/logout" method="post">
                        @csrf
                        <a href="/logout"> <input type="submit"
                                                  class="py-2 px-4 text-white rounded-xl bg-blue-400 border border-green-200"
                                                  value="logout"></a>

                    </form>
                </div>
            @endif
        </header>

    </section>
    {{ $slot }}
</div>


</body>

</html>
