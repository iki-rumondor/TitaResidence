<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TitaResidence | {{$title}}</title>
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.css') }}">
    <link rel="shortcut icon" href="{{ asset('./assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/app.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    @if (session('response'))
        {!! session('response') !!}
    @endif

    @if (Auth::check())
        <div id="app">
            @yield('content')
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2022 &copy; Voler</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                            href="https://saugi.me">Saugi</a></p>
                </div>
            </div>
        </footer>
    @else
        <div id="auth">
            @yield('content')
        </div>
    @endif


    @stack('modals')

    <script src="{{ asset('admin_assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/app.js') }}"></script>
    <script src="{{ asset('admin_assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" charset="UTF-8"></script>

    <script>
        $.fn.datepicker.dates['id'] = {
            days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
            daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            daysMin: ["Mg", "Sn", "Sl", "Rb", "Km", "Jm", "Sb"],
            months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
                "November", "Desember"
            ],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            today: "Hari ini",
            clear: "Bersihkan",
            format: "dd/mm/yyyy",
            titleFormat: "MM yyyy",
            weekStart: 0
        };

        $('.datepicker').datepicker({
            language: 'id',
            minDate: 1,
        });
    </script>

    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-gray'
            },
            buttonsStyling: false
        });
    </script>

    @if ($errors->any())
        <script>
            swalWithBootstrapButtons.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Periksa Kembali Data Yang Dimasukkan',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session()->has('success'))
        <script>
            swalWithBootstrapButtons.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

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

    @stack('scripts')
</body>

</html>
