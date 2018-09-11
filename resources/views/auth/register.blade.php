@extends('layouts.main')
@section('content')

    <section>
        <div class="container ">
            <div class="row">
                <div class="col text-center mt-5">
                    <div class="brand-budayaku brand-md"><a href="{{ route('homepage') }}">Budayaku</a></div>
                    <br>
                    <span class="section-heading">Daftar Akun Baru Sekarang!</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4 mt-5 ">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Lengkap" required autofocus>
                            @if ($errors->has('name'))
                                <small class="color-budayaku">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                            @if ($errors->has('email'))
                                <small class="color-budayaku">{{ $errors->first('email') }}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" value="1" id="gMan" class="custom-control-input" {{ (old('gender') == 2) ? 'checked' : '' }} required>
                                <label class="custom-control-label" for="gMan">Laki-Laki</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" value="2" id="gWoman" class="custom-control-input" {{ (old('gender') == 2) ? 'checked' : '' }} >
                                <label class="custom-control-label" for="gWoman">Perempuan</label>
                            </div> @if ($errors->has('gender'))
                                <small class="color-budayaku">{{ $errors->first('gender') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
                            <small class="text-dark"><i>Username tidak dapat dirubah</i></small>
                            @if ($errors->has('username'))
                                <div id="error-username">
                                    <small class="color-budayaku">{{ $errors->first('username') }}</small>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autofocus>
                            @if ($errors->has('password'))
                                <small class="color-budayaku">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" id="confirmation-password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password"
                                   required>
                        </div>

                        <p>Dengan klik daftar, kamu telah menyetujui <strong><a href="#" class="color-budayaku">Aturan Penggunaan</a></strong>                        dan <strong><a href="#" class="color-budayaku">Kebijakan Privasi</a></strong> dari <span class="font-budayaku color-budayaku">Budayaku</span>.</p>

                        <button type="submit" class="btn btn-daftar mt-3 mb-5">Daftar</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
