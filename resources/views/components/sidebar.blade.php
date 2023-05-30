<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <img src="{{ asset('logo-black.png') }}" alt="{{ config('app.name') }}" width="35">
            <span class="app-brand-text demo text-black fw-bolder ms-2">Sentra Hki</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Home -->
        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="{{ __('menu.home') }}">{{ __('menu.home') }}</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ __('menu.header.main_menu') }}</span>
        </li>
        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('transaction.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-mail-send"></i>
                <div data-i18n="{{ __('menu.transaction.menu') }}">HKI</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('transaction.incoming.*') || \Illuminate\Support\Facades\Route::is('transaction.disposition.*') ? 'active' : '' }}">
                    <a href="{{ route('transaction.incoming.index') }}" class="menu-link">
                        <div data-i18n="{{ __('menu.transaction.incoming_letter') }}">Pengajuan Sentra HKI</div>
                    </a>
                </li>
            </ul>
            @if(auth()->user()->role == 'staff')
            <ul class="menu-sub">
                <li class=" menu-item">
                    <a class="nav-link dropdown-toggle menu-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="transition: .5s ease-in-out;">
                        Lampiran HKI
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item text-white" href="{{('pengajuan/form-pendaftaran.pdf')}}">Form Pendaftaran Online</a></li>
                        <li><a class="dropdown-item text-white" href="#">Pernyataan Hak Cipta</a></li>
                        <li><a class="dropdown-item text-white" href="#">Surat Pengalihan Hak Cipta</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </li>

        @if(auth()->user()->role == 'admin')
        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('reference.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-analyse"></i>
                <div data-i18n="{{ __('menu.reference.menu') }}">{{ __('menu.reference.menu') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('reference.classification.*') ? 'active' : '' }}">
                    <a href="{{ route('reference.classification.index') }}" class="menu-link">
                        <div data-i18n="{{ __('menu.reference.classification') }}">{{ __('Jenis Pengajuan') }}</div>
                    </a>
                </li>
                <!-- <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('reference.status.*') ? 'active' : '' }}">
                    <a href="{{ route('reference.status.index') }}" class="menu-link">
                        <div data-i18n="{{ __('menu.reference.status') }}">{{ __('Sifat Status') }}</div>
                    </a>
                </li> -->
            </ul>
        </li>
        <!-- User Management -->
        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('user.*') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="{{ __('menu.users') }}">{{ __('menu.users') }}</div>
            </a>
        </li>
        @endif
    </ul>
</aside>