<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    <?php echo $_SESSION['email'];?> <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Admin !</h6>
                </div>

                <!-- item-->
                <a href="profile" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Thông tin</span>
                </a>
                <!-- item-->
                <a href="home" class="dropdown-item notify-item">
                    <i class="fe-arrow-left"></i>
                    <span>Trang chủ</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="logout" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Đăng xuất</span>
                </a>
            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="25">
            </span>
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="28">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>