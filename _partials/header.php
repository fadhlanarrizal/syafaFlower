<header>
        <div class="navbar active">
            <div class="container">
                <a href="#" class="logo">Syafa<span>Flowers</span></a>
                <div class="menu-wrapper">
                    <div class="menuClose bx bx-x"></div>
                    <div class="menu">
                        <a href="#" class="active-menu nav-link">Home</a>
                        <a href="#service" class="nav-link">Service</a>
                        <a href="#product" class="nav-link">Product</a>
                        <a href="#testimoni" class="nav-link">Testimoni</a>
                        <a href="#contact" class="nav-link">Contact</a>
                    </div>
                    <div class="icons">
                        <a href="#"><i class='bx bx-search icon'></i></a>
                        <?php if (isset($_SESSION['users']['username']) == "admin") : ?>
                            <a href="admin/index.php"><i class='bx bx-shopping-bag icon'></i></a>
                            <?php else : ?>
                            <a href="cart/cart.php"><i class='bx bx-shopping-bag icon'></i></a>
                            <?php endif ?>
                                    <!-- jika sudah login(ada sesion user) -->
            <?php if (isset($_SESSION['users'])) : ?>
                <a href="cart/cart.php"><i class='bx bx-user'></i></a>               
                <!-- belum login -->
                <?php else : ?>
                    <a href="profile/profile.php"><i class='bx bx-user'></i></a>
            <?php endif ?>
                    </div>
                </div>
                <div class="menuOpen bx bx-grid-alt"></div>
            </div>
        </div>
    </header>
