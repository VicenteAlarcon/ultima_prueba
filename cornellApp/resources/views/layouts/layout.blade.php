<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>GlobalDoc</title>
</head>
<div class="container-fluid" id="body">
    <div class="row">

        <body>


            <header class="col-12" id="layout_header">
                @include('partials.nav')
            </header>


            <aside class="col-2">
                @include('partials.aside')
            </aside>


            <main class="col-10">
                @yield('content')
            </main>
            <footer class="col-12">
                @include('partials.footer')
            </footer>
        </body>
    </div>
</div>

</html>