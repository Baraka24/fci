<?php
if ($_SESSION['ROLE'] != 0) {
?>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Tableau de bord</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-heading mt-4 mb-2">Main</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="members.php">
                    <i class="bi bi-people-fill"></i>
                    <span>Membres</span>
                </a>
            </li><!-- End Members Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="contribution.php">
                    <i class="bi bi-cash-coin"></i>
                    <span>Paiements</span>
                </a>
            </li><!-- End Paiements Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-arrow-left-right"></i><span>Les Flux</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="entries.php">
                            <i class="bi bi-box-arrow-in-right fa-lg"></i><span>Entrées</span>
                        </a>
                    </li>
                    <li>
                        <a href="exits.php">
                            <i class="bi bi-box-arrow-in-left"></i><span>Sorties</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->


            <li class="nav-heading">AUTRES</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="motif.php">
                    <i class="bi bi-receipt"></i>
                    <span>Motifs</span>
                </a>
            </li><!-- End Devise Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="devises.php">
                    <i class="bi bi-currency-exchange"></i>
                    <span>Devises</span>
                </a>
            </li><!-- End Devise Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->
<?php
} else {
?>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Tableau de bord</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-heading mt-4 mb-2">Main</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="contribution.php">
                    <i class="bi bi-cash-coin"></i>
                    <span>Paiements</span>
                </a>
        </ul>

    </aside><!-- End Sidebar-->
<?php
}
?>