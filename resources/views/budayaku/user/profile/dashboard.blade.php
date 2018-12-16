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
                    <div>
                        <header class="blue accent-3 relative">
                            <div class="container-fluid">
                                <div class="row p-t-b-10 ">
                                    <div class="col">
                                        <div class="pb-3">
                                            <div class="image mr-3  float-left">
                                                <img class="user_avatar no-b no-p" src="{{ Auth::user()->avatar }}"
                                                     alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10"><strong>{{Auth::user()->profile->name }}</strong>
                                                </h6>
                                                <p>{{Auth::user()->email }}</p>
                                                <small>{{ Auth::user()->username }}</small>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="col-md-4 pb-3">
                                        <div class="mr-auto float-right">
                                            <a href="{{ route('edit-profile', Auth::user()->username) }}"
                                               class="btn btn-budayaku">
                                                Edit Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>

                        <div class="container-fluid animatedParent animateOnce my-3">
                            <div class="animated fadeInUpShort">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                         aria-labelledby="v-pills-home-tab">

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="card r-3">
                                                    <div class="p-4">
                                                        <div class="float-right">
                                                                    <span
                                                                        class="icon-award text-light-blue s-48"></span>
                                                        </div>
                                                        <div class="counter-title"><b>Jumlah Transaksi</b></div>
                                                        <h5 class="sc-counter mt-3">40</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="card r-3">
                                                    <div class="p-4">
                                                        <div class="float-right"><span
                                                                class="icon-stop-watch3 s-48"></span>
                                                        </div>
                                                        <div class="counter-title "><b>Total Jasa Saya</b></div>
                                                        <h5 class="sc-counter mt-3">12</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="white card">
                                                    <div class="p-4">
                                                        <div class="float-right"><span
                                                                class="icon-orders s-48"></span>
                                                        </div>
                                                        <div class="counter-title"><b>Transaksi Berhasil</b></div>
                                                        <h5 class="sc-counter mt-3">39</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="white card">
                                                    <div class="p-4">
                                                        <div class="float-right"><span
                                                                class="icon-orders s-48"></span>
                                                        </div>
                                                        <div class="counter-title"><b>Transaksi Gagal</b></div>
                                                        <h5 class="sc-counter mt-3">1</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-3">
                                            <!-- bar charts group -->
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header white">
                                                        <h6>Profil User</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row" id="graphx">
                                                            <div class="col-md-4">
                                                                <p>Username</p>
                                                                <p>Nama Lengkap</p>
                                                                <p>Jenis Kelamin</p>
                                                                <p>E-Mail</p>
                                                                <p>Nomor Telp.</p>
                                                                <p>Alamat</p>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <p>{{ Auth::user()->username }}</p>
                                                                <p>{{Auth::user()->profile->name }}</p>
                                                                @if(Auth::user()->profile->gender==1)
                                                                    <p>Laki - laki</p>
                                                                @else
                                                                    <p>Perempuan</p>
                                                                @endif
                                                                <p>{{Auth::user()->email }}</p>
                                                                <p>{{Auth::user()->profile->telp }}</p>
                                                                <p>{{Auth::user()->profile->address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /bar charts group -->


                                        </div>

                                    </div>
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
    @if(session()->has('success'))
        <script>
            swal('Berhasil !', '{{ session()->get('success') }}', 'success');
        </script>
    @endif
@endpush
