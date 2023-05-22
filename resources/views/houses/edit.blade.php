@extends('layouts.admin')

@section('content')
    @include('partials.sidebar')
    <div id="main" class="">

        @include('partials.navbar')
        <div class="main-content container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="page-title ">
                    <h3>Edit Data Rumah</h3>
                    <p class="text-subtitle text-muted">Edit data rumah untuk dijual</p>    
                </div>
                <div class="">
                    <a href="/admin/houses" class="btn btn-sm btn-dark">Kembali</a>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/admin/houses/{{ $house->id }}" method="post" class="form form-vertical"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-body">
                                    <div class="form-group has-icon-left">
                                        <label for="model">Model Rumah</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('model') is-invalid @enderror"
                                                placeholder="Masukkan Model Rumah" id="model" name="model"
                                                value="{{ old('model', $house->model) }}">
                                            <div class="form-control-icon">
                                                <i data-feather="home"></i>
                                            </div>
                                        </div>
                                        @error('model')
                                            <div class="small text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-6 has-icon-left">
                                            <label for="price">Harga Rumah (Per Bulan)</label>
                                            <div class="position-relative">
                                                <input min="0" type="number"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    placeholder="Masukkan Harga Rumah" id="price" name="price"
                                                    value="{{ old('price', $house->price) }}">
                                                <div class="form-control-icon">
                                                    <i data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                            @error('price')
                                                <div class="small text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6 has-icon-left">
                                            <label for="size">Ukuran Rumah (Meter Persegi)</label>
                                            <div class="position-relative">
                                                <input min="0" type="number"
                                                    class="form-control @error('size') is-invalid @enderror"
                                                    placeholder="Masukkan Ukuran Rumah" id="size" name="size"
                                                    value="{{ old('size', $house->size) }}">
                                                <div class="form-control-icon">
                                                    <i data-feather="crop"></i>
                                                </div>
                                            </div>
                                            @error('size')
                                                <div class="small text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group has-icon-left">
                                            <label for="bedrooms">Jumlah Kamar</label>
                                            <div class="position-relative">
                                                <input min="0" type="number"
                                                    class="form-control @error('bedrooms') is-invalid @enderror"
                                                    placeholder="Masukkan Jumlah Kamar" id="bedrooms" name="bedrooms"
                                                    value="{{ old('bedrooms', $house->bedrooms) }}">
                                                <div class="form-control-icon">
                                                    <i data-feather="package"></i>
                                                </div>
                                            </div>
                                            @error('bedrooms')
                                                <div class="small text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 form-group has-icon-left">
                                            <label for="bathrooms">Jumlah Kamar Mandi</label>
                                            <div class="position-relative">
                                                <input min="0" type="number"
                                                    class="form-control @error('bathrooms') is-invalid @enderror"
                                                    placeholder="Masukkan Jumlah Kamar Mandi" id="bathrooms"
                                                    name="bathrooms" value="{{ old('bathrooms', $house->bathrooms) }}">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                            @error('bathrooms')
                                                <div class="small text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-3 mb-4">
                                        <label for="image">Pilih Gambar Rumah</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image" onchange="previewImage()">
                                        <img id="img-preview" class="img-fluid w-100" src="{{ asset('storage/'.$house->image) }}">
                                        @error('image')
                                            <div class="small text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function previewImage() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('#img-preview')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
            $('#img-preview').addClass('my-2 d-block col-sm-3')
        }
    </script>
@endpush
