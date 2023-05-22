@extends('layouts.admin')

@section('content')
    @include('partials.sidebar')
    <div id="main" class="">

        @include('partials.navbar')
        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Pelanggan iPagar</h3>
                <p class="text-subtitle text-muted">Semua pelanggan iPagar</p>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive" style="max-height:420px">
                            <table class="table mb-0" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nomor Handphone</th>
                                        <th>Jumlah Rumah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        @if ($customer->username == 'admin')
                                            @continue
                                        @endif
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer->username }}</td>
                                            <td>{{ $customer->phone_num }}</td>
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
