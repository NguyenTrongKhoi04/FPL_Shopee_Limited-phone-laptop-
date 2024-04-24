<div class="app">
    <header class="header">
        <div class="grid ">
            <nav class="header__navbar">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <span class="header__item-title--no-pointer">Kết nối</span>
                        <a href="" class="header__navbar-icon-link">
                            <i title="Facebook" class="header__navbar-icon fa-brands fa-facebook"></i>
                        </a>

                        <a href="" class="header__navbar-icon-link">
                            <i title="Instagram" class="header__navbar-icon fa-brands fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <!-- Link của admin -->
                        <a href="../admin/index.php" class="header__navbar-item-link">
                            <i class="header__navbar-icon fa-solid fa-user-gear"></i>
                            Quản trị</a>
                    </li>

                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon fa-solid fa-circle-question"></i>
                            Trợ giúp</a>
                    </li>
                    <li class="header__navbar-item ">
                        <a href="home.php?act=register" class="header__navbar-item-link header__navbar-item--strong header__navbar-item-separate">Đăng
                            ký</a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="home.php?act=login" class="header__navbar-item-link header__navbar-item--strong">Đăng
                            nhập</a>
                    </li>
                    <li class="header__navbar-item header__navbar-user">
                        <img src="../assets/img_user/avtgithub.png" alt="" class="header__navbar-user-img">
                        <span class="header__navbar-user-name">
                            Tên user
                        </span>
                        <div class="header__navbar-user-menu">
                            <ul class="header__navbar-user-list-item">
                                <li class="header__navbar-user-item">
                                    <a href="home.php">Cập nhật thông
                                        tin</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="home.php?act=doimatkhau">Cài đặt mật khẩu</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="home.php?act=donhang">Đơn mua</a>
                                </li>
                                <li class="header__navbar-user-item header__navbar-user-item-separative">
                                    <a href="home.php?act=logout">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Header with search -->
            <form action="home.php" method="GET">
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="home.php" class="header__logo-link">
                            <img class="header__logo-img" src="../assets/img/Logo_poly.png" alt="">
                        </a>
                    </div>
                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" name="search" placeholder="Nhập để tìm kiếm sản phẩm" class="header__search-input">
                            <!-- search history -->
                            <!-- <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-list-item">
                                        <a href="">Tìm kiếm 1</a>
                                    </li>
                                    <li class="header__search-history-list-item">
                                        <a href="">Tìm kiếm 2</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="header__search-select">
                            <span class="header__search-select-label">Trong shop</span>
                            <i class="header__search-select-icon fa-solid fa-caret-down"></i>
                            <ul class="header__search-option">
                                <li class="header__search-option-item header__search-option-item-active">
                                    <span>Trong shop</span>
                                    <i class="fa-solid fa-check"></i>
                                </li>
                                <!-- <li class="header__search-option-item">
                                    <span>Ngoài shop</span>
                                    <i class="fa-solid fa-check"></i>
                                </li> -->

                            </ul>
                        </div>
                        <button type="submit" class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
            </form>
            <!-- cart layout -->
            <div class="header__cart">
                <div class="header__cart-wrap">
                    <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
                    <span class="header__cart-notice">0</span>
                    <!-- No cart: header__cart-list--no-cart -->
                    <div class="header__cart-list header__cart-list--no-cart">
                        <img src="../assets/img/no_cart.png" alt="" class="header__cart-no-cart-img">
                        <span class="header__cart-list-no-cart-msg">Chưa có sản phẩm</span>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </header>