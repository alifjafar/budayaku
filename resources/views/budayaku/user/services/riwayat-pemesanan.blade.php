@extends('layouts.main')
@push('body') class="bg-light"
@endpush

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
                        <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                    </ol>
                </small>
                <hr>
                <h2 class="section-heading">Daftar Transaksi</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tablist">
                            <a href="#" class="active">Pemesanan</a>
                            <a href="#">Pesanan Layanan</a>
                        </div>
                    </div>
                </div>
                <daftar-invoice></daftar-invoice>

                    {{-- <div class="row content">
                        <span class="form-header">Nomor Tagihan : BDYXII902391030</span>
                        <div class="container form-pembayaran">
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-sm-6">
                                        <p><i class="fa fa-tag"></i> <a href="#" class="text-muted">Seni Wayang</a></p>
                                        <img class="card-img-transaksi" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                                    </div>
                                    <div class="col-sm-6 mt-4">
                                        <a href="">
                                            <p>Wayang Lemah</p>
                                            <p>Sanggar Paripurna - Bali</p>
                                        </a>
                                        <p><strong><i>Rp. 2000.000</i></strong></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h6>Waktu Acara</h6>
                                    <p><strong>13-16 September 2018</strong></p>
                                </div>
                                <div class="col-md-2">
                                    <h6>Status</h6>
                                    <p><strong><i>Dibayar</i></strong></p>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <a href="/payment/invoices/BDYXII902391031" class="btn btn-budayaku">Lihat Rincian</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row content">
                        <span class="form-header">Nomor Tagihan : BDYXII902391029</span>
                        <div class="container form-pembayaran">
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-sm-6">
                                        <p><i class="fa fa-tag"></i> <a href="#" class="text-muted">Seni Wayang</a></p>
                                        <img class="card-img-transaksi" src="{{ asset('img/wayang_lemah.jpg') }}" alt="Card image cap">
                                    </div>
                                    <div class="col-sm-6 mt-4">
                                        <a href="">
                                            <p>Wayang Lemah</p>
                                            <p>Sanggar Paripurna - Bali</p>
                                        </a>
                                        <p><strong><i>Rp. 2000.000</i></strong></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h6>Waktu Acara</h6>
                                    <p><strong>15-18 Agustus 2018</strong></p>
                                </div>
                                <div class="col-md-2">
                                    <h6>Status</h6>
                                    <p><strong><i>Dibayar</i></strong></p>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <a href="/payment/invoices/BDYXII902391031" class="btn btn-budayaku">Lihat Rincian</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- End Loop Content --}}
            </div>
        </div>
    </div>

</section>
@endsection

@push('js')


{{--<script>--}}
{{--new Vue({--}}
    {{--el: '#invoices',--}}
            {{--data: function(){--}}
                {{--return {--}}
                {{--search: '',--}}
                {{--invoices: [--}}
                {{--{ id: '1', nomor: 'BDYXII902391031', kategori: 'Seni Wayang', namaJasa: 'Wayang Lemah', owner: 'Sanggar Paripurna - Bali'},--}}
                {{--{ id: '2', nomor: 'BDYXII912391030', kategori: 'Seni Wayang', namaJasa: 'Wayang Lemah', owner: 'Sanggar Paripurna - Bali'}--}}
                {{--]};--}}
        {{--},--}}
        {{--computed:--}}
        {{--{--}}
            {{--filteredInvoices()--}}
            {{--{--}}
            {{--return this.invoices.filter(inv =>{--}}
                {{--return (inv.nomor.toLowerCase().includes(this.search.toLowerCase()) || inv.namaJasa.toLowerCase().includes(this.search.toLowerCase()))--}}
            {{--})--}}
            {{--//return this.customers;--}}
            {{--}--}}
        {{--}--}}
{{--});--}}
{{--</script>--}}
@endpush
