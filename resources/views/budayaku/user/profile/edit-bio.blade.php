@extends('layouts.main')
@push('body')
    class="bg-light"
@endpush
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
                                <img src="{{ $user->avatar }}" alt="{{ $user->profile->name }}"
                                     class="img-fluid rounded mx-auto d-block">
                                <span class="pt-2 d-block text-center"><button type="button"
                                                                               class="btn btn-sm btn-danger"
                                                                               data-toggle="change_avatar"
                                                                               title="Bagaimana Cara Ganti Avatar?"
                                                                               data-placement="bottom" data-content="Kamu dapat mengganti avatar
                                di Gravatar.com Silahkan Sign up dengan email : {{ $user->email }}">Ganti Avatar</button></span>
                            </div>
                            <div class="col-md-9">
                                <form action="{{ route('update.profile', $user->profile) }}"
                                      enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PUT')

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label">Nama Lengkap</label>

                                        <div class="col-md-9">
                                            <input id="name" type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" value="{{ $user->profile->name }}">
                                            @if ($errors->has('name'))
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
                                            <label for="">{{ $user->email }}
                                                @if($user->email_verified_at != null)
                                                <span class="verified"><i
                                                        class="fa fa-check"></i>  Verified</span>
                                                @endif
                                            </label>
                                            <a href="#" class="color-budayaku float-right">
                                                <small>Change Email</small>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-md-3 col-form-label">Jenis Kelamin</label>

                                        <div class="col-md-9">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="gender" value="1"
                                                       id="gMan" class="custom-control-input"
                                                       {{ ($user->profile->gender == 1) ? 'checked' : '' }} required>
                                                <label class="custom-control-label" for="gMan">Laki-Laki</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="gender" value="2"
                                                       id="gWoman"
                                                       class="custom-control-input" {{ ($user->profile->gender == 2) ? 'checked' : '' }} >
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
                                            <input id="telp" type="text"
                                                   class="form-control{{ $errors->has('notelp') ? ' is-invalid' : '' }}"
                                                   name="telp" value="{{ $user->profile->telp }}">
                                            @if ($errors->has('notelp'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('notelp') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-md-3 col-form-label">Alamat</label>

                                        <div class="col-md-9">
                                            <textarea name="address" id="address"
                                                      class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}">{{ $user->profile->address }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-4">
                                            <button id="submit-data" type="submit"
                                                    class="btn btn-sm btn-budayaku btn-block" disabled=""><i
                                                    class="fa fa-save"></i> Simpan
                                            </button>
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

@push('js')
    <script>
        $(function () {
            $('[data-toggle="change_avatar"]').popover()
        });

        @if(Session::has('success'))
        swal("Good Job !", "Profil Berhasil di Update", "success");
            @endif

        let button = $('#submit-data');
        let orig = [];

        $.fn.getType = function () {
            return this[0].tagName == "INPUT" ? $(this[0]).attr("type").toLowerCase() : this[0].tagName.toLowerCase();
        }

        $("form :input").each(function () {
            let type = $(this).getType();
            let tmp = {
                'type': type,
                'value': $(this).val()
            };
            if (type == 'radio') {
                tmp.checked = $(this).is(':checked');
            }
            orig[$(this).attr('id')] = tmp;
        });

        $('form').bind('change keyup', function () {

            let disable = true;
            $("form :input").each(function () {
                let type = $(this).getType();
                let id = $(this).attr('id');

                if (type == 'text' || type == 'select') {
                    disable = (orig[id].value == $(this).val());
                } else if (type == 'radio') {
                    disable = (orig[id].checked == $(this).is(':checked'));
                }

                if (!disable) {
                    return false; // break out of loop
                }
            });

            button.prop('disabled', disable);
        });

    </script>
@endpush
