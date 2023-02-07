<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="index.php">
            <img src="assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="logo">

            <img src="assets/images/brand/small.png" class="header-brand-img mobile-logo" alt="mobile logo">
        </a>
    </div>
    <ul class="side-menu app-sidebar3 side-menu__basic">
        <div>
            <li class="slide">
                <a class="side-menu__item" href="index.php">
                    <i class="fa fa-home side-menu-i text-dark"></i>
                    <span class="side-menu__label">İstifadə Paneli</span>
                </a>
            </li>

            <?php
                if($user_inf["id"] != 95):
            ?>
            
                        <?php
                            if($user_inf["id"] != 96):
                        ?>

                            <li class="slide">
                                <a class="side-menu__item" href="document.php">
                                    <i class="fa fa-file-o side-menu-i text-dark"></i>
                                    <span class="side-menu__label">Maliyyə Sənədləri</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" href="payment-documents.php">
                                    <i class="fa fa-money side-menu-i text-dark"></i>
                                    <span class="side-menu__label">Ödəniş Sənədləri</span>
                                </a>
                            </li>
                            <?php
                                $positions = ["Admin", "Holdingin Baş Maliyyə Auditoru"];
                                if(in_array($user_inf['u_position'],$positions)):
                            ?>
                            <li class="slide">
                                <a class="side-menu__item" href="users-list.php">
                                    <i class="fa fa-user side-menu-i text-dark"></i>
                                    <span class="side-menu__label">İstifadəçilər</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="archive.php">
                                    <i class="fa fa-file-archive-o side-menu-i text-dark"></i>
            
                                    <span class="side-menu__label">Arxivlər</span></a>
                            </li>
            
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="unconfirmed-documents.php">
                                    <i class="fa fa-files-o side-menu-i text-dark ms-1"></i>
            
                                    <span class="side-menu__label ms-1">Təsdiqlənməyən sənədlər</span></a>
                            </li>
                        <?php endif; ?>
                
                <?php
                    $positions = ["Admin", "Holdingin Maliyyə Direktorunun köməkçisi", "Holdingin Maliyyə Direktoru", "Holdingin Baş Maliyyə Auditoru", "Holdingin Baş Kassiri", "Editor"];
                    if(in_array($user_inf['u_position'],$positions)):
                ?>
                <li class="slide">
                    <a class="side-menu__item px-4" data-bs-toggle="slide" href="1c-authority.php">
                        <div class=" side-menu-ii text-dark" >
                            <img src="assets/images/icons/1c.png" alt="">
                        </div>
                        

                        <span class="side-menu__label ms-3">1C səlahiyyət paneli</span></a>
                </li>
                <?php endif; ?>

                <?php
                    $positions = ["Admin"];
                    if(in_array($user_inf['u_position'],$positions)):
                ?>
                <li class="slide">
                    <a class="side-menu__item text-dark" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="fa fa-cog side-menu-i text-dark"></i>
                        <span class="side-menu__label ms-1">Tənzimləmələr</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu ">

                        <li class="sub-slide">
                            <a class="sub-side-menu__item " data-bs-toggle="sub-slide"
                                href="javascript:void(0);"><span
                                    class="sub-side-menu__label">Verilənlər Cədvəli</span><i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li class="sub-slide2">
                                    <a class="sub-slide-item2" data-bs-toggle="sub-slide2"
                                        href="javascript:void(0);"><span class="sub-side-menu__label2">Ödəniş Sənədi Bazası</span><i class="sub-angle2 fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu2">
                                        <li>
                                            <a href="bank.php" class="sub-slide-item2">Bank</a>
                                        </li>
                                        <li>
                                            <a href="bank-branch.php" class="sub-slide-item2">Bank Filialı</a>
                                        </li>
                                        <li>
                                            <a href="unit-measurement.php" class="sub-slide-item2">Ölçü vahidi</a>
                                        </li>
                                        <li>
                                            <a href="currency.php" class="sub-slide-item2">Valyuta növləri</a>
                                        </li>
                                        <li>
                                            <a href="payment-type.php" class="sub-slide-item2">Ödəniş növləri</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-slide2">
                                    <a class="sub-slide-item2" data-bs-toggle="sub-slide2"
                                        href="javascript:void(0);"><span class="sub-side-menu__label2">Maliyyə Sənədi Bazası</span><i class="sub-angle2 fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu2">
                                        <li>
                                            <a href="document-type-database.php" class="sub-slide-item2">Sənədin növü</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-slide2">
                                    <a class="sub-slide-item2" data-bs-toggle="sub-slide2"
                                        href="javascript:void(0);"><span class="sub-side-menu__label2">İstifadəçilər Bazası</span><i class="sub-angle2 fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu2">
                                        <li>
                                            <a href="company-type-database.php" class="sub-slide-item2">Şirkətin növü</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-slide2">
                                    <a class="sub-slide-item2" data-bs-toggle="sub-slide2"
                                        href="javascript:void(0);"><span class="sub-side-menu__label2">1c Səlahiyyət Bazası</span><i class="sub-angle2 fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu2">
                                        <li>
                                            <a href="1c-company-type-database.php" class="sub-slide-item2">Şirkət növü</a>
                                        </li>
                                        <li>
                                            <a href="type-authority-database.php" class="sub-slide-item2">Səlahiyyət növü</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item " href="log-data.php" data-bs-toggle="sub-slide"
                                href="javascript:void(0);"><span
                                    class="sub-side-menu__label">Log Data</span></a>
                          
                        
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </ul>
</aside>