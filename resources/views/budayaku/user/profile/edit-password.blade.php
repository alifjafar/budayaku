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
                        <div class="col-md-9">
                        <form action="#" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="current-password" class="col-md-4 col-form-label">Current Password</label>

                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" required>
                                    @if ($errors->has('current-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="new-password" class="col-md-4 col-form-label">New Password</label>

                                    <div class="col-md-6">
                                        <input id="new-password" type="password" class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}" name="new-password"
                                            required>
                                        @if ($errors->has('new-password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                         @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="confirmation-password" class="col-md-4 col-form-label">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="confirmation-password" type="text" class="form-control{{ $errors->has('confirmation-password') ? ' is-invalid' : '' }}" name="confirmation-password"
                                                required>
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