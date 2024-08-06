<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="">samuderaabadi@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 822 7805 0707</span></i>
    </div>
    <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://www.facebook.com" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
    </div>
    </div>
</section>

<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="/barang" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/assets/img/logo.png" alt="">
        <h1>Samudera Abadi<span>.</span></h1>
    </a>
    <nav id="navbar" class="navbar">
        <ul>
            <!-- <li><a href="/home">Beranda</a></li> -->
            <li><a href="/barang">Barang</a></li>
            <!-- <li class="dropdown">
                <a href="#"><span>Pesanan</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="/pemesanan/proses">Diproses</a></li>
                    <li><a href="/pemesanan/selesai">Selesai</a></li>
                </ul>
            </li>  -->
            <li><a href="/tagihan">Tagihan</a></li>        
            <li>
                <a href="/keranjang">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/></svg>
                </a>
            </li>
            <li class="dropdown">
                <a class="nav-link nav-user-img gap-2" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-white"><?= $_SESSION['nama'] ?></span>    
                    <img src="/assets/img/profile/<?= $_SESSION['foto'] ?>" width="31px" alt="user-profile" class="user-avatar-lg rounded-circle border border-1">
                </a>
                <ul>
                    <li><a href="/profile">Profile</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>