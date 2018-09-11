@extends('layouts.main')
@section('content')

<section>
    <div class="container ">
        <div class="row">
            <div class="col text-center mt-5">
                <div class="brand-budayaku brand-md"><a href="{{ route('homepage') }}">Budayaku</a></div>
                <br>
                <span class="section-heading">Silahkan Login</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 mb-5 ">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    @if ($errors->all())
                    <div class="form-group">
                        <div class="alert alert-warning alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <small>Username atau password yang kamu masukkan salah. Silahkan coba lagi</small>
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Username/Email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span> @endif
                    </div>
                    <a href="#"><small>Lupa Password?</small></a>
                    <button type="submit" class="btn btn-daftar mt-3 mb-4">Login</button>
                </form>
                <div class="modal-footer">
                    <small>Belum punya akun? </small><a href="{{ route('register') }}"><small>Daftar Sekarang</small></a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
