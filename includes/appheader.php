<?php
$positions = ["Holdingin Baş Kassiri","Holdingin Maliyyə Direktorunun köməkçisi","Holdingin Maliyyə Direktoru","Holdingin Baş Maliyyə Auditoru", "Admin"];
?>
<div class="app-header header main-header1">
    <div class="container-fluid">
        <div class="d-flex">

            <div class="app-sidebar__toggle d-flex" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2001/svg" class="feather feather-align-left header-icon" width="24"
                        height="24" viewBox="0 0 24 24">
                        <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
                    </svg>

                </a>
            </div>
            <div class="d-flex order-lg-2 ms-auto main-header-end">
                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="true" aria-label="Toggle navigation">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button>
                <div class="navbar navbar-expand-lg navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">


                            <div class="dropdown profile-dropdown d-flex" title="Profilə bax">
                                <a href="javascript:void(0);" class="nav-link pe-0 leading-none"
                                    data-bs-toggle="dropdown">
                                    <span class="header-avatar1">
                                        <img src="controller/<?php echo $user_inf['u_profile_img']; ?>" alt="img" 
                                            class="avatar avatar-md brround object-fit-cover">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
                                    <div class="text-center">
                                        <div class="text-center user pb-0 font-weight-bold">
                                            <span><?php echo $user_inf['u_name']; ?> </span><span><?php echo $user_inf['u_surname']; ?></span>
                                        </div>
                                        <span class="text-center user-semi-title"><?php echo $user_inf['u_position']; ?></span>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                    <?php 
                                    if(in_array($user_inf['u_position'],$positions)):
                                    ?>
                                    <a class="dropdown-item d-flex cursor-pointer" title="Çıxış edin"
                                        data-bs-toggle="modal" data-bs-target="#gmailModal">
                                        <i class="fa fa-envelope"></i>

                                        <div class="fs-13 ms-2">Bildiriş postunu aktiv edin</div>
                                    </a>
                                    <?php endif; ?>
                                    <a class="dropdown-item d-flex cursor-pointer" title="Çıxış edin"
                                        data-bs-toggle="modal" data-bs-target="#logoutModal">
                                        <svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24"
                                            width="24">
                                            <g>
                                                <rect fill="none" height="24" width="24" />
                                            </g>
                                            <g>
                                                <path
                                                    d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z" />
                                            </g>
                                        </svg>

                                        <div class="fs-13">Çıxış</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>