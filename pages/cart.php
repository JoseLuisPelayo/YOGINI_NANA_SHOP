<?php if (!isset($products))
    echo 'No hay ningun pproducto en la cesta'; 
?>
<main id="cart">
    <h1 class="tittle">
        Carrito
    </h1>
    <table class="cart-list">
        <thead>
            <tr>
                <th>C. de producto</th>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if (isset($products)) {
                foreach ($products as $product) {
                    echo '<tr>
                        <td>' . $product['product_code'] . '</td>
                        <td>' . $product['name'] . '</td>
                        <td>' . $product['quantity'] . '</td>
                        <td>' . $product['price'] * $product['quantity'] . '</td>
                        <td><img src="./assets/img/delete_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt=""></td>
                        </tr>';
                    $total += ($product['price'] * $product['quantity']);
                }
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total: </strong></td>
                <td><strong><?= $total ?> €</strong></td>
            </tr>
        </tbody>
    </table>
    <div class="cart-btns">
        <a href="" class="cart-btn">Continuar comprando</a>
        <a href="/proyecto/checkout" class="cart-btn">Pasar a caja</a>
    </div>
</main>