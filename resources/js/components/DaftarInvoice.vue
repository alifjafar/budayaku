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
                <span class="form-header">Nomor Tagihan : {{ transaksi.booking_number }}</span>
                <div class="container form-pembayaran">
                    <div class="row">
                        <div class="col-md-6 row">
                            <div class="col-sm-6">
                                <p><i class="fa fa-tag"></i> <a href="#" class="text-muted">{{ transaksi.category.name }}</a>
                                </p>
                                <img class="card-img-transaksi" v-bind:src="'/storage/' + transaksi.image[0].path + transaksi.image[0].filename" alt="Card image cap">
                            </div>
                            <div class="col-sm-6 mt-4">
                                <a href="">
                                    <p>{{ transaksi.product.name }}</p>
                                    <p>{{ transaksi.provider.name }}</p>
                                </a>
                                <p><strong><i>{{ transaksi.total_amount }}</i></strong></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h6>Waktu Acara</h6>
                            <p><strong>{{ transaksi.detail.start_date}} -  {{ transaksi.detail.end_date}}</strong></p>
                        </div>
                        <div class="col-md-2">
                            <h6>Status</h6>
                            <p><strong><i>{{ transaksi.status }}</i></strong></p>
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
                invoices: [],
            };
        },
        mounted() {
            window.axios.get('/booking')
                .then(res => (this.invoices = res.data.data))
                .catch(error => console.log(error));
        },
        computed:
            {
                filteredInvoices() {
                    return this.invoices.filter(inv => {
                        return (inv.booking_number.toLowerCase().includes(this.search.toLowerCase()) || inv.product.name.toLowerCase().includes(this.search.toLowerCase()))
                    })
                    //return this.customers;
                }
            }
    }
</script>
