@extends('layouts.main')
@section('description')
    - Lestarikan Budaya Indonesia
@endsection
@section('content')
    <section id="slider">
        {{--
        <div class="container">
            <div class="owl-carousel owl-theme">
                <div class="item"><a href="#"><img src="{{ asset('img/ramayana.jpeg') }}" alt="test"></a>
                    <div class="caption">Sendratari Ramayana Prambanan</div>
                </div>
                <div class="item"><a href="#"><img src="{{ asset('img/wayang_lemah.jpg') }}" alt="test"></a>
                    <div class="caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
                </div>
                <div class="item"><a href="#"><img src="{{ asset('img/wayang_lemah.jpg') }}" alt="test"></a>
                    <div class="caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
                </div>
            </div>
        </div>
        </div> --}}
        <div class="jb-budayaku"
             style="background: url('{{ asset('img/budayaku-cover.png') }}') center center / cover no-repeat rgb(0, 0, 0);">
            {{--
            <div class="img-fluid" style="background: url('{{ asset('img/tari.jpg') }}') center center / cover no-repeat rgb(0, 0, 0); min-height:570px">
            --}}
            <div class="container">
                <div class="row text-light">
                    <div class="col" style="margin-top:10%">
                        <span class="jb-text font-budayaku">Budayaku</span>
                        <div class="jb-desc mb-3">Pilih Jasa Kesenian<br/> dan Booking Sekarang !</div>
                        <a href="#explore" class="btn btn-lg btn-explore"><i class="fa fa-globe"></i> Explore
                            Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="explore" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 budayaku-dark text-center mb-5">
                    <h2 class="section-heading">Lestarikan Budaya Indonesia!</h2>
                    <div class="red-divider"></div>
                </div>
                @if($products->count())
                    @foreach($products as $item)
                        <div class="col-md-6 col-lg-4 mb-4 d-flex">
                            <div class="card card-shadow">
                                <a href="{{ route('detail-product', $item->slug) }}">
                                    <img class="card-img-top" src='{{ asset('storage/' . $item->image) }}'
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
                                        {{ $item->harga }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="card no-border text-center">
                            <div class="card-body">
                                <h3>
                                    <span class="fa fa-warning"></span>
                                    Tidak ada produk tersedia</h3>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id='budayaku__desc'>
        <div class="bg-budayaku">
            <div class="container">
                <div class="col-md-12 text-center pt-5 pb-5">
                    <h2 class="brand-budayaku brand-lg">Budayaku</h2>
                    <p class="budayaku-desc">Budayaku adalah sebuah platform untuk mempertemukan event owner atau event
                        organizer yang ingin menampilkan
                        pertunjukan tentang kesenian Indonesia pada acaranya dengan para pelaku seni melalui organisasi
                        seni,
                        komunitas seni maupun sanggar seni di seluruh Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="supported">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section-heading">Support By :</h2>
                    <div class="red-divider"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('img/kemenpar.jpg') }}" alt="Kementerian Pariwisata dan Budaya"
                                 class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('img/pesona-indonesia.png') }}" alt="Pesona Indonesia" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left fa-2x'></i>",
                    "<i class='fa fa-angle-right fa-2x'></i>"
                ],
                singleItem: true,
                items: 1,
                itemsDesktop: true,
                itemsDesktopSmall: true,
                itemsTablet: true,
                itemsMobile: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        });

    </script>
    <script>
        // Select all links with hashes
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            }
                            ;
                        });
                    }
                }
            });

    </script>
@endpush
