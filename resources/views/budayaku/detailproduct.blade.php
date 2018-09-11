@extends('layouts.main')

@section('content')
 <section>
     <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h3><strong>Wayang Lemah</strong></h3>
                    <br>
                    <h4><i>Sanggar Pari Purna - Bali</i></h4>
                    <p>Kategori : Wayang</p>
                    <p><i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i> 5/5</p>

                    <p><strong>Wayang Lemah</strong> - Wayang lemah adalah pertunjukkan wayang yang tidak dilakukan pada malam hari dan biasanya
                        berkaitan dengan pelaksanaan suatu upacara agama. </p>
                    <hr>
                    <br>
                    <h4>Tentang Sanggar Pari Purna - Bali</h4>
                    <p>Sanggar Paripurna didirikan pada tanggal 1 April 1990 oleh seniman multi talenta asal Desa
                        Bona, Kecamatan Blahbatuh, I Made Sidja, tersebut mencakup berbagai bidang kesenian, seperti
                        seni pedalangan, seni wayang, seni tabuh, seni tari, seni pertunjukan, seni ukir kulit, seni
                        membuat sesajen, dan yang lainnya. Pendirian Sanggar Paripurna dimaksudkan sebagai pusat
                        pelestarian, pengembangan dan penciptaan seni budaya Bali. Sanggar ini terutama menampung
                        dan mengasah bakat seni anak-anak putus sekolah atau mereka yang sudah tamat sekolah tetapi
                        belum bekerja.</p>
                </div>
                    <div class="col-lg-6">
                        <div class="container">

                        <!-- disni corousel -->
                        <div id="sync1" class="slider owl-carousel">
                                <div class="item"><img src="{{ asset('img/product/Wayang-1-1024x543.jpg')}}" alt=""></div>
                                <div class="item"><img src="{{ asset('img/product/wayang-golek.jpg')}}" alt=""></div>
                                <div class="item"><img src="{{ asset('img/product/wayanglemah2.jpg')}}" alt=""></div>
                            </div>
                            <div id="sync2" class="navigation-thumbs owl-carousel mb-3">
                                <div class="item"><img src="{{ asset('img/product/Wayang-1-1024x543.jpg')}}" alt=""></div>
                                <div class="item"><img src="{{ asset('img/product/wayang-golek.jpg')}}" alt=""></div>
                                <div class="item"><img src="{{ asset('img/product/wayanglemah2.jpg')}}" alt=""></div>
                            </div>
                        <!-- sampe sini -->
                            <h6><strong>Wayang Lemah</strong></h6>
                            <h6><strong>Rp. 2000.0000</strong></h6>
                            <h6><i>dari Bali</i></h6>

                            <p>Tanggal Acara :</p>
                            <form action="">
                                <div class="form-group row">
                                    <label for="inputTglMulai" class="col-sm-2 col-form-label">Mulai</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-input-tanggal" id="inputMulai" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTglMulai" class="col-sm-2 col-form-label">Berakhir</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-input-tanggal" id="inputBerakhir" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                @if(Auth::check())
                                    <a href="/pembayaran" class="btn btn-book">Book</a>
                                @else
                                    <a href="/login" class="btn btn-book">Book</a>
                                @endif
                                    {{-- <button type="button" class="btn btn-chat">Chat</button> --}}

                            </form>

                         </div>

                    </div>
     </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="container mt-4 text-center">
                <hr>
                <h2 class="mt-4 section-heading color-budayaku">RELATED</h2>
            </div>
                    <div class="col-md-6 col-lg-3 mb-4 mt-5 d-flex">
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
                    <div class="col-md-6 col-lg-3 mb-4 mt-5 d-flex">
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
                        <div class="col-md-6 col-lg-3 mb-4 mt-5 d-flex">
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
                            <div class="col-md-6 col-lg-3 mb-4 mt-5 d-flex">
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

</section>
@endsection

@push('js')
<script>
var sync1 = $(".slider");
var sync2 = $(".navigation-thumbs");

var thumbnailItemClass = '.owl-item';

var slides = sync1.owlCarousel({
	video:true,
  startPosition: 12,
  items:1,
  loop:true,
  margin:10,
  nav: false,
  dots: true
}).on('changed.owl.carousel', syncPosition);

function syncPosition(el) {
  $owl_slider = $(this).data('owl.carousel');
  var loop = $owl_slider.options.loop;

  if(loop){
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    if(current < 0) {
        current = count;
    }
    if(current > count) {
        current = 0;
    }
  }else{
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
    sync2.trigger('to.owl.carousel',[current, duration, true]);
  }
}
var thumbs = sync2.owlCarousel({
  startPosition: 12,
  items:4,
  loop:false,
  margin:10,
  autoplay:false,
  nav: false,
  dots: false,
  onInitialized: function (e) {
    var thumbnailCurrentItem =  $(e.target).find(thumbnailItemClass).eq(this._current);
    thumbnailCurrentItem.addClass('synced');
  },
})
.on('click', thumbnailItemClass, function(e) {
    e.preventDefault();
    var duration = 300;
    var itemIndex =  $(e.target).parents(thumbnailItemClass).index();
    sync1.trigger('to.owl.carousel',[itemIndex, duration, true]);
}).on("changed.owl.carousel", function (el) {
  var number = el.item.index;
  $owl_slider = sync1.data('owl.carousel');
  $owl_slider.to(number, 100, true);
});
</script>
@endpush
