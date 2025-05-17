<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$url = end($url);
?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main Menu</div>
                <a class="nav-link <?php echo $url == "index.php" || $url == "" ? 'active' : '' ?>" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo in_array($url, ["list-pegawai.php", "create-pegawai.php"]) ? 'active' : '' ?>" href="list-pegawai.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                    Data Pegawai
                </a>
                <a class="nav-link <?php echo in_array($url, ["list-anggota.php", "create-anggota.php"]) ? 'active' : '' ?>" href="list-anggota.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Data Anggota
                </a>
                <a class="nav-link <?php echo in_array($url, ["list-kartu-diskon.php", "create-kartu-diskon.php"]) ? 'active' : '' ?>" href="list-kartu-diskon.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
                    Data Kartu Diskon
                </a>
                <a class="nav-link <?php echo in_array($url, ["list-produk.php", "create-produk.php"]) ? 'active' : '' ?>" href="list-produk.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Data Produk
                </a>
                <a class="nav-link <?php echo in_array($url, ["list-jenis-produk.php", "create-jenis-produk.php"]) ? 'active' : '' ?>" href="list-jenis-produk.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                    Data Jenis Produk
                </a>
                <a class="nav-link <?php echo in_array($url, ["list-pesanan.php"]) ? 'active' : '' ?>" href="list-pesanan.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Data Pemesanan
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Shabrina Miladdina
        </div>
    </nav>
</div>