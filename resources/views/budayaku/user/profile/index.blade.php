@extends('layouts.main')
@section('content')
<section class="mt-5" id="profile-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-center" style="background: url('{{ asset('img/budayaku-cover.png') }}') center center / cover no-repeat rgb(0, 0, 0);" >
                    <img src="{{ $user->avatar }}" alt="{{ $user->profile->name }}" class="img-fluid rounded mx-auto d-block">
                    <div class="mt-3 d-block uprof">{{ $user->profile->name }}</div>
                    <small class="mb-3 d-block text-white">Joined : {{ $user->created_at->diffForHumans() }}</small>
                    @if (Auth::check())
                        @if($user->username == Auth::user()->username)
                        <a href="{{ route('edit-profile', $user->username) }}" class="btn btn-sm btn-budayaku"><i class="fa fa-cog"></i> Edit Profil</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
