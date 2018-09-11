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
                            <div class="col-md-9">
                                <form action="{{ route('update.password', Auth::user()->id) }}"
                                      enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="current-password" class="col-md-4 col-form-label">Current
                                            Password</label>

                                        <div class="col-md-6">
                                            <input id="current_password" type="password"
                                                   class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}"
                                                   name="current_password" required>
                                            @if ($errors->has('current_password'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new-password" class="col-md-4 col-form-label">New Password</label>

                                        <div class="col-md-6">
                                            <input id="new_password" type="password"
                                                   class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                                                   name="new_password"
                                                   required>
                                            @if ($errors->has('new_password'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirmation_password" class="col-md-4 col-form-label">Confirm
                                            Password</label>

                                        <div class="col-md-6">
                                            <input id="confirmation_password" type="password"
                                                   class="form-control{{ $errors->has('confirmation_password') ? ' is-invalid' : '' }}"
                                                   name="confirmation_password" required>
                                            @if ($errors->has('confirmation_password'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('confirmation_password') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-sm btn-budayaku btn-block"><i
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
        @if(Session::has('success'))
        swal("Good Job !", "Password berhasil diganti", "success");
        @endif
    </script>
@endpush
