<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - SPK Rek Suplemen</title>

    <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/main.min.css" />
</head>

<body>
    <!-- Container start -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
                <form action="<?= base_url('auth/do_login'); ?>" method="post" class="my-5">
                    <div class="border rounded-2 p-4 mt-5">
                        <div class="login-form">
                            <div class="text-center mb-4">
                                <h3> <a href="#" class="navbar-brand fw-bold">
                                        <i class="bi bi-capsule-pill text-primary"></i> Omega3 DSS
                                    </a></h3>
                                <p class="text-muted">Silakan login untuk melanjutkan</p>
                            </div>

                            <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan password" required />
                            </div>

                            <div class="d-grid py-3 mt-4">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container end -->
</body>

</html>