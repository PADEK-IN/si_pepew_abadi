<div class="main-header-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
        <a href="#" class="logo">
            <img src="/assets/admin/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20"/>
        </a>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
            <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
        </div>
        <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
    </div>
    <!-- End Logo Header -->
</div>
<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <!-- <h3 class="fw-bold mb-3">CV. Samudera Abadi</h3> -->
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <!-- profile -->
            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="profile-username">
                        <span class="fw-bold"><?= $_SESSION['nama'] ?></span>
                    </span>
                    <div class="avatar-sm">
                        <img src="/assets/img/profile/<?= $_SESSION['foto'] ?>" alt="..." class="avatar-img rounded-circle"/>
                    </div>  
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img src="/assets/img/profile/<?= $_SESSION['foto'] ?>" alt="image profile" class="avatar-img rounded"/>
                                </div>
                                <div class="u-text">
                                    <h4><?= $_SESSION['nama'] ?></h4>
                                    <p class="text-muted"><?php echo $_SESSION['user']['email'] ?></p>
                                </div>
                            </div>
                        </li>
                        <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/admin/profile">My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->