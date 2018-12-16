<section>
    <div class="container">
        <div class="row">
            <div class="container mt-4 text-center">
                <hr>
                <h2 class="mt-4 section-heading color-budayaku">PRODUK LAINNYA</h2>
            </div>
            @php
                $related = getRelatedPost($product_id);
            @endphp
            @foreach($related as $item)
                <div class="col-md-6 col-lg-3 mb-4 mt-5 d-flex">
                    <div class="card card-shadow">
                        <a href="#">
                            <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}"
                                 alt="{{ $item->name }}">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-dark">
                                <div class="heading-project">
                                    <h3 class="card-title"><strong>{{ $item->name }}</strong></h3>
                                </div>
                            </a>
                            <p class="card__desc text-dark">
                                {{ $item->provider->name }}
                            </p>
                            <p class="card__price">
                                {{ $product->totalharga }}
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach

            @if(!count($related))
                <div class="col-md-12 text-center">
                    <h6 class="mt-4">
                        <span class="fa fa-warning"></span>
                        Tidak ada produk lainnya</h6>
                </div>
            @endif
        </div>
    </div>

</section>
