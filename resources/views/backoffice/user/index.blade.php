@extends('layouts.backoffice')
@section('content')

    <!-- Content Start -->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white d-inline-block">
                        <h6>Data Akun Penggna</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mb-4">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm "><i
                                    class="icon icon-add"></i>Tambah User</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable" id="data-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Verified</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    @switch($item->role->name)
                                        @case('superadmin')
                                        <?php $color = 'badge-primary'; ?>
                                        @break
                                        @case('staff')
                                        <?php $color = 'badge-success'; ?>
                                        @break
                                        @default
                                        <?php $color = 'btn-budayaku'; ?>
                                        @break

                                    @endswitch
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->profile->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><span class="badge {{ $color }}">{{ ucwords($item->role->name) }}</span>
                                        </td>
                                        <td>{{ $item->verified }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $item->id) }}"
                                               class="btn btn-primary btn-xs"><i
                                                    class="icon icon-pencil"></i>Ubah</a>
                                            <button onclick="deleteAkun('{{ $item->id }}', '{{ $item->profile->name }}')"
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
@endsection
@push('js')
    <script>
        $('#data-table').DataTable({
            "columnDefs": [{
                "targets": 6,
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteAkun(accountId, accountName) {
            swal({
                title: "Apa anda yakin?",
                text: "Anda Menghapus User " + accountName,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('users.destroy', ':accountId') }}";
                    theUrl = theUrl.replace(":accountId", accountId);
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
