<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TitaResidence | {{ $title }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.svg">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="./assets/images/logo.png"> --}}
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            color: #333;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        .dropdown-toggle i {
            margin-left: 5px;
        }

        .dropdown-toggle:hover {
            background-color: transparent;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: hsl(200, 69%, 14%);
            ;
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: none;
            width: 200px;
        }

        .dropdown-menu li a {
            padding: 10px 10px;
        }

        .dropdown-menu li a {
            color: #fff;
            text-decoration: none;
        }

        .dropdown-menu li a:hover {
            background-color: hsl(200, 71%, 39%);
            ;
        }

        .dropdown.active .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body>

    @include('home_partials.header')
    <main>
        <article>
            @include('home_partials.hero')
            @include('home_partials.service')
            @include('home_partials.property')

        </article>
    </main>
    @include('home_partials.footer')

    <script src="assets/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.querySelector('.dropdown-toggle');
            var dropdown = document.querySelector('.dropdown');

            dropdownToggle.addEventListener('click', function() {
                dropdown.classList.toggle('active');
            });



        });
    </script>
    @if (session()->has('fail'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('fail') }}",
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif
</body>

</html>
