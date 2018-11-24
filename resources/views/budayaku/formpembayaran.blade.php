@extends('layouts.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 mt-5">
                                <!-- Form detai acara -->
                                <span class="form-header">Detail Acara</span>
                                <div class="container form-pembayaran">
                                    <label class="mt-3" for="namaeo">Nama Event Owner / Event Organizer</label><br>
                                    <input type="text" class="form-control mb-3" id="inputnamaeo"
                                           placeholder="Masukan Nama"
                                           value="{{ $product->user->profile->name }}">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">E-Mail</label>
                                            <input type="text" class="form-control mb-3" id="inputemail"
                                                   placeholder="Masukan Nama" value="{{ $product->user->email }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telp">No Handphone</label>
                                            <input type="text" class="form-control mb-3" id="telp"
                                                   placeholder="Masukan No Handphone"
                                                   value="{{ $product->user->profile->telp }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl">Tanggal Booking</label>
                                        <input type="text" value="{{ $product->booking_date }}" class="form-control"
                                               readonly>
                                        <input type="hidden" name="booking_date" value="{{ $product->booking_date }}">
                                    </div>

                                    <label><b>Alamat Acara * (Wajib Diisi)</b></label>

                                    <div class="form-group">
                                        <label for="province">Provinsi</label>
                                        <input type="text" class="form-control mb-3" name="province" id="province"
                                               placeholder="Masukan Provinsi" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="city">Kabupaten / Kota</label>
                                        <input type="text" class="form-control mb-3" id="city"
                                               placeholder="Masukan Kabupaten / Kota" name="city" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="district">Kecamatan</label>
                                        <input type="text" class="form-control mb-3" id="district" name="district"
                                               placeholder="Masukan Kecamatan" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Alamat Lengkap</label>
                                        <textarea class="form-control" rows="5" cols="60" id="address" name="address"
                                                  placeholder="Masukan Alamat Lengkap" required></textarea><br>
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" checked onclick="return false"> Saya telah membaca dan
                                        menyetujui
                                        syarat dan ketentuan
                                        <div>
                                            <a class="mb-4 font-sk" href="#" data-toggle="modal"
                                               data-target="#exampleModalLong">*Syarat
                                                dan Ketentuan</a>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Syarat dan
                                                        Ketentuan
                                                        Transaksi Budayaku</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-budayaku" data-dismiss="modal">
                                                        Mengerti
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- end of form detail acara -->

                            <!-- form ringkasan pembayaran -->

                            <div class="col-lg-6 mt-5">
                                <span class="form-header">Ringkasan</span>
                                <div class="container form-pembayaran">
                                    <div class="container">
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-7">
                                                <p>Jasa Kesenian</p>
                                                <p>Owner Kesenian</p>
                                                <p>Biaya Jasa</p>
                                                <br>
                                                <div class="collapse" id="collapseExample">
                                                    @foreach($product->additionalprice as $item)
                                                        <p class="mt-2 "><strong>{{ $item->name }}</strong></p>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-sm-5">
                                                <p>{{ $product->name }}</p>
                                                <p>{{ $product->provider->name }}</p>
                                                <p>{{ $product->harga }}</p>
                                                <a class="align-text-rigth dropdown-toggle" data-toggle="collapse"
                                                   href="#collapseExample" role="button" aria-expanded="false"
                                                   aria-controls="collapseExample">Biaya Lainnya </a>
                                                <div class="collapse" id="collapseExample">
                                                    @foreach($product->additionalprice as $item)
                                                        <p class="mt-2 ">{{ $item->harga }}</p>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-7">
                                                <p><strong>Total</strong></p>
                                            </div>
                                            <div class="col-sm-5">
                                                <p><strong>{{ $product->totalharga }}</strong></p>
                                            </div>
                                        </div>

                                        <p>Metode Pembayaran</p>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="transfer"
                                                       id="transfer"
                                                       value="option1">
                                                <label class="form-check-label" for="cc">
                                                    Transfer Manual
                                                </label>
                                                <br>
                                                <img src="{{ asset('img/tf.png') }}" alt="Transfer">
                                            </div>
                                            {{--<div class="form-check">--}}
                                            {{--<input class="form-check-input" type="radio" name="transfer" id="cc" value="option2">--}}
                                            {{--<label class="form-check-label" for="cc">--}}
                                            {{--Credit Card--}}
                                            {{--</label>--}}
                                            {{--<br>--}}
                                            {{--<img src="{{ asset('img/cc.png') }}" alt="Credit Card">--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    <div class="ml-3 mt-4 mb-4">
                                        <button type="submit"
                                                class="btn btn-budayaku">Lanjutkan ke Pembayaran
                                        </button>
                                    </div>

                                    <!-- end of ringkasan pembayaran -->

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
