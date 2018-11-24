@extends('layouts.main')
@push('body') class="bg-light"
@endpush

@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
    </style>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">--}}
    <style>
        .dropzone {
            border: 2px dashed #f7363d;
            border-radius: 5px;
            background: white;
        }
    </style>
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
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </small>
                    <hr>
                    <h2 class="section-heading pl-3">Daftar Product</h2>
                    <div class="card">
                        <div class="card-header">
                            Filter
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm">Ubah</a>
                                                <button class="btn btn-danger btn-sm"
                                                        onclick="deleteProduct('{{ $item->id }}','{{ $item->name }}')">
                                                    <i
                                                        class="fa fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Belum ada produk jasa</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
    <script>
        @if(Session::has('success'))
        swal("Berhasil !", '{{ Session::get('success') }}', "success");
        @endif

    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteProduct(productId, productName) {
            swal({
                title: "Apa anda yakin?",
                text: "Anda Menghapus Product " + productName,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('product.destroy', ':productId') }}";
                    theUrl = theUrl.replace(":productId", productId);
                    $.ajax({
                        type: 'POST',
                        url: theUrl,
                        data: {_method: "delete"},
                        success: function (data) {
                            window.location.href = data;
                        },
                        error: function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    });
                }
            }));
        }
    </script>
@endpush
