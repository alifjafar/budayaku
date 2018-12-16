@extends('layouts.backoffice')
@section('content')

    <!-- Content Start -->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white d-inline-block">
                        <h6>Daftar Partner Budayaku</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable" id="data-table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($partners as $item)
                                    @switch($item->status)
                                        @case('Active')
                                        <?php $color = 'badge-success'; ?>
                                        @break
                                        @default
                                        <?php $color = 'btn-secondary'; ?>
                                        @break

                                    @endswitch
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if ( strlen( $item->description ) > 60 ) {{ substr( $item->description, 0, 60 ) }}
                                            ... @else {{ $item->description
                                        }} @endif</td>
                                        <td>{{ $item->user->profile->name }}</td>
                                        <td><span class="badge {{ $color }}">{{ ucwords($item->status) }}</span>
                                        </td>
                                        <td>
                                            <button data-toggle="modal"
                                                    data-target="#manageRequest" data-data="{{ $item }}"
                                                    class="btn btn-primary btn-xs"><i
                                                    class="icon icon-pencil"></i>Manage
                                            </button>
                                            <button
                                                onclick="deletePartner('{{ $item->id }}', '{{ $item->name }}')"
                                                class="btn btn-danger btn-xs"><i
                                                    class="icon icon-trash"></i>Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

    <!-- Modal -->
    <div class="modal fade" id="manageRequest" role="dialog" aria-labelledby="manageRequest" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="changeStatus">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nama Partner</label>
                            <input type="text" id="name" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" class="form-control" rows="4" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label for="card">Kartu Identitas</label>
                            <div class="mb-1">
                                <button class="btn btn-danger btn-xs" type="button" data-toggle="collapse"
                                        data-target="#collapseCard" aria-expanded="false" aria-controls="collapseCard">
                                    Buka Gambar
                                </button>
                            </div>

                            <div class="collapse" id="collapseCard">
                                <div class="card card-body">
                                    <img src="" alt="Kartu Identitas" class="img-fluid" id="card">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="custom-select">
                                <option value="Pending">Pending</option>
                                <option value="Active">Active</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea id="address" class="form-control" rows="4" readonly></textarea>
                        </div>

                        <div class="modal-footer bg-white">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#data-table').DataTable({
            "columnDefs": [{
                "targets": 4,
                "orderable": false
            }],
            "responsive": true,
            "pageLength": 10,
            "language": {
                "lengthMenu": "Tampilkan _MENU_ per halaman",
                "zeroRecords": "Tidak ada data",
                "info": "Tampilkan _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "",
                "search": "Cari Data :",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                }
            }
        });

        @if(Session::has('success'))
        swal("Berhasil !", '{{ Session::get('success') }}', "success");
        @endif

    </script>

    <script>
        $('#manageRequest').on('show.bs.modal', function (e) {
            let
                button = $(e.relatedTarget),
                data = button.data('data'),
                name = data.name,
                id = data.id,
                status = data.status;

            $('#name').val(name);
            $('#status').find('option[value="' + status + '"]').attr('selected', true);
            $('#changeStatus').attr('action', "{{ route('partners.index') }}/" + id);
            $('#description').val(data.description);
            $('#card').attr('src', '{{ asset('storage') }}' + '/' + data.id_card);
            $('#address').val(data.address);

        })
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deletePartner(partnerId, partnerName) {
            swal({
                title: "Apa anda yakin?",
                text: "Anda Menghapus Partner " + partnerName,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('partners.destroy', ':partnerId') }}";
                    theUrl = theUrl.replace(":partnerId", partnerId);
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
