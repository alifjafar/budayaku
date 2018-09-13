<template>
    <div>
    <div class="row mb-3 mt-3">
        <div class="col-md-6 mb-2">
            <div class="input-group">
                <input class="form-control py-2 border-right-0 border" type="search" placeholder="Cari Transaksi"
                       v-model="search">
                <span class="input-group-append">
                                    <div class="input-group-text bg-white text-muted"><i class="fa fa-search"></i></div>
                                </span>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <select class="selectpicker form-control" multiple title="Pilih Status" data-style="bg-white border">
                <option>Dibayar</option>
                <option>Belum dibayar</option>
                <option>Dibatalkan</option>
            </select>
        </div>
    </div>
    <div class="card history-transaksi">

        <div class="row content" v-for="transaksi in filteredInvoices">
            <span class="form-header">Nomor Tagihan : {{transaksi.nomor}}</span>
            <div class="container form-pembayaran">
                <div class="row">
                    <div class="col-md-6 row">
                        <div class="col-sm-6">
                            <p><i class="fa fa-tag"></i> <a href="#" class="text-muted">{{ transaksi.kategori }}</a></p>
                            <img class="card-img-transaksi" v-bind:src="'/img/wayang_lemah.jpg'" alt="Card image cap">
                        </div>
                        <div class="col-sm-6 mt-4">
                            <a href="">
                                <p>{{ transaksi.namaJasa }}</p>
                                <p>{{ transaksi.owner }}</p>
                            </a>
                            <p><strong><i>Rp. 2000.000</i></strong></p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6>Waktu Acara</h6>
                        <p><strong>27-30 September 2018</strong></p>
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
    </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                search: '',
                invoices: [
                    {
                        id: '1',
                        nomor: 'BDYXII902391031',
                        kategori: 'Seni Wayang',
                        namaJasa: 'Wayang Lemah',
                        owner: 'Sanggar Paripurna - Bali'
                    },
                    {
                        id: '2',
                        nomor: 'BDYXII912391030',
                        kategori: 'Seni Wayang',
                        namaJasa: 'Wayang Lemah',
                        owner: 'Sanggar Paripurna - Bali'
                    }
                ]
            };
        },
        computed:
            {
                filteredInvoices() {
                    return this.invoices.filter(inv => {
                        return (inv.nomor.toLowerCase().includes(this.search.toLowerCase()) || inv.namaJasa.toLowerCase().includes(this.search.toLowerCase()))
                    })
                    //return this.customers;
                }
            }
    }
</script>
