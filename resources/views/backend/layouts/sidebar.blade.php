<div class="sidebar-wrapper sidebar-theme">
    
    <nav id="sidebar">
        
        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="#">
                        {{-- <img src="{{ asset('back') }}/src/assets/img/logo.svg" class="navbar-logo" alt="logo"> --}}
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{ route('dashboard') }}" class="nav-link"> Putra Teguh </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            
            @can ('Dashboard')
            <li class="menu {{ request()->is('dashboard') ? 'active' : ''}}">
                <a href="{{ route('dashboard') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            @endcan
            
            @can ('Manajemen Pesanan')
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>MANAJEMEN TOKO</span></div>
            </li>
            <li class="menu {{ request()->is('pesanan', 'pesanan/success', 'pesanan/*') ? 'active' : ''}}">
                <a href="{{ route('pesanan.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        <span>Manajemen Pesanan</span>
                        {{-- <span class="badge badge-primary sidebar-label pesanan-count">0</span> --}}
                    </div>
                </a>
            </li>
            @endcan
            
            @can ('Manajemen Rating')
            <li class="menu {{ request()->is('rating', 'rating/*') ? 'active' : ''}}">
                <a href="{{ route('rating.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span>Manajemen Rating</span>
                    </div>
                </a>
            </li>
            @endcan
            
            
            @can ('Metode Pembayaran')
            <li class="menu {{ request()->is('ongkir', 'ongkir/*') ? 'active' : ''}}">
                <a href="{{ route('ongkir.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                        <span>Ongkos Kirim</span>
                    </div>
                </a>
            </li>
            @endcan
            
            
            @canany(['Kategori Produk', 'Semua Produk'])
            <li class="menu {{ request()->is('kategori-produk', 'kategori-produk/*/edit','produk', 'produk/*/edit', 'produk/show/*', 'produk/create') ? 'active' : ''}}">
                <a href="#store" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        <span>Store & Produk</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="store" data-bs-parent="#accordionExample">
                    @can('Kategori Produk')
                    <li class="menu {{ request()->is('kategori-produk', 'kategori-produk/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('kategori-produk.index') }}"> Kategori Produk </a>
                    </li>
                    @endcan
                    
                    @can ('Semua Produk')
                    <li class="menu {{ request()->is('produk', 'produk/*/edit', 'produk/show/*', 'produk/create') ? 'active' : ''}}">
                        <a href="{{ route('produk.index') }}"> Semua Produk </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            
            
            @canany(['Slide', 'Navbar Promosi', 'Banner Promosi', 'Tiga Promosi'])
            <li class="menu {{ request()->is('slider', 'slider/*/edit', 'promosi-navbar', 'promosi-navbar/*/edit', 'tiga-promosi', 'tiga-promosi/*/edit', 'banner-promosi') ? 'active' : ''}}">
                <a href="#slide-promosi" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="">
                        
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                        <span>Slide & Promosi</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                @can('Slide')
                <ul class="collapse submenu list-unstyled" id="slide-promosi" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('slider', 'slider/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('slider.index') }}"> Slide </a>
                    </li>
                </ul>
                @endcan
                
                @can ('Navbar Promosi')
                <ul class="collapse submenu list-unstyled" id="slide-promosi" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('promosi-navbar', 'promosi-navbar/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('promosi-navbar.index') }}"> Navbar Promosi </a>
                    </li>
                </ul>
                @endcan
                
                @can ('Banner Promosi')
                <ul class="collapse submenu list-unstyled" id="slide-promosi" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('banner-promosi', 'banner-promosi/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('banner-promosi.index') }}"> Banner Promosi </a>
                    </li>
                </ul>
                @endcan
                
                @can ('Tiga Promosi')
                <ul class="collapse submenu list-unstyled" id="slide-promosi" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('tiga-promosi', 'tiga-promosi/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('tiga-promosi.index') }}">Tiga Promosi</a>
                    </li>
                </ul>
                @endcan
            </li>
            @endcanany
            
            
            @can ('Metode Pembayaran')
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>PENGATURAN</span></div>
            </li> 
            <li class="menu {{ request()->is('payment', 'payment/*') ? 'active' : ''}}">
                <a href="{{ route('payment.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        <span>Metode Pembayaran</span>
                    </div>
                </a>
            </li>
            @endcan
            
            @canany(['Role', 'Permission', 'Permission to Role', 'Role to User'])
            <li class="menu {{ request()->is('role', 'role/*/edit','permission', 'permission/*/edit', 'assignpermission', 'assignpermission/*/edit', 'assignrole','assignrole/*/edit') ? 'active' : ''}}">
                <a href="#pengaturan" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        <span>Role & Permission</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="pengaturan" data-bs-parent="#accordionExample">
                    @can('Role')
                    <li class="menu {{ request()->is('role', 'role/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('role.index') }}"> Role </a>
                    </li>
                    @endcan
                    
                    @can ('Permission')
                    <li class="menu {{ request()->is('permission','permission/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('permission.index') }}"> Permission </a>
                    </li>
                    @endcan
                    
                    @can ('Permission to Role')
                    <li class="menu {{ request()->is('assignpermission','assignpermission/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('assignpermission.index') }}">Permission to Role </a>
                    </li>
                    @endcan
                    
                    @can('Role to User')
                    <li class="menu {{ request()->is('assignrole','assignrole/*/edit') ? 'active' : ''}}">
                        <a href="{{ route('assignrole.index') }}">Role to User </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            
            @can('Semua User')
            <li class="menu {{ request()->is('user', 'user/*' ,'change-password') ? 'active' : ''}}">
                <a href="#user-manajemen" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Manajemen Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                
                @can('Semua User')
                <ul class="collapse submenu list-unstyled" id="user-manajemen" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('user', 'user/*') ? 'active' : ''}}">
                        <a href="{{ route('user.index') }}"> Semua User </a>
                    </li>
                </ul>
                @endcan
                
            </li>
            @endcan
            
            @canany(['Privacy Policy', 'Terms Conditions'])
            <li class="menu {{ request()->is('privacy-policy-admin','terms-conditions-admin') ? 'active' : ''}}">
                <a href="#kebijakan-privacy" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <span>Kebijakan/Privacy</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                
                @can('Privacy Policy')
                <ul class="collapse submenu list-unstyled" id="kebijakan-privacy" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('privacy-policy-admin') ? 'active' : ''}}">
                        <a href="{{ route('privacy-policy-admin.index') }}"> Privacy Policy </a>
                    </li>
                </ul>
                @endcan
                
                @can('Terms Conditions')
                <ul class="collapse submenu list-unstyled" id="kebijakan-privacy" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('terms-conditions-admin') ? 'active' : ''}}">
                        <a href="{{ route('terms-conditions-admin.index') }}"> Terms Conditions </a>
                    </li>
                </ul>
                @endcan
            </li>
            @endcanany
            
            @canany(['About Company', 'Contact Masuk', 'Setting Info Web'])
            <li class="menu {{ request()->is('about-company', 'setting-info-website', 'contact-company', 'contact-company/*/show') ? 'active' : ''}}">
                <a href="#setting-website" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                        <span>Setting Website</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                
                @can ('About Company')
                <ul class="collapse submenu list-unstyled" id="setting-website" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('about-company') ? 'active' : ''}}">
                        <a href="{{ route('about-company.index') }}"> About Company </a>
                    </li>
                </ul>
                @endcan
                
                @can ('Contact Masuk')
                <ul class="collapse submenu list-unstyled" id="setting-website" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('contact-company') ? 'active' : ''}}">
                        <a href="{{ route('contact-company.index') }}"> Contact Masuk </a>
                    </li>
                </ul>
                @endcan
                
                @can ('Setting Info Web')
                <ul class="collapse submenu list-unstyled" id="setting-website" data-bs-parent="#accordionExample">
                    <li class="menu {{ request()->is('setting-info-website') ? 'active' : ''}}">
                        <a href="{{ route('setting-info-website.index') }}"> Setting Info Web</a>
                    </li>
                </ul>
                @endcan
                
            </li>
            @endcanany
            
        </ul>
        
    </nav>
    
</div>