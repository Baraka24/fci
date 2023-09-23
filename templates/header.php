<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">FIC Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">

        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="../assets/img/<?php echo $_SESSION['PROFILE'] ?>" alt="Profile" class="rounded-circle"
                        style="height: 40px; width:40px;">
                    <span
                        class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['POSTNOM'] . " " . $_SESSION['PRENOM'] ?></span>
                </a><!-- End Profile Iamge Icon -->


                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $_SESSION['POSTNOM'] . " " . $_SESSION['PRENOM'] ?></h6>
                        <span>MEMBRE</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="../admin/users-profile.php">
                            <i class="bi bi-person"></i>
                            <span>Mon Profil</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="../includes/sessionclose.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Se déconnecter</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->

            </li><!-- End Profile Nav -->


        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->