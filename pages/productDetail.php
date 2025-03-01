<main id="product-detail">
    <div class="product-container">
    <h2 class="detail-title"><?= $product['name'] ?></h2>
        <section class="swiper">
            <main class="sliders-container swiper-wrapper">
                        <?php foreach ($photos as $photo) {
                            if ($photo['is_main'] == 1) {

                                echo '<div class="swiper-slide"><img src="./repo/product/' . $photo['url'] . '" alt="product photo"></div>';
                            }
                        }
                        ?>
                        <?php foreach ($photos as $photo) {
                            if ($photo['is_main'] == 0) {
                                echo '<div class="swiper-slide"><img src="./repo/product/' . $photo['url'] . '" alt="product photo"></div>';
                            }
                        }
                        ?>
            </main>
            <div class="slider-controls">
                <div class="swiper-pagination"></div>
            </div>
        </section>
            <?php 
            foreach ($photos as $photo) {
                if ($photo['is_main'] == 1) {
                    echo '<img src="./repo/product/' . $photo['url'] . '" alt="product photo" class="menu-img">';
                }
            }
            ?>
            <?php foreach ($photos as $photo) {
                if ($photo['is_main'] == 0) {
                    echo '<img src="./repo/product/' . $photo['url'] . '" alt="product photo" class="menu-img">';
                }
            }
            ?>
        <section id="product-details">
            <h2 class="detail-title"><?= $product['name'] ?></h2>
            <p id="detail-price"><?= $product['price'] ?>€</p>
            <p id="detail-description"><?= $product['description'] ?></p>
            <button class="add-to-cart p-l-c-btn" product_id="<?= $product['id'] ?>">Añadir al carrito</button>
        </section>
    </div>
</main>
