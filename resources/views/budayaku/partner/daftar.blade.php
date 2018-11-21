@extends('layouts.main')
@section('body')
    class="bg-light"
@endsection
@section('content')
    <section class="mt-5" id="edit-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('budayaku.user.sidebar-dashboard')
                </div>
                <div class="col-md-9">
                    <h2 class="section-heading">Registrasi Partner</h2>
                    <div class="card">
                        <div class="container mb-3 mt-3 ">
                            <div class="row px-2">
                                <div class="col-md-9">
                                    <form action="{{ route('partner.register') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @if (session('success'))
                                            <div class="form-group">
                                                <div class="alert alert-success alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">×</a>
                                                    {{ session('success') }}
                                                </div>
                                            </div>
                                        @endif
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label"><strong>Nama
                                                    Komunitas</strong></label>
                                            <input id="name" type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" value="{{ old('name') }}"
                                                   placeholder="Komunitas / Sanggar" required>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="slug" class="col-form-label"><strong>Tentukan URL Komunitas
                                                    (Slug)</strong> <a href="#" data-toggle="slug"
                                                                       title="Memudahkan User Menemukan Komunitasmu"><i
                                                        class="fa fa-info-circle"></i></a></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">https//budayaku.online/</span>
                                                </div>
                                                <input type="text"
                                                       class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                                       name="slug" required>
                                                @if ($errors->has('slug'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('slug') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="col-form-label"><strong>Deskripsi
                                                    Komunitas</strong></label>
                                            <textarea name="description" id="description"
                                                      class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                      placeholder="Deskripsi Mengenai Komunitasmu"
                                                      rows="3">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="col-form-label"><strong>Alamat Lengkap
                                                    Komunitas</strong></label>
                                            <textarea name="address" id="address"
                                                      class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                      placeholder="Alamat Lengkap Komunitas"
                                                      rows="3">{{ old('address') }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="col-form-label"><strong>KTP / Identitas
                                                    Penanggung Jawab</strong></label>
                                            <div class="custom-file">
                                                <input type="file"
                                                       class="custom-file-input {{ $errors->has('id_card') ? ' is-invalid' : '' }}"
                                                       id="id_card"
                                                       name="id_card">
                                                <label class="custom-file-label" for="id_card">Choose File</label>
                                                @if ($errors->has('id_card'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('id_card') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i
                                                    class="fa fa-close"></i> Cancel</a>
                                            <button type="submit" class="btn btn-budayaku btn-sm float-right"><i
                                                    class="fa fa-save"></i> Daftar
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
    <script>
        $(function () {
            $('[data-toggle="slug"]').tooltip()
        });

        $('#id_card').on('change', function (e) {
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endpush
