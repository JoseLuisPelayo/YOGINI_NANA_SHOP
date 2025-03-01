<main>
<section class="home-container">
            <div class="banner-phrase">
                <p id="patata">Siente el viento</p>
                <p>fluir en ti</p>
            </div>
            <img src="assets/img/bannermeditacion.png" alt="">
    </section>

    <section class="home-container sections">
        <div class="section-link">
            <a href="<?=ROUTES['products']['route']?>/moda">
                <div class="img-sections-container">
                    <img class="section-link-img" src="./assets/img/ropa.png" alt="">
                </div>
                <div class="section-tittle-container">
                    <h3 class="section-tittle">Ropa</h3>
                </div>
            </a>
        </div>
        <div class="section-link">
            <a href="<?=ROUTES['products']['route']?>/accesorios">
                <div class="img-sections-container">
                    <img class="section-link-img" src="./assets/img/accesoriosfinal.png" alt="">
                </div>
                <div class="section-tittle-container">
                    <h3 class="section-tittle">Accesorios</h3>
                </div>
            </a>
        </div>
        <div class="section-link">
            <a href="<?=ROUTES['products']['route']?>/zafus">
                <div class="img-sections-container">
                    <img class="section-link-img" src="./assets/img/azfusfinal.png" alt="">
                </div>
                <div class="section-tittle-container">
                    <h3 class="section-tittle">Zafus</h3>
                </div>
            </a>
        </div>
        <div class="section-link">
            <a href="<?=ROUTES['products']['route']?>/esterillas">
                <div class="img-sections-container">
                    <img class="section-link-img" src="./assets/img/esterillafinal.png" alt="">
                </div>
                <div class="section-tittle-container">
                    <h3 class="section-tittle">Esterillas</h3>
                </div>
            </a>
        </div>
        <div class="section-link">
            <a href="<?=ROUTES['products']['route']?>/mantas">
                <div class="img-sections-container">
                    <img class="section-link-img" src="./assets/img/mantasfinal.png" alt="">
                </div>
                <div class="section-tittle-container">
                    <h3 class="section-tittle">Mantas</h3>
                </div>
            </a>
        </div>
        <div class="section-link">
            <a href="<?=ROUTES['products']['route']?>/meditacion">
                <div class="img-sections-container">
                    <img class="section-link-img" src="./assets/img/meditacionfinal.png" alt="">
                </div>
                <div class="section-tittle-container">
                    <h3 class="section-tittle">Meditacion</h3>
                </div>
            </a>
        </div>
    </section>

    <section class="home-container slider">
        <h3 id="slider-title">Productos destacados</h3>
        <div class="container-slider">
            <div class="slider swiper">
                <main class="sliders-container swiper-wrapper">
                    <?php foreach ($products as $product) :?>
                    <article class="card swiper-slide">
                        <a href="<?=preg_replace('/:id/', $product['id'], ROUTES['products.detail']['route'])?>" class="link-wrapper">
                            <div class="card-img-cont">
                                <img src="./repo/product/<?=$product['url'];?>" alt="">
                            </div>
                            <div class="data-prd">
                                <h3 class="card-titl-prd"><?=$product['name'];?></h3>
                                <p class="card-pric-prd"><strong><?=$product['price'];?>€</strong></p>
                                <div class="stars-prd">
                                    <?php include "./assets/svg/star.php";?>
                                    <?php include "./assets/svg/star.php";?>
                                    <?php include "./assets/svg/star.php";?>
                                    <?php include "./assets/svg/star.php";?>
                                    <?php include "./assets/svg/star.php";?>
                                </div>
                            </div>
                        </a>
                    </article>

                    <?php endforeach;?>
                </main>
                <div class="slider-controls">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
</main>