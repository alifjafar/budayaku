@extends('layouts.main')

@section('content')
<section>
    <div class="container mt-5">
            <div class="container">
                <div class="col-lg-8">
                    <h4 class="mb-4">Rincian Transaksi</h4>
                    <span class="form-header">Nomor Transaksi</span>
                    <div class="container form-pembayaran">
                    <div class="container row">
                        <div class="col-sm-4">
                            <h6>Kesenian</h6>
                            <img class="card-img-transaksi" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                        </div>
                        <div class="col-sm-5 mt-4">
                            <h6>Wayang Lemah</h6>
                            <p>Sanggar Paripurna - Bali</p>
                        </div>
                        <div class="col-sm-3 mt-4">
                            <p><strong><i>Rp. 2000.000</i></strong></p>
                        </div>                    
                    </div>
                    <hr>
                    <div class="container mt-4">
                        <h6>Status</h6>
                        <p><strong><i>Dibayar</i></strong></p>
                    </div>
                    <hr>
                    <div class="container mt-4">
                        <h6>Biaya Transportasi</h6>
                        <p><strong><i>Rp. 1000.000</i></strong></p>
                    </div>
                    <hr>
                    <div class="container row text-center">
                        <div class="col-sm-4 mt-4">
                            <h6>Tanggal Keberangkatan</h6>
                            <p><strong><i>15 September 2018</i></strong></p>
                        </div>
                        <div class="col-sm-4 mt-4">
                            <h6>Tanggal Mulai Acara</h6>
                            <p><strong><i>17 September 2018</i></strong></p>
                        </div>
                        <div class="col-sm-4 mt-4">
                            <h6>Tanggal Berakhir Acara</h6>
                            <p><strong><i>18 September 2018</i></strong></p>
                        </div>
                    </div>
                    <hr>
                    <div class="container mt-4">
                        <h6>Alamat</h6>
                        <p><strong><i>Gedung serba guna
                        Jl. Telekomunikasi No. 01, Terusan Buah Batu, Sukapura, Dayeuhkolot,
                        Bandung, Jawa Barat 40257</i></strong></p>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
