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
                <div class="card profile-setting">
                    @include('module.user.profile-navtab')
                    <div class="row content">
                        <div class="col-md-3">
                            <img src="{{ $user->avatar }}" alt="{{ $user->profile->name }}" class="img-fluid rounded mx-auto d-block">
                            <span class="pt-2 d-block text-center"><button type="button" class="btn btn-sm btn-danger" data-toggle="popover" title="Bagaimana Cara Ganti Avatar?" data-placement="bottom" data-content="Kamu dapat mengganti avatar
                                di Gravatar.com Silahkan Sign up dengan email : {{ $user->email }}">Ganti Avatar</button></span>
                        </div>
                        <div class="col-md-9">
                        <form action="#" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label">Nama Lengkap</label>

                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->profile->name }}"
                                        >
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3 col-form-label">Username</label>

                                <div class="col-md-9">
                                    {{-- <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}"
                                        disabled> --}}
                                    <label for="username" class="col-form-label">{{ $user->username }}</label>
                                    @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label">Email</label>

                                    <div class="col-md-9">
                                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}"
                                            >
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                         @endif
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-3 col-form-label">Jenis Kelamin</label>

                                <div class="col-md-9">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gender" value="{{ $user->profile->gender }}" id="gMan" class="custom-control-input" {{ ($user->profile->gender == 1) ? 'checked' : '' }} required>
                                        <label class="custom-control-label" for="gMan">Laki-Laki</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gender" value="{{ $user->profile->gender }}" id="gWoman" class="custom-control-input" {{ ($user->profile->gender == 2) ? 'checked' : '' }} >
                                        <label class="custom-control-label" for="gWoman">Perempuan</label>
                                    </div>
                                    @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                     @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="notelp" class="col-md-3 col-form-label">No Telepon</label>

                                    <div class="col-md-9">
                                        <input id="telp" type="text" class="form-control{{ $errors->has('notelp') ? ' is-invalid' : '' }}" name="telepon" value="{{ $user->profile->telp }}"
                                            >
                                        @if ($errors->has('notelp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('notelp') }}</strong>
                                        </span>
                                         @endif
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label for="alamat" class="col-md-3 col-form-label">Alamat</label>

                                    <div class="col-md-9">
                                        <textarea name="alamat" id="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}">{{ $user->profile->address }}</textarea>
                                        @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                         @endif
                                    </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-sm btn-budayaku btn-block"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('js')
<script>
    $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
@endsection
