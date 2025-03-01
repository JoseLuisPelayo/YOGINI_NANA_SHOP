<main class="p-c">
    <section class="menu-products-c">
        <div class="menu-products">
            <button class="m-p-btn">
                <?php include "./assets/svg/products-menu-mobile.php"; ?>
            </button>
            <ul>
                <a href="<?= ROUTES['products']['route'] ?>/moda" class="m-p-link">
                    <li>Moda</li>
                </a>
                <a href="<?= ROUTES['products']['route'] ?>/accesorios" class="m-p-link">
                    <li>Accesorios</li>
                </a>
                <a href="<?= ROUTES['products']['route'] ?>/esterillas" class="m-p-link">
                    <li>Esterillas</li>
                </a>
                <a href="<?= ROUTES['products']['route'] ?>/mantas" class="m-p-link">
                    <li>Mantas</li>
                </a>
                <a href="<?= ROUTES['products']['route'] ?>/zafus" class="m-p-link">
                    <li>Zafus</li>
                </a>
                <a href="<?= ROUTES['products']['route'] ?>/meditacion" class="m-p-link">
                    <li>Meditación</li>
                </a>
            </ul>
        </div>
    </section>
    <section>
        <h2 class="tittle-p-l"> <?= isset($category) ? $category : 'Productos'; ?></h2>
        <section class="products-c-l">
            <?php
            foreach ($products as $product) {
                ?>
                <article class="card">
                    <div class="aside-imgs">
                        <a href="<?=preg_replace('/:id/', $product[0]['id'], ROUTES['products.detail']['route'])?>">
                            <?php
                            foreach ($product[0]['photos'] as $key => $photo) {
                                echo '<div class="aside-img" id="' . $key . '">
                                    <img src="./repo/product/' . $photo . '" alt="" width="500">
                            </div>';
                            }
                            ?>
                    </div>
                    <div class="principal-img-container">
                        <?php
                        echo '<img src="./repo/product/' . $product[0]['main_photo'] . '" alt="" width="300">';
                        ?>
                    </div>
                    <div class="data">
                        <h3><?= $product[0]['name']; ?></h3>
                        <p> <?= $product[0]['price']; ?> €</p>
                        </a>
                    </div>
                    <button class="add-to-cart" product_id="<?=$product[0]['id']?>">Añadir al carrito</button>
                </article>
                <?php
            }
            ?>
        </section>
</main>
