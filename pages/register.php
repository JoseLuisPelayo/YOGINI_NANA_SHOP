<main id="user-reg-f">


    <div class="container">
        <header>REGISTRO</header>

        <div class="progress-bar">
            <div class="pass">
                <p>Datos</p>
                <div class="num">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="pass">
                <p>Info.</p>
                <div class="num">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="pass">
                <p>Cotraseña</p>
                <div class="num">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="pass">
                <p>Foto</p>
                <div class="num">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>

        <div class="form-user-reg">
            <form action="/Yoguini_Nana_Shop/user/register" method="post" enctype="multipart/form-data" autocomplete="off">

                <!-- PAGINA 1 -->
                <div class="page movPag">

                    <div class="form-user-reg-title">
                        <h2>Informacion Principal</h2>
                    </div>
                    <?php if (isset($msg)) echo $msg;?>
                    <div class="form-user-reg-d">
                        <div class="label" for="nam">Nombre: <b class="error" id="names-error"></b></div>
                        <input type="text" id="nam" name="name" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,25}$"  placeholder="Tu nombre" required>
                    </div>
                    <div class="form-user-reg-d">
                        <div class="label" for="l-name1">Primer Apellido: <b class="error" id="l-name1-error"></b>
                        </div>
                        <input type="text" id="l-name1" name="last_name1" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25}$"  placeholder="Primer apellido">
                    </div>
                    <div class="form-user-reg-d">
                        <div class="label" for="l-name2">Segundo Apellido: <b class="error" id="l-name2-error"></b>
                        </div>
                        <input type="text" id="l-name2" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25}$"  placeholder="Segundo apellido" name="last_name2">
                    </div>
                    <div class="form-user-reg-d forw">
                        <button>Siguiente</button>
                    </div>
                </div>


                <!-- PAGe 2 -->
                <div class="page">

                    <div class="form-user-reg-title">
                        <h2>Informacion Adicional</h2>
                    </div>
                    <div class="form-user-reg-d">
                        <div class="label">Correo Electronico: <b class="error" id="mail-error"></b></div>
                        <input type="email" id="mail" name="email" placeholder="example.@gmail.com">
                    </div>
                    <div class="form-user-reg-d">
                        <div class="label">Fecha Nacimiento: <b class="error" id="b-date-error"></b></div>
                        <input type="date" id="b-date" name="birth_date" required>
                    </div>
                    <div class="form-user-reg-d btns">
                        <button class="back back-pag-1">Atras</button>
                        <button class="to-go-to-pag3 go-forw">Siguiente</button>
                    </div>
                </div>


                <!-- PAGe 3  -->
                <div class="page">

                    <div class="form-user-reg-title">
                        <h2>Contraseña</h2>
                    </div>
                    <div class="form-user-reg-d">
                        <div class="label">Contraseña <b class="error" id="pass-1-error"></b></div>
                        <input type="password" id="pass-1" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$" name="pass1" placeholder="contraseña">
                    </div>
                    <div class="form-user-reg-d">
                        <div class="label">Repite la contraseña <b class="error" id="pass-2-error"></b></div>
                        <input type="password" id="pass-2" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$" name="pass2" placeholder="contraseña">
                    </div>
                    <div class="form-user-reg-d btns">
                        <button class="back back-pag-2">Atras</button>
                        <button class="to-go-to-pag4 go-forw" type="submit">Siguiente</button>
                    </div>
                </div>


                <!-- PAGe 4  -->
                <div class="page">
                    <div class="form-user-reg-title">
                        <h2>Foto (no obligatorio)</h2>
                    </div>
                    <div class="img" id="user-img">
                        <img id="preview" src="./assets/img/logo-sin-fondo.png" alt="">
                    </div>
                    <div class="form-user-reg-d file">

                        <input class="fileInput" id="fileInput" type="file" name="photo" accept=".jpg, .png, .jpeg">


                    </div>
                    <div class="form-user-reg-d btns">
                        <button class="back back-pag-3">Atras</button>
                        <button class="end" type="submit">Finalizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>