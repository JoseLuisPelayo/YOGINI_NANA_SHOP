<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/user/myaccount.css">
</head>

<body> -->
    <main id="my-account">
        <div class="form-container">
            <h2 class="title-page">MI CUENTA</h2>
            <?php if (isset($msg)) echo $msg;?>
            <form action="" method="post" enctype="multipart/form-data" id="my-account-form">
                <section class="form-section m-1-a s-1">
                    <h3 class="section-title">FOTO</h3>
                    <div class="photo-container">
                        <?php if (isset($user)) { ?>
                        <img class="my-account-img" src="<?php if (isset($user)) {
                                    if ($user->getPhoto() != '') {
                                        echo './repo/user/' . $user->getPhoto();
                                    } else {
                                        echo './assets/img/sinlog.png';
                                    }
                                } else {
                                    echo './assets/img/sinlog.png';

                                } ?>" alt="user_photo">
                        <?php } ?>
                    </div>
                    <div class="m-1-a flex  data-l-cont ">
                        <label for="user-photo">Sube una foto nueva: </label>
                        <input type="file" name="photo" id="user-photo" accept=".jpg, .png, .jpeg">
                    </div>
                </section>
                <section class="form-section m-1-a s-2">
                    <h3 class="section-title">DATOS PERSONALES</h3>
                    <div class="m-1-a flex  data-l-cont ">
                        <label for="user-name">Nombre: </label>
                        <input type="text" name="name" id="user-name" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,20}"
                            value="<?php echo (!is_null($user->getName())) ? $user->getName() : '';?>" required >
                    </div>
                    <div class="m-1-a flex  data-l-cont ">
                        <label for="user-lname1">Primer apellido: </label>
                        <input type="text" name="last_name1" id="user-lname1" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,20}"
                            value="<?php echo (!is_null($user->getLastName1())) ? $user->getLastName1() : '';?>" required>
                    </div>
                    <div class="m-1-a flex  data-l-cont ">
                        <label for="user-lname2">Segundo apellido: </label>
                        <input type="text" name="last_name2" id="user-lname2" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,20}"
                        value="<?php echo (!is_null($user->getLastName2())) ? $user->getLastName2() : '';?>" required>
                    </div>
                    <div class="m-1-a flex  data-l-cont ">
                        <label for="user-birthdate">Fecha de nacimiento: </label>
                        <input type="date" name="birth_date" id="user_birthdate"value="<?php echo (!is_null($user->getBirthDate())) ? $user->getBirthDate() : '';?>" required>
                    </div>
                    <div class="m-1-a flex  data-l-cont ">
                        <label for="user-tel">Teléfono: </label>
                        <input type="nomber" name="phone" id="user-tel"value="<?php echo (!is_null($user->getPhone())) ? $user->getPhone() : '';?>" placeholder="658780643" pattern="^(?:6|7|8|9)\d{8}$">
                    </div>
                    <div class="m-1-a flex  data-l-cont ">
                        <label for="user">Email: </label>
                        <input type="email" name="email" id="user" pattern="^[^ ]+@[^ ]+\.[a-z]{2,3}$"
                        value="<?php echo (!is_null($user->getEmail())) ? $user->getEmail() : '';?>" placeholder="example.@gmail.com" required>
                    </div>
                </section>
                <section class="form-section m-1-a s-3">
                    <h3 class="section-title">CONTRASEÑA</h3>
                    <div class="m-1-a flex data-l-cont ">
                        <label for="pass">Contraseña: </label>
                        <input type="password" name="password" id="pass">
                    </div>
                    <div class="m-1-a flex data-l-cont ">
                        <label for="pass2">Nueva contraseña: </label>
                        <input type="password" name="pass1" id="pass2"
                            pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$">
                    </div>
                    <div class="m-1-a flex data-l-cont ">
                        <label for="pass1">Repetir contraseña: </label>
                        <input type="password" name="pass2" id="pass1"
                            pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$">
                    </div>
                </section>
                <section class="form-section m-1-a s-4">
                    <h3 class="section-title">DIRECCION PRINCIPAL</h3>
                    <div class="m-1-a flex data-l-cont">
                        <label for="d-street">Calle</label>
                        <input type="text" id="d-street" name="street" value="<?php echo (!is_null($direction)) ? $direction['street'] : '';?>" placeholder="Jose Cueto">
                    </div>
                    <div class="data-v-cont flex">
                        <div class="min-data m-1-a flex data-l-cont">
                            <label for="street-number">Número</label>
                            <input type="text" id="street-number" name="number" value="<?php echo (!is_null($direction)) ? $direction['number'] : '';?>" placeholder="57" >
                        </div>
                        <div class="min-data m-1-a flex data-l-cont">
                            <label for="floor-number">Piso</label>
                            <input type="text" id="floor-number" name="floor" value="<?php echo (!is_null($direction)) ? $direction['floor'] : '';?>" placeholder="3">
                        </div>
                        <div class="min-data m-1-a flex data-l-cont">
                            <label for="floor-appartment">Puerta</label>
                            <input type="text" id="floor-appartment" name="apartment" value="<?php echo (!is_null($direction)) ? $direction['apartment'] : '';?>" placeholder="C">
                        </div>
                    </div>
                    <div class="min-data m-1-a flex data-l-cont">
                        <label for="d-city">Ciudad</label>
                        <input type="text" id="d-city" name="city" value="<?php echo (!is_null($direction)) ? $direction['city'] : '';?>" placeholder="Avilés">
                    </div>
                    <div class="min-data m-1-a flex data-l-cont">
                        <label for="zip-code">Código Postal</label>
                        <input type="text" id="zip-code" name="postal_code" value="<?php echo (!is_null($direction)) ? $direction['postal_code'] : '';?>" placeholder="33402">
                    </div>
                    <div class="min-data m-1-a flex data-l-cont">
                        <label for="d-province">Provincia</label>
                        <input type="text" id="d-province" name="region" value="<?php echo (!is_null($direction)) ? $direction['region'] : '';?>" placeholder="Asturias">
                    </div>
                </section>
                <section class="form-section m-1-a s-5">
                    <div class="data-l-cont">
                        <button type="submit">Actualizar</button>
                    </div>
                </section>
            </form>
        </div>

    </main>

<!-- </body>

</html> -->