<!-- Sidebar -->
<aside class="main-sidebar fixed offcanvas shadow red accent-2 text-white no-b sidebar-dark">
    <section class="sidebar">
        <div class="mt-3 mb-3 ml-3">
            <h4 class="s-18 font-budayaku">Panel Budayaku</h4>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#}">
                    <i class="icon icon-dashboard2 s-18"></i>Dashboard
                </a>
            </li>
            <li><a href="{{ route('partners.index') }}"><i class="icon icon-party_modeg s-18"></i>Partner</a></li>
            <li><a href="{{ route('users.index') }}"><i class="icon icon-account_circle s-18"></i>Akun
                    Pengguna</a></li>
            <li class="header">
                <strong>Akun</strong>
            </li>
            <li><a href="{{route('logout')}}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon icon-exit_to_app s-18"></i>Logout</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>


        </ul>
    </section>
</aside>
<!--Sidebar End-->
