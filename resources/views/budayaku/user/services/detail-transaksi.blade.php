@extends('layouts.main')
@section('body') class="bg-light"
@endsection

@section('content')
<section class="mt-5" id="edit-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
    @include('budayaku.user.sidebar-dashboard')
            </div>
            <div class="col-md-9">
                    <small>
                        <ol class="breadcrumb" style="background:transparent">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/payment/invoices">Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">BDYXII902391031</li>
                        </ol>
                    </small>
                    <hr>
                <h2 class="section-heading pl-3">Detail Transaksi</h2>
                <div class="card history-transaksi">
                    {{-- Loop Content --}}
                    <div class="form-header">
                        Nomor Transaksi : <b>BDYXII902391031</b>
                        <span class="pull-right"><a href="#" class="badge color-budayaku"><i class="fa fa-print"></i> Print</a></span>
                    </div>
                    <div class="form-pembayaran p-md-3">
                        <div class="row border-bottom">
                            <div class="col-sm-4">
                                <img class="d-block mx-auto card-img-transaksi mb-3" src="{{ asset('img/wayang_lemah.jpg') }}" alt="">
                            </div>
                            <div class="col-sm-5 align-content-center">
                                <div>
                                    <small class="text-muted">Nama</small>
                                    <a href="">
                                        <p>Wayang Lemah</p>
                                    </a>
                                </div>
                                <div>
                                    <small class="text-muted">Penyedia Jasa</small>
                                    <p><a href="" class="text-dark">Sanggar Paripurna - Bali</a></p>

                                </div>
                                <div>
                                    <small class="text-muted">Status</small>
                                    <p class="payment-status">Dibayar</p>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div>
                                    <small class="text-muted">Harga Layanan :</small>
                                    <p class="price-amount">Rp 2.000.000</p>
                                </div>
                                <div>
                                    <small class="text-muted">Biaya Transportasi :</small>
                                    <p class="price-amount">Rp 1.000.000</p>
                                </div>
                                <div>
                                    <small class="text-muted">Total :</small>
                                    <p class="price-amount">Rp. 3.000.000</p>
                                </div>

                            </div>
                        </div>
                        <div class="row text-center bg-light border-bottom">
                            <div class="col-sm-4 p-md-2">
                                <small class="text-muted"><i class="fa fa-calendar"></i> Tanggal Keberangkatan</small>
                                <p>15 September 2018</p>
                            </div>
                            <div class="col-sm-4 p-md-2">
                                <small class="text-muted"><i class="fa fa-calendar"></i> Tanggal Mulai Acara</small>
                                <p>17 September 2018</p>
                            </div>
                            <div class="col-sm-4 p-md-2">
                                <small class="text-muted"><i class="fa fa-calendar"></i> Tanggal Berakhir Acara</small>
                                <p>18 September 2018</p>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <small class="text-muted">Detail Alamat</small>
                            <p>Gedung serba guna Jl. Telekomunikasi No. 01, Terusan Buah Batu, Sukapura, Dayeuhkolot, Bandung,
                                Jawa Barat 40257</p>
                        </div>
                    </div>

                    {{-- End Loop Content --}}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('js')
<script>
    $(function () {
    $('[data-toggle="popover"]').popover()
  })

</script>
@endsection