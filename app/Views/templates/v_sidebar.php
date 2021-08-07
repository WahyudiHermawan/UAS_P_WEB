<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Wahyudi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('antrian'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Antrian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('ambil'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Ambil Antrian</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Loket Panggil
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('loketpanggil'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Loket</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('loket'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Loket</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('pelayanan'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Pelayanan</span>
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->