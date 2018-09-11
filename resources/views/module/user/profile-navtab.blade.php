<ul class="nav nav-tabs nav-fill">
    <li class="nav-item title">
        <a class="nav-link title {{ Request::url() == route('edit-profile', $user->username) ? 'active' : '' }}"
            href="{{ route('edit-profile', $user->username) }}">Biodata Diri</a>
    </li>
    <li class="nav-item title">
        <a class="nav-link {{ Request::url() == route('edit-password', $user->username) ? 'active' : '' }}"
            href="{{ route('edit-password', $user->username) }}">Ganti Password</a>
    </li>

</ul>