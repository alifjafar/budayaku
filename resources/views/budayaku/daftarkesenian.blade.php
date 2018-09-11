@extends('layouts.main')

@section('content')

<section>
    <div class="container mt-5">
        <h4 class="container text-center mb-5">Booking Kesenian Untuk Acaramu Dengan Mudah !</h4>
            <div class="container">
                <div class="row">
                    <div class="container col-lg-3 mt-5 mb-5">
                        <span class="form-header">Filter</span>
                        <div class="form-filter">
                            <h6 class="mt-3"><strong>Kategori</strong></h6>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i>Pilih Kategori</i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <h6 class="mt-3"><strong>Lokasi</strong></h6>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i>Pilih Lokasi</i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <h6 class="mt-3"><strong>Rentang Harga</strong></h6>
                            <form action="" class="mb-5">
                                <input type="text" class="form-control mb-1" id="hargamin" placeholder="Min">
                                <input type="text" class="form-control" id="hargamax" placeholder="Max">
                            </form>
                        </div>
                    </div>

                    <div class="container col-lg-9 mt-5">
                    <div class="row">
                        <div class="col-sm-4 mb-3 d-flex">
                                    <div class="card card-shadow">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                                        </a>
                                        <div class="card-body">
                                            <a href="#" class="text-dark">
                                                <div class="heading-project">
                                                    <h3 class="card-title"><strong>Wayang Lemah</strong></h3>
                                                </div>
                                            </a>
                                            <p class="card__desc text-dark">
                                                Sanggar Paripurna - Bali
                                            </p>
                                            <p class="card__price">
                                                Rp. 2.000.000
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 d-flex">
                                        <div class="card card-shadow">
                                            <a href="#">
                                                <img class="card-img-top" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                                            </a>
                                            <div class="card-body">
                                                <a href="#" class="text-dark">
                                                    <div class="heading-project">
                                                        <h3 class="card-title"><strong>Wayang Lemah</strong></h3>
                                                    </div>
                                                </a>
                                                <p class="card__desc text-dark">
                                                    Sanggar Paripurna - Bali
                                                </p>
                                                <p class="card__price">
                                                    Rp. 2.000.000
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 d-flex">
                                            <div class="card card-shadow">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                                                </a>
                                                <div class="card-body">
                                                    <a href="#" class="text-dark">
                                                        <div class="heading-project">
                                                            <h3 class="card-title"><strong>Wayang Lemah</strong></h3>
                                                        </div>
                                                    </a>
                                                    <p class="card__desc text-dark">
                                                        Sanggar Paripurna - Bali
                                                    </p>
                                                    <p class="card__price">
                                                        Rp. 2.000.000
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 d-flex">
                                            <div class="card card-shadow">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                                                </a>
                                                <div class="card-body">
                                                    <a href="#" class="text-dark">
                                                        <div class="heading-project">
                                                            <h3 class="card-title"><strong>Wayang Lemah</strong></h3>
                                                        </div>
                                                    </a>
                                                    <p class="card__desc text-dark">
                                                        Sanggar Paripurna - Bali
                                                    </p>
                                                    <p class="card__price">
                                                        Rp. 2.000.000
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 d-flex">
                                            <div class="card card-shadow">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                                                </a>
                                                <div class="card-body">
                                                    <a href="#" class="text-dark">
                                                        <div class="heading-project">
                                                            <h3 class="card-title"><strong>Wayang Lemah</strong></h3>
                                                        </div>
                                                    </a>
                                                    <p class="card__desc text-dark">
                                                        Sanggar Paripurna - Bali
                                                    </p>
                                                    <p class="card__price">
                                                        Rp. 2.000.000
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        </div>
                                                  
            </div>
        </div>
    </div>
</section>

@endsection
