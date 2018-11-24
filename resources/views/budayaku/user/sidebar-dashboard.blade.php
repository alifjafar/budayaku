<div class="card border-light sidebar-dashboard mb-3" id="sidebar-dashboard">
    <div class="card-body">
        <div class="profile-img">
            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->profile->name }}">
            <div class="profile-body">
                <a href="{{ route('profile', Auth::user()->username) }}">
                    <span class="side_name"> {{Auth::user()->profile->name }}</span>
                </a>
                <div class="side_username"> {{ Auth::user()->username }}</div>
            </div>
        </div>

        @if(!Auth::user()->isPartner())
            @cannot('admin')
                <div id="new-agent" class="mt-3">
                    <a href="{{ route('register-partner') }}" class="btn btn-sm btn-budayaku btn-block">Daftar
                        Partner</a>
                </div>
            @endcannot
        @else
            <div id="addService" class="mt-3">
                <span class="btn btn-sm btn-budayaku btn-block" onclick="swalMe()">Iklankan Jasa</span>
            </div>
        @endif
        <div id="nav-sidebar" class="mt-3">
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('dashboard.client') }}">Profil Saya</a>
                @cannot('admin')
                    <a class="nav-link" href="{{ route('booking-list')}}">Transaksi</a>
                @endcannot
                <a href="#" class="nav-link">Notifikasi</a>
            </nav>
        </div>
        @if(Auth::user()->isPartner())
            <hr/>
            <div id="agent" class="mt-3">
                <small class="text-muted">Mitra Budayaku</small>
            </div>
            <div id="nav-sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link" href="{{ route('edit-profile', Auth::user()->username) }}">Dasbor</a>
                    <a class="nav-link" href="{{ route('product.index')}}">Jasa Saya</a>
                    <a href="#" class="nav-link">Pemesanan Layanan</a>
                </nav>
            </div>
        @endif
    </div>
</div>

@can('admin')
    <div class="card border-light sidebar-dashboard mb-3" id="sidebar-dashboard-admin">
        <div class="card-body">
            <div id="adminpanel">
                <small class="text-muted">Admin Budayaku</small>
            </div>
            <div id="admin-panel" class="mt-3">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-budayaku btn-block">Konsole Admin</a>
            </div>
        </div>
    </div>
@endcan
@push('js')
    <script>
        function swalMe() {
            @if(Auth::user()->isPartner())
            @if(Auth::user()->provider->status == "Pending")
            swal({
                title: "Oops!",
                text: "Permintaan untuk bermitra belum di approve",
                icon: "error",
            });
            @else
                window.location.href = '{{ route('product.create') }}';
            @endif
            @endif
        }
    </script>
@endpush
