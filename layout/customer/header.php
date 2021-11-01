<header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <?php
                    if(!empty($_SESSION['user_token'])){
                        if($_SESSION['role'] == "1"){
                            echo "
                            <li class='dropdown notification-list'>
                                <a class='nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light' data-toggle='dropdown' href='#' role='button' aria-haspopup='false' aria-expanded='false'>
                                    <span class='pro-user-name ml-1'>
                                        {$_SESSION['email']} <i class='mdi mdi-chevron-down'></i>
                                    </span>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right profile-dropdown'>
                                    <div class='dropdown-header noti-title'>
                                        <h6 class='text-overflow m-0'>Admin !</h6>
                                    </div>
                                    <a href='management_account' class='dropdown-item notify-item'>
                                        <i class='fe-arrow-right'></i>
                                        <span>Trang quản lý</span>
                                    </a>
                                    <a href='profile' class='dropdown-item notify-item'>
                                        <i class='fe-user'></i>
                                        <span>Thông tin</span>
                                    </a>
                                    <div class='dropdown-divider'></div>
                                    <a href='logout' class='dropdown-item notify-item'>
                                        <i class='fe-log-out'></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </div>
                            </li>
                            ";
                        } else{
                            echo "
                            <li class='dropdown notification-list'>
                                <a class='nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light' data-toggle='dropdown' href='#' role='button' aria-haspopup='false' aria-expanded='false'>
                                    <span class='pro-user-name ml-1'>
                                        {$_SESSION['email']} <i class='mdi mdi-chevron-down'></i>
                                    </span>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right profile-dropdown'>
                                    <div class='dropdown-header noti-title'>
                                        <h6 class='text-overflow m-0'>Khách hàng !</h6>
                                    </div>
                                    <a href='profile' class='dropdown-item notify-item'>
                                        <i class='fe-user'></i>
                                        <span>Thông tin</span>
                                    </a>
                                    <div class='dropdown-divider'></div>
                                    <a href='logout' class='dropdown-item notify-item'>
                                        <i class='fe-log-out'></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </div>
                            </li>
                            ";
                        }

                    }else {
                        echo "
                            <li class='dropdown notification-list'>
                                <a class='nav-link dropdown-toggle mr-0 waves-effect waves-light' href='login'>
                                    <span class='pro-user-name ml-1'>
                                        Đăng nhập
                                    </span>
                                </a>
                            </li>
                            ";
                    }
                ?>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">

                <a href="index.html" class="logo text-center logo-dark">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="24">
                                    <!-- <span class="logo-lg-text-dark">Adminox</span> -->
                                </span>
                    <span class="logo-sm">
                                    <!-- <span class="logo-lg-text-dark">A</span> -->
                                    <img src="assets/images/logo-sm.png" alt="" height="24">
                                </span>
                </a>

                <a href="index.html" class="logo text-center logo-light">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="24">
                                    <!-- <span class="logo-lg-text-dark">Adminox</span> -->
                                </span>
                    <span class="logo-sm">
                                    <!-- <span class="logo-lg-text-dark">A</span> -->
                                    <img src="assets/images/logo-sm.png" alt="" height="24">
                                </span>
                </a>
            </div>

        </div>
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="home"> <i class="fe-airplay"></i>Trang chủ</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#">
                            <i class="fe-briefcase"></i>Sản phẩm
                        </a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <span class="menu-title">CD</span>
                                    </li>
                                    <li><a href="#">Loại A</a></li>
                                    <li><a href="#">Loại B</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        <span class="menu-title">DVD</span>
                                    </li>
                                    <li><a href="ui-progressbars.html">Loại C</a></li>
                                    <li><a href="ui-notifications.html">Loại D</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        <span class="menu-title">DCD</span>
                                    </li>
                                    <li><a href="admin-tiles.html">Loại E</a></li>
                                    <li><a href="admin-nestable.html">Loại F</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#">
                            <i class="fe-box"></i>Tìm hiểu
                        </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"> <i class="fe-mail"></i>Liên hệ</a>
                    </li>

                </ul>
                <!-- End navigation menu -->
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->
</header>