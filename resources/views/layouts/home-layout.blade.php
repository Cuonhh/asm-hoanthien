<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Title' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="{{ asset('logo-mona-300x75-2.png') }}" type="image/x-icon">

    @livewireStyles
    <style>
        .loading-page {
            position: fixed;
            width: 100vw;
            height: 100vh;
            background: #7374FF;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loading-page>img {
            width: 200px;
            height: auto;
        }

        .loading-page.none {
            display: none;
        }
    </style>
</head>

<body>
    <div class="loading-page">
        <img src="https://i.pinimg.com/originals/30/1f/3b/301f3bc4d534302a51899cbc831c7389.gif" alt="">
    </div>
    <livewire:components.header />


    {{ $slot }}

    <x-site.footer2 />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    @livewireScripts
    @vite(['resources/js/app.js'])


    <script>
        function loadPage(element, timeLoad) {
            const e = document.querySelector(element);
            setTimeout(() => {
                e.classList.add('none');
            }, timeLoad);
        }

        window.addEventListener('load', function() {
            loadPage(".loading-page", 1000);
        })
    </script>
</body>

</html>
