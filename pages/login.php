<main id="login-main">

    <section id="login-container">
        <h1 class="title">
            INICIO DE SESION
        </h1>
        <div>
        <?php if (isset($msg)) echo $msg;?>
            <form action="" method="POST">
                <div class="m-1-a flex  data-l-cont ">
                    <label for="user">Email: </label>
                    <input type="email" name="email" id="user" pattern="^[^ ]+@[^ ]+\.[a-z]{2,3}$" placeholder="example.@gmail.com" required>
                </div>
                <div class="m-1-a flex data-l-cont ">
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="password" id="pass" required>
                </div>
                <div class="m-1-a flex data-l-cont ">
                    <button type="submit">INICIAR</button>
                </div>
            </form>
        </div>

    </section>

</main>