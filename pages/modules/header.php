<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Tienda de artículos relacionados con la practica del yoga, el pilates y la meditacion">
    <meta name="keywords"
        content="yoga, pilates, salud, welthness, deporte, espiritual, mujer, aviles, gijon, oviedo, asturias">
    <meta name="author" content="Jose Luis García Pelayo">
    <title>Yogini Nana</title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <base href="/Yoguini_Nana_Shop/">
    <!-- <link rel="stylesheet" href="./css/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="./css/base.css">
    <?php
    use Utils\ResourcesLoader;

    foreach (ResourcesLoader::resourceLoad(ltrim(preg_replace('/Yoguini_Nana_Shop/', '', $_SERVER['REQUEST_URI']), '/'), ROUTES, 'css') as $file) {
        echo '<link rel="stylesheet" href="./css/' . $file . '">';
    }
    ?>
</head>

<body>
    <header>
        <nav class="mobile nav">

            <section class="flex main-header">
                <a class="brand g-1 f-align" href="<?=ROUTES['index']['route']?>">
                    <img src="./assets/img/logo-sin-fondo.png" class="" alt="logo" width="55">
                    <p>YOGUINI NANA</p>
                </a>

                <div class="f-align g-1">
                    <div class="h-cart-container">
                        <div class="cart-counter"><?php
                            if (isset($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            }else {
                                echo '';
                            }
                        ?></div>
                        <a href="<?=ROUTES['cart']['route']?>" class="cart-link">
                            <?php include './assets/svg/cart-icon.php'; ?>
                        </a>
                    </div>

                    <a href="#" class="icon-menu-responsive-link">
                        <?php include './assets/svg/icon-menu-container.php'; ?>
                    </a>
                </div>
            </section>

            <section id="nav-m-links">
                <div id="user-login-container" class="f-align">
                    <?php if (isset($user)) { ?>
                        <a href="<?=ROUTES['user.myaccount']['route']?>">
                            <img class="user-login-img" src="<?php if (isset($user)) {
                                if ($user->getPhoto() != '') {
                                    echo './repo/user/' . $user->getPhoto();
                                } else {
                                    echo './assets/img/sinlog.png';
                                }
                            } else {
                                echo './assets/img/sinlog.png';

                            } ?>" alt="user_photo">
                        </a>
                    <?php } else { ?>
                        <img class="user-login-img" src="./assets/img/sinlog.png" alt="user_photo">
                        <a href="/Yoguini_Nana_Shop/user/login" id="m-nav-login-btn">Inicia sesión</a>
                        <a href="/Yoguini_Nana_Shop/user/register" id="m-nav-singin-btn">Registrarse</a>
                    <?php } ?>
                </div>

                <ul class="nav-m-items">
                    <li class="nav-m-item">
                        <a href="<?=ROUTES['index']['route']?>" class="nav-m-link">Home</a>
                    </li>
                    <li class="nav-m-item-dropdown">
                        <a href="<?=ROUTES['products']['route']?>" class="nav-m-link dropdown-toggle">
                            Productos
                            <?php include './assets/svg/arrow-down.php'; ?>
                            <?php include './assets/svg/arrow-up.php'; ?>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="<?=ROUTES['products']['route']?>/moda" class="dropdown-m-item">Moda</a></li>
                            <li><a href="<?=ROUTES['products']['route']?>/accesorios" class="dropdown-m-item">Accesorios</a></li>
                            <li><a href="<?=ROUTES['products']['route']?>/esterillas" class="dropdown-m-item">Esterillas</a></li>
                            <li><a href="<?=ROUTES['products']['route']?>/mantas" class="dropdown-m-item">Mantas</a></li>
                            <li><a href="<?=ROUTES['products']['route']?>/zafus" class="dropdown-m-item">Zafus</a></li>
                            <li><a href="<?=ROUTES['products']['route']?>/meditacion" class="dropdown-m-item">Meditación</a></li>
                        </ul>
                    </li>

                    <li class="nav-m-item">
                        <a href="/proyecto/blog" class="nav-m-link">Blog</a>
                    </li>

                    <li class="nav-m-item">
                        <a href="/proyecto/contact" class="nav-m-link">Contacto</a>
                    </li>

                    <li class="nav-m-item">
                        <a href="/Yoguini_Nana_Shop/user/close_sesion" class="nav-m-link">Cerrar sesion</a>
                    </li>

                    <?php
                    if ((isset($user) && $_SESSION['rol'] == 1) or (isset($user) && $_SESSION['rol'] == 4)) {
                        ?>
                        <li class="nav-m-item-dropdown">
                            <a href="" class="nav-m-link dropdown-toggle">
                                Administracion
                                <?php include './assets/svg/arrow-down.php'; ?>
                                <?php include './assets/svg/arrow-up.php'; ?>

                                <ul class="dropdown-menu">
                                    <li><a href="/proyecto/admin_users" class="dropdown-m-item">Usuarios</a></li>
                                    <li><a href="" class="dropdown-m-item">Productos</a></li>
                                </ul>
                        </li>
                    <?php } ?>

                    <li class="nav-m-item-dropdown social-media">
                        <p class="nav-m-item-dropdown">Si te gusta mi trabajo, visita mi repositorio o contacta.</p>
                        <?php include './pages/modules/about-me.php'; ?>
                    </li>
                </ul>
            </section>
        </nav>

        <nav class="nav desktop">
            <section class="flex main-header">
                <section class="f-align link-section">
                    <a class="brand g-1" href="<?=ROUTES['index']['route']?>">
                        <div class="brand g-1 f-align">
                            <img src="./assets/img/logo-sin-fondo.png" class="" alt="logo" width="55">
                            <p>YOGUINI NANA</p>
                        </div>
                    </a>

                    <ul class="f-align g-2">
                        <li class="d-navbar-link"><a href="<?=ROUTES['index']['route']?>">Home</a></li>

                        <li class="d-navbar-link drop">
                            <a class="nav-d-link" href="<?=ROUTES['products']['route']?>">
                                Productos
                                <?php include './assets/svg/arrow-down.php'; ?>
                                <?php include './assets/svg/arrow-up.php'; ?>
                                <ul class="d dropdown-menu">
                                    <li><a href="<?=ROUTES['products']['route']?>/moda" class="dropdown-d-item">Moda</a></li>
                                    <li><a href="<?=ROUTES['products']['route']?>/accesorios" class="dropdown-d-item">Accesorios</a></li>
                                    <li><a href="<?=ROUTES['products']['route']?>/esterillas" class="dropdown-d-item">Esterillas</a></li>
                                    <li><a href="<?=ROUTES['products']['route']?>/mantas" class="dropdown-d-item">Mantas</a></li>
                                    <li><a href="<?=ROUTES['products']['route']?>/zafus" class="dropdown-d-item">Zafus</a></li>
                                    <li><a href="<?=ROUTES['products']['route']?>/meditacion" class="dropdown-d-item">Meditación</a></li>
                                </ul>
                            </a>

                        </li>

                        <li class="d-navbar-link"><a href="/proyecto/blog">Blog</a></li>

                        <li class="d-navbar-link"><a href="/proyecto/contact">Contacto</a></li>
                        <?php
                        if ((isset($user) && $_SESSION['rol'] == 1) or (isset($user) && $_SESSION['rol'] == 4)) {
                            ?>
                            <li class="d-navbar-link ">
                                <a class="nav-d-link">
                                    Admin
                                    <?php include './assets/svg/arrow-down.php'; ?>
                                    <?php include './assets/svg/arrow-up.php'; ?>
                                </a>
                                <ul class="d dropdown-menu">
                                    <li><a href="/proyecto/admin_users" class="dropdown-d-item">Usuarios</a></li>
                                    <li><a href="/proyecto/admin_products" class="dropdown-d-item">Productos</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </section>

                <section class="f-align g-2 user-section">
                    <article class="h-cart-container">
                        <div class="cart-counter"><?php
                            if (isset($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            }
                        ?></div>
                        <a href="<?=ROUTES['cart']['route']?>" class="f-align">
                            <?php include './assets/svg/cart-icon.php'; ?>
                        </a>
                    </article>
                    <article class="icon-login-container f-align">
                        <?php if (isset($user)) { ?>
                            <a class="login-link f-align g-1"
                                href="<?=ROUTES['user.myaccount']['route']?>"><?php echo $user->takeInitials(); ?>
                                <img src="<?php if (isset($user)) {
                                    if ($user->getPhoto() != '') {
                                        echo './repo/user/' . $user->getPhoto();
                                    } else {
                                        echo './assets/img/sinlog.png';
                                    }
                                } else {
                                    echo './assets/img/sinlog.png';

                                } ?>" alt="user image" class="user-login-img"></a>
                        </article>
                        <article>
                            <a href="/Yoguini_Nana_Shop/user/close_sesion"><?php include "./assets/svg/logout.php"; ?></a>
                        <?php } else { ?>
                        </article>
                        <div class="login-btns f-align">
                            <a class="login-account" href="<?=ROUTES['user.login']['route']?>">Inicia sesion</a>
                            <a class="create-account" href="<?=ROUTES['user.register']['route']?>">Registrarse</a>
                        </div>
                    <?php } ?>

                </section>
            </section>
        </nav>

    </header>