@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="mb-3">
                    {{ __('Maaf, kamu belum bisa melanjutkan proses terkait. Silahkan check email kamu untuk mendapatkan link verifikasi yang telah dikirim') }}
                        <br>
                        <br>
                    {{ __('Jika kamu belum mendapatkan email dari kami, klik tombol dibawah ini untuk mengirim ulang link verifikasi') }}
                    </div>
                        <a href="{{ route('verification.resend') }}"> <span class="btn btn-sm btn-budayaku"><i class="fa fa-sign-in"></i> Resend Verification</span></a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
