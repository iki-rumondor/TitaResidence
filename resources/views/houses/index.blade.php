@extends('layouts.admin')

@section('content')
    @include('partials.sidebar')
    <div id="main" class="">

        @include('partials.navbar')
        <div class="main-content container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="page-title ">
                    <h3>Rumah</h3>
                    <p class="text-subtitle text-muted">Daftar rumah untuk dijual</p>
                </div>
                <div class="">
                    <a href="/admin/houses/create" class="btn btn-sm btn-dark">Tambah Rumah</a>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive" style="max-height:420px">
                            <table class="table mb-0" id="table1">
                                <thead>
                                    <tr>
                                        <th>Model Rumah</th>
                                        <th>Blok</th>
                                        <th>Harga</th>
                                        <th>Request Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($houses as $house)
                                        <tr>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $('.btn-success').click(function() {
            Swal.fire({
                title: 'Terima Permintaan Jasa  ' + $(this).data('service'),
                text: "Tekan tombol terima untuk setuju permintaan jasa",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Terima'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace("/admin/verify-order/" + $(this).data('id'));
                }
            })
        })

        $('.btn-danger').click(function() {
            Swal.fire({
                title: 'Tolak Permintaan Jasa  ' + $(this).data('service'),
                text: "Tekan tombol tolak untuk konfirmasi penolakan permintaan jasa",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tolak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace("/admin/deny-order/" + $(this).data('id'));
                }
            })
        })

        $('.btn-primary').click(function() {
            Swal.fire({
                title: 'Permintaan Jasa  ' + $(this).data('service'),
                text: "Tekan tombol finish untuk konfirmasi permintaan jasa telah selesai dilaksanakan",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Finish'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace("/admin/finish-order/" + $(this).data('id'));
                }
            })
        })
    </script>
@endpush
