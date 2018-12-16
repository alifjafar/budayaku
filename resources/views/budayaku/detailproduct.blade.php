@extends('layouts.main')
@section('title')
    {{ $product->name }} -
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endpush
@section('content')
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h3><strong>{{ $product->name }}</strong></h3>
                    <br>
                    <h4><i>{{ $product->provider->name }}</i></h4>
                    <p>Kategori : {{ $product->category->name }}</p>
                    <p><i class="fa fa-star rating"></i>
                        <i class="fa fa-star rating"></i>
                        <i class="fa fa-star rating"></i>
                        <i class="fa fa-star rating"></i>
                        <i class="fa fa-star rating"></i> 5/5</p>

                    <p><strong>{{ $product->name }}</strong> - {{ $product->description }} </p>
                    <hr>
                    <br>
                    <h4>Tentang {{ $product->provider->name }}</h4>
                    <p>{{ $product->provider->description }}</p>
                    <br>
                    @if($product->video != null)
                        <h4>Video</h4>
                        <hr>
                        <div class="media mb-3">
                            <div class="media-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                            src="{{url('https://www.youtube.com/embed/'.$product->videoid) }}"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="container">

                        <!-- disni corousel -->
                        <div id="sync1" class="slider owl-carousel">
                            @foreach($product->productimage as $item)
                                <div class="item">
                                    <img src="{{ asset('storage/' . $item->path . '/' . $item->filename)}}"
                                         alt="{{ $item->filename }}">
                                </div>
                            @endforeach
                        </div>
                        <div id="sync2" class="navigation-thumbs owl-carousel mb-3">
                            @foreach($product->productimage as $item)
                                <div class="item">
                                    <img src="{{ asset('storage/' . $item->path . '/' . $item->filename)}}"
                                         alt="{{ $item->filename }}">
                                </div>
                            @endforeach
                        </div>
                        <!-- sampe sini -->

                        <hr>
                        <div class="align-text-left show-hide-dropdown">
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                               aria-controls="collapseExample">
                                <h6><strong>{{ $product->name }}</strong></h6>
                                <h6><strong>{{ $product->totalharga }}</strong></h6>
                            </a>

                            <div class="row align-text-left collapse" id="collapseExample">
                                <div class="col-sm-7">
                                    @foreach($product->additionalprice as $item)
                                        <p class="mt-2 "><strong>{{ ucwords($item->name) }}</strong></p>
                                    @endforeach
                                </div>
                                <div class="col-sm-5">
                                    @foreach($product->additionalprice as $item)
                                        <p class="mt-2">{{ $item->harga }}</p>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <br>
                        <form action="{{ route('booking.pre.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="tgl_booking"><strong>Booking Tanggal Acara : </strong></label>
                                <div class="row col-md-6">
                                    <input type="text" class="form-control" id="tgl_booking" name="booking_date"
                                           value="{{ old('end_date', date('m-d-Y')) }}">
                                </div>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                            </div>
                            @if(Auth::check())
                                <button type="submit" class="btn btn-book">Book</button>
                            @else
                                <a href="#" onclick="loginMe()" class="btn btn-book">Book</a>
                            @endif
                            {{-- <button type="button" class="btn btn-chat">Chat</button> --}}

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
    @include('module.related', [
    'catId' => $product->category_id,
    'product_id' => $product->id])
@endsection

@push('js')
    <script>
        function loginMe() {
            $('#login').modal('show');
        };

        @if(Session::has('exist'))
        swal({
            title: "Oops!",
            text: "Tanggal tersebut sudah di booking",
            icon: "error",
        });
        @endif
    </script>
    <script>
        var sync1 = $(".slider");
        var sync2 = $(".navigation-thumbs");

        var thumbnailItemClass = '.owl-item';

        var slides = sync1.owlCarousel({
            video: true,
            startPosition: 12,
            items: 1,
            loop: true,
            margin: 10,
            nav: false,
            dots: true
        }).on('changed.owl.carousel', syncPosition);

        function syncPosition(el) {
            $owl_slider = $(this).data('owl.carousel');
            var loop = $owl_slider.options.loop;

            if (loop) {
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
            } else {
                var current = el.item.index;
            }

            var owl_thumbnail = sync2.data('owl.carousel');
            var itemClass = "." + owl_thumbnail.options.itemClass;


            var thumbnailCurrentItem = sync2
                .find(itemClass)
                .removeClass("synced")
                .eq(current);

            thumbnailCurrentItem.addClass('synced');

            if (!thumbnailCurrentItem.hasClass('active')) {
                var duration = 300;
                sync2.trigger('to.owl.carousel', [current, duration, true]);
            }
        }

        var thumbs = sync2.owlCarousel({
            startPosition: 12,
            items: 4,
            loop: false,
            margin: 10,
            autoplay: false,
            nav: false,
            dots: false,
            onInitialized: function (e) {
                var thumbnailCurrentItem = $(e.target).find(thumbnailItemClass).eq(this._current);
                thumbnailCurrentItem.addClass('synced');
            },
        })
            .on('click', thumbnailItemClass, function (e) {
                e.preventDefault();
                var duration = 300;
                var itemIndex = $(e.target).parents(thumbnailItemClass).index();
                sync1.trigger('to.owl.carousel', [itemIndex, duration, true]);
            }).on("changed.owl.carousel", function (el) {
                var number = el.item.index;
                $owl_slider = sync1.data('owl.carousel');
                $owl_slider.to(number, 100, true);
            });
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $('#tgl_booking').daterangepicker();
    </script>
@endpush
