<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="/admin/dashboard" class="logo">
                <img src="../../assets/admin/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" >
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="/admin/dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <!-- Admin -->
                <li class="nav-item">
                    <a href="/admin/anggota">
                        <i class="fas fa-user"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <!-- Costumer -->
                <li class="nav-item">
                    <a href="/admin/pelanggan">
                        <i class="fas fa-layer-group"></i>
                        <p>Costumer</p>
                    </a>
                </li>
                <!-- Product -->
                <li class="nav-item">
                    <a href="/admin/produk">
                        <i class="fas fa-th-list"></i>
                        <p>Products</p>
                    </a>
                </li>
                <!-- Pesanan -->
                <li class="nav-item">
                    <a href="/admin/pesanan">
                        <i class="fas fa-pen-square"></i>
                        <p>Pesanan</p>
                    </a>
                </li>
                <!-- Laporan -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#charts">
                        <i class="far fa-chart-bar"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/laporan/pengiriman">
                                <span class="sub-item">Laporan Dagang</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/laporan/anngota">
                                <span class="sub-item">Laporan Anggota</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/laporan/pesanan">
                                <span class="sub-item">Laporan Pesanan</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/laporan/pengiriman">
                                <span class="sub-item">Laporan Pengiriman</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- widgets -->
                <li class="nav-item">
                    <a href="/login">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>LogOut</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->