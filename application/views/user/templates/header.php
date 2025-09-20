<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SPK Rekomendasi Suplemen Omega 3</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/" />
    <meta property="og:url" content="https://www.bootstrap.gallery" />
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery" />
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta property="og:type" content="Website" />
    <meta property="og:site_name" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="<?=base_url();?>/assets/images/favicon.svg" />

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="<?=base_url();?>/assets/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?=base_url();?>/assets/css/main.min.css" />

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="<?=base_url();?>/assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="<?=base_url();?>/assets/vendor/toastify/toastify.css" />

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            toast: true,
            icon: "success",
            title: "<?= $this->session->flashdata('success'); ?>",
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
        Swal.fire({
            toast: true,
            icon: "error",
            title: "<?= $this->session->flashdata('error'); ?>",
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        <?php endif; ?>
    });
    </script>
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">
        <!-- Main container start -->
        <div class="main-container">
            <!-- Sidebar wrapper start -->
            <nav id="sidebar" class="sidebar-wrapper">
                <!-- App brand starts -->
                <div class="app-brand px-3 py-2 d-flex align-items-center">
                    <a href="index.html">
                        <span class="fw-bold fs-4 text-dark">SPK Rek Suplemen</span>
                    </a>
                </div>
                <!-- App brand ends -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <li class="<?=$menu == 'rekomendasi'?'active current-page':''?> ">
                            <a href="<?=base_url('pages');?>">
                                <i class="bi bi-pie-chart"></i>
                                <span class="menu-text">Rekomendasi</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar menu ends -->
            </nav>
            <!-- Sidebar wrapper end -->
            <!-- App container starts -->
            <div class="app-container">
                <!-- App header starts -->
                <div class="app-header d-flex align-items-center">
                    <!-- Toggle buttons start -->
                    <div class="d-flex">
                        <button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
                            <i class="bi bi-text-indent-left fs-5"></i>
                        </button>
                        <button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
                            <i class="bi bi-text-indent-left fs-5"></i>
                        </button>
                    </div>
                    <!-- Toggle buttons end -->

                    <!-- App brand sm start -->
                    <div class="app-brand-sm d-md-none d-sm-block">
                        <a href="<?=base_url('dashboard');?>">
                            <img src="<?=base_url();?>/assets/images/logo-sm.svg" class="logo"
                                alt="Bootstrap Gallery" />
                        </a>
                    </div>
                    <!-- App brand sm end -->

                    <!-- Breadcrumb start -->
                    <ol class="breadcrumb d-none d-lg-flex ms-3">
                        <li class="breadcrumb-item">
                            <i class="bi bi-house lh-1"></i>
                            <a href="index.html" class="text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item text-secondary"><?=ucfirst($menu)?></li>
                    </ol>
                    <!-- Breadcrumb end -->

                    <!-- App header actions start -->
                    <div class="header-actions">
                        <div class="dropdown ms-2">
                            <a id="userSettings"
                                class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none" href="#!"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?=base_url();?>/assets/images/user.png" class="rounded-2 img-3x"
                                    alt="Bootstrap Gallery" />
                            </a>
                        </div>
                    </div>
                    <!-- App header actions end -->
                </div>
                <!-- App header ends -->