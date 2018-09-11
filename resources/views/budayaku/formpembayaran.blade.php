@extends('layouts.main')

@section('content')
<section>
    <div class="container">
            <div class="row">
                <div class="container col-lg-6 mt-5">
                    <form action="">
                        <!-- Form detai acara -->
                            <span class="form-header">Detail Acara</span>
                            <div class="container form-pembayaran">
                                <label class="mt-3" for="namaeo">Nama Event Owner / Event Organizer</label><br>
                                <input type="text" class="form-control mb-3" id="inputnamaeo" placeholder="Masukan Nama">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">E-Mail</label>
                                            <input type="text" class="form-control mb-3" id="inputemail" placeholder="Masukan Nama">
                                            <label for="tglacara">Tanggal Acara</label><br>
                                            <div class="form-group row">
                                                <label for="inputTglMulai" class="col-sm-4 col-form-label">Mulai</label>
                                                <div class="col-sm-8">
                                                <input type="date" class="form-control" id="inputMulai" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputTglMulai" class="col-sm-4 col-form-label">Berakhir</label>
                                                <div class="col-sm-8">
                                                <input type="date" class="form-control" id="inputBerakhir" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">No Handphone</label>
                                            <input type="text" class="form-control mb-3" id="inputnohp" placeholder="Masukan No Handphone">
                                            <label for="tglberangkat">Tanggal Keberangkatan</label>
                                            <input type="date" class="form-control" id="inputberangkat" placeholder="dd/mm/yyyy-dd/mm/yyyy">
                                        </div>
                                    </div>

                                <p class="mt-3">Alamat Acara</p>
                                <label for="prov">Provinsi</label>
                                <input type="text" class="form-control mb-3" id="inputprov" placeholder="Masukan Provinsi">
                                <label for="kab">Kabupaten / Kota</label>
                                <input type="text" class="form-control mb-3" id="inputkab" placeholder="Masukan Kabupaten / Kota">
                                <label for="kec">Kecamatan</label>
                                <input type="text" class="form-control mb-3" id="inputkec" placeholder="Masukan Kecamatan">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea class="form-control" rows="5" cols="60" id="inputalamat" placeholder="Masukan Alamat Lengkap"></textarea><br>
                                <input type="checkbox"> Saya telah membaca dan menyetujui syarat dan ketentuan
                                <br>
                                <p><a class="mb-4 font-sk" href="#" data-toggle="modal" data-target="#exampleModalLong">*Syarat dan Ketentuan</a></p>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Syarat dan Ketentuan Transaksi Budayaku</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                    </form>
                </div>

                <!-- end of form detail acara -->

                <!-- form ringkasan pembayaran -->

                <div class="container col-lg-6 mt-5">
                    <form action="">
                            <span class="form-header">Ringkasan</span>
                                <div class="container form-pembayaran">
                                    <div class="container">
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-7">
                                                <p>Harga</p>
                                            </div>
                                            <div class="col-sm-5">
                                                <p>Rp.2000.000</p>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-7">
                                                <p>Biaya Transportasi</p>
                                            </div>
                                            <div class="col-sm-5">
                                                <p>Rp.2000.000</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-7">
                                                <p><strong>Total</strong></p>
                                            </div>
                                            <div class="col-sm-5">
                                                <p><strong>Rp.2000.000</strong></p>
                                            </div>
                                        </div>

                                        <p>Metode Pembayaran</p>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="transfer" id="transfer" value="option1">
                                                <label class="form-check-label" for="cc">
                                                    Transfer
                                                </label>
                                                <br>
                                                <img src="{{ asset('img/tf.png') }}" alt="Transfer">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="cc" id="cc" value="option2">
                                                <label class="form-check-label" for="cc">
                                                    Credit Card
                                                </label>
                                                <br>
                                                <img src="{{ asset('img/cc.png') }}" alt="Credit Card">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center ml-5 mt-4 mb-4">
                                        <a href="{{ route('detail-transaksi', 'BDYXII902391031') }}" class="btn btn-book">Bayar</a>
                                    </div>

                                    <!-- end of ringkasan pembayaran -->

                                </div>
                    </form>
                </div>
     </div>
</section>
@endsection
