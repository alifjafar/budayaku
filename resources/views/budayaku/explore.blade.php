@extends('layouts.main')
@section('title', 'Explore - ')
@section('content')

    <section>
        <div class="container mt-5">
            <h4 class="text-center mb-5">Booking Kesenian Untuk Acaramu Dengan Mudah !</h4>
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 mt-5 mb-5">
                        <form action="{{ Request::url() }}" class="mb-5" method="get">
                            <div class="card card-shadow">
                                <span class="card-header">Filter</span>
                                <div class="form-filter">
                                    <p class="mt-3"><strong>Kategori</strong></p>
                                    <select name="cat" id="cat" class="form-control">
                                        <option value="all">Semua Kategori</option>
                                        @foreach(getCategory() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="mt-3"><strong>Rentang Harga</strong></p>
                                    <div class="form-group">
                                        <input type="number" class="form-control mb-1" name="priceMin"
                                               placeholder="Min">
                                        <input type="number" class="form-control" name="priceMax" placeholder="Max">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-budayaku btn-sm btn-block">
                                            Submit
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9 mt-5">
                        <div class="row">
                            @foreach($products as $item)
                                <div class="col-sm-4 mb-3 d-flex">
                                    <div class="card card-shadow">
                                        <a href="{{ route('detail-product', $item->slug) }}">
                                            <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}"
                                                 alt="{{ $item->name }}">
                                        </a>
                                        <div class="card-body">
                                            <a href="{{ route('detail-product', $item->slug) }}" class="text-dark">
                                                <div class="heading-project">
                                                    <h3 class="card-title"><strong>{{ $item->name }}</strong></h3>
                                                </div>
                                            </a>
                                            <p class="card__desc text-dark">
                                                {{ $item->provider->name }}
                                            </p>
                                            <p class="card__price">
                                                {{ $item->totalHarga }}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if(!count($products))
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h3 class="mt-4">
                                                <span class="fa fa-warning"></span>
                                                Tidak ada produk</h3>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $products->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
