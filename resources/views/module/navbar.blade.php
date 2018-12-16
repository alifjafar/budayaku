<nav class="navbar navbar-expand-lg navbar-dark bg-budayaku sticky-top">
    <div class="container">
        <a class="navbar-brand brand-budayaku" href="{{ route('homepage') }}">Budayaku</a>
        <button class="navbar-toggler order-first" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- account toggle -->
        @php
            $isLogin = Auth::check();
        @endphp
        @if ($isLogin)
            <button class="navbar-toggler nav-account" type="button" data-toggle="collapse" data-target="#account"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <img src="{{ Auth::user()->avatar }}" style="width:30px;height:30px;border-radius:50%">
            </button>
        @else
            <button class="navbar-toggler nav-account" type="button" data-toggle="collapse" data-target="#account"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <li class="fa fa-user"></li>
            </button>
        @endif

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-group has-search my-2 my-lg-0 ml-auto">
                <span class="fa fa-search form-control-feedback"></span>
                <input class="form-control w-250 mr-sm-2" type="search" placeholder="Cari Kesenian..."
                       aria-label="Search">
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @foreach(getCategory() as $item)
                            <a class="dropdown-item" href="#">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block disabled">
                    <span class="nav-link disabled">⋮</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#explore">Explore</a>
                </li>
                @if ($isLogin)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o"></i>
                            <span class="ml-1">Notifikasi</span>
                            <span class="badge badge-warning">{{ count(Auth::user()->unreadNotifications) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-alerts" aria-labelledby="alertsDropdown">
                            @forelse(Auth::user()->unreadNotifications as $notification)
                                <a class="dropdown-item"
                                   href="{{ $notification['data']['action'] }}">{{ $notification['data']['message'] }}
                                    <div
                                        class="text-muted small">{{ $notification['created_at']->format('d F Y') }}</div>
                                </a>
                            @empty
                                <p class="text-center">Belum ada Notifikasi</p>
                            @endforelse
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center" href="#"><strong>Lihat Semua</strong> <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </li>
                @endif

                <div class="collapse navbar-collapse ">
                    <li class="nav-item d-none d-sm-none d-lg-block ml-3">
                        <a href="{{route('product.create')}}">
                            <button class="btn btn-sm btn-outline-light" type="button">Iklankan Jasa</button>
                        </a>

                    </li>
                </div>
                <li class="nav-item">
                    <span class="nav-link disabled"> </span>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="account">
            <ul class="navbar-nav ml-auto">
                {{-- Show on Large Device --}}
                <li class="nav-item pt-1">
                @if ($isLogin)
                    <li class="d-none d-sm-none d-lg-block dropdown profile">
                        <a href="#" class="nav-link dropdown-toggle text-right" data-toggle="dropdown" role="button"
                           aria-expanded="false"><img src="{{ Auth::user()->avatar }}" class="profile-img"> <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="profile-img">
                                <img src="{{ Auth::user()->avatar }}" class="profile-img">
                                <div class="profile-body">
                                    <h5>{{ Auth::user()->profile->name }}</h5>
                                    <h6>{{ Auth::user()->username }}</h6>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="full-rum">
                                @can('admin')
                                    <a href="{{ route('users.index') }}">Konsole Admin</a>
                                @endcan
                                <a href="{{ route('profile', Auth::user()->username) }}">Halaman Profil</a>
                                <a href="{{ route('booking-list') }}">Riwayat Pesanan</a>
                                <a href="{{ route('edit-profile', Auth::user()->username) }}">Pengaturan</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger btn-block"><i
                                            class="fa fa-power-off"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="d-none d-sm-none d-lg-block">
                        @if(Route::current()->getName() != 'register')
                            <a class="btn btn-sm btn-outline-light" href="#" data-toggle="modal" data-target="#login">Login</a>
                        @else
                            <a class="btn btn-sm btn-outline-light" href="{{ route('login') }}">Login</a>
                        @endif
                        <a class="btn btn-sm btn-light" href="{{ route('register') }}">Daftar</a>
                    </li>
                    @endif
                    </li>
                    </li>
                    {{-- Show on Small Device --}}
                    @if($isLogin)
                        <li class="nav-item d-sm-block d-lg-none mt-3">
                            <ul class="account">
                                <li class="profile-img">
                                    <img src="{{ Auth::user()->avatar }}" class="profile-img">
                                    <div class="profile-body">
                                        <h5>{{ Auth::user()->profile->name }}</h5>
                                        <h6>{{ Auth::user()->username }}</h6>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="full-rum">
                                    @can('admin')
                                        <a href="{{ route('users.index') }}">Konsole Admin</a>
                                    @endcan
                                    <a href="{{ route('profile', Auth::user()->username) }}">Halaman Profil</a>
                                    <a href="{{ route('booking-list') }}">Riwayat Pesanan</a>
                                    <a href="{{ route('edit-profile', Auth::user()->username) }}">Pengaturan</a>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-block"><i
                                                class="fa fa-power-off"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item d-sm-block d-lg-none mt-3">
                            @if(Route::current()->getName() != 'register')
                                <a class="btn btn-sm btn-outline-light btn-block" href="#" data-toggle="modal"
                                   data-target="#login">Login</a>
                            @else
                                <a class="btn btn-sm btn-outline-light btn-block" href="{{ route('login') }}">Login</a>
                            @endif
                            <a class="btn btn-sm btn-light btn-block" href="{{ route('register') }}">Daftar</a>
                        </li>
                    @endif
            </ul>
        </div>
    </div>
</nav>
