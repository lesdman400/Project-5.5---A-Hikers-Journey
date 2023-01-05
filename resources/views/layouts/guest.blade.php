<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite([
        'resources/js/Helpers/sessionHelper.js',
        'resources/css/app.css', 
        'resources/css/index.css',
        'resources/js/app.js',
         ])

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- JQuery 3.5.1 SRI Hashed -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
        <!-- Bootstrap 5.1.3 SRI Hashed -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Font Awesome 4.7.0 SRI Hashed -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon/favicon-16x16.png">
        <link rel="manifest" href="../Images/favicon/site.webmanifest">
        <!-- Title -->
        <title>Bubs PCT2022</title>
        <!-- Scroll to top on page load -->
        <script>
            window.onbeforeunload = function () {
                window.scrollTo({top: 0});
            }
        </script>
        <!-- Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-BQ77V809W2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-BQ77V809W2');
        </script> -->
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>

    @vite([
        'resources/js/index.js',
        'resources/js/blog.js',
        'resources/js/bootstrap.js',
        'resources/js/fitbit.js'
        ])
</html>
