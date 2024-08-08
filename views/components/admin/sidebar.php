<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="/admin/dashboard" class="text-light m-3 logo">
                <b>CV. Samudera Abadi</b>
            </a>
            <hr>
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
                    <h4 class="text-section">menu</h4>
                </li>
                <!-- User -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#user">
                    <i class="fas fa-user"></i>
                        <p>User</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/admin-list">
                                <span class="sub-item">Admin</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/pelanggan-list">
                                <span class="sub-item">Pelanggan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Product -->
                <li class="nav-item">
                    <a href="/admin/barang">
                        <i class="far fa-window-restore"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <!-- transaksi -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#transaksi">
                        <i class="far fa-chart-bar"></i>
                        <p>Transaksi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="transaksi">
                        <ul class="nav nav-collapse">
                            <!-- <li>
                                <a href="/admin/pemesanan">
                                <span class="sub-item">Pemesanan</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="/admin/transaksi/list">
                                <span class="sub-item">List</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/pengiriman">
                                <span class="sub-item">Pengiriman</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- widgets -->
                <!-- <li class="nav-item">
                    <a href="/login">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>LogOut</p>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->