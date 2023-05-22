@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 mx-auto">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h3>Daftar Akun</h3>
                            <p class="text-muted">Data yang anda masukkan akan kami jaga dan tidak akan disalahgunakan</p>
                        </div>
                        <form action="/auth/register" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input value="{{ old('username') }}" type="text" id="username"
                                            class="form-control @error('username') is-invalid @endError" name="username"
                                            placeholder="Masukkan Username">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @else
                                            <small>Username minimal 8 karakter</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone_num">Nomor Hp</label>
                                        <input value="{{ old('phone_num') }}" type="text" id="phone_num"
                                            class="form-control @error('phone_num') is-invalid @endError" name="phone_num"
                                            placeholder="Masukkan Nomor Handphone">
                                        @error('phone_num')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @endError" name="password"
                                            placeholder="Masukkan Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @else
                                            <small>Password minimal 8 karakter</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password_confirm">Konfirmasi Password</label>
                                        <input type="password" id="password_confirm"
                                            class="form-control @error('password_confirm') is-invalid @endError"
                                            name="password_confirm" placeholder="Ulangi Password">
                                        @error('password_confirm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </diV>

                            <a href="/auth/login">Sudah Punya Akun? Silahkan Login</a>
                            <div class="clearfix">
                                <button class="btn btn-primary float-end">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
