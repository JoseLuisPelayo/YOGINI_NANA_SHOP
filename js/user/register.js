
    /*MOVIMIENTO DE PAGINAS */
    document.addEventListener('DOMContentLoaded', () => {



        const movPag = document.querySelector(".movPag"); //va traer un elemento y lo almacena en la variable

        /*MOVIMIENTO DE PAGE 1*/
        const btn_forw = document.querySelector(".forw");

        /*MOVIMIENTO DE PAGE 2*/
        const btn_back1 = document.querySelector(".back-pag-1");
        const btn_forw3 = document.querySelector(".to-go-to-pag3");

        /*MOVIMIENTO DE PAGE 3*/
        const btn_back2 = document.querySelector(".back-pag-2");
        const btn_forw4 = document.querySelector(".to-go-to-pag4");

        /*MOVIMIENTO DE PAGE 4*/
        const btn_back3 = document.querySelector(".back-pag-3");
        const btn_final = document.querySelector(".end");

        /*progress bar */
        const progressText = document.querySelectorAll(".pass p")
        const progresscheck = document.querySelectorAll(".pass .check")
        const num = document.querySelectorAll(".pass .num")

        const inputs = document.querySelectorAll('input');

        let max = 4;
        let cont = 1;

        document.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
            }
        });

        /*PAGe 1 a page 2*/
        btn_forw.addEventListener("click", function (sig) {
            sig.preventDefault();

            let name = document.getElementById("nam");
            let lName1 = document.getElementById("l-name1");
            let lName2 = document.getElementById("l-name2");

            if (name.value == "") {
                document.getElementById("names-error").innerHTML = "*Completa los datos";
                document.getElementById("nam").style.border = "2px solid #a8234a";
                name.focus();
            } else if (lName1.value == "") {
                document.getElementById("l-name1-error").innerHTML = "*Completa los datos";
                document.getElementById("l-name1").style.border = "2px solid #a8234a";
                lName1.focus();
                document.getElementById("nam").style.border = "1px solid var(--secondary);"
                document.getElementById("names-error").innerHTML = " "
            } else if (lName2.value == "") {
                document.getElementById("l-name2-error").innerHTML = "*Completa los datos"
                document.getElementById("l-name2").style.border = "2px solid #a8234a"
                lName2.focus();
                document.getElementById("nam").style.border = "1px solid var(--secondary);"
                document.getElementById("names-error").innerHTML = " "
                document.getElementById("l-name1-error").innerHTML = " ";
                document.getElementById("l-name1").style.border = "1px solid var(--secondary);";
            } else {
                movPag.style.marginLeft = "-25%"; //el 100% se divide en las 4pag dando asi 25%
                num[cont - 1].classList.add("active"); //agrega ala lista alemento n°1 - (0) la clase (active)
                progressText[cont - 1].classList.add("active");
                progresscheck[cont - 1].classList.add("active");
                cont += 1;

                document.getElementById("nam").style.border = "1px solid var(--secondary);"
                document.getElementById("names-error").innerHTML = " "
                document.getElementById("l-name1-error").innerHTML = " ";
                document.getElementById("l-name1").style.border = "1px solid var(--secondary);";
                document.getElementById("l-name2-error").innerHTML = " ";
                document.getElementById("l-name2").style.border = "1px solid var(--secondary);";
            }
        });

        /*PAGe 2 a page 3*/
        btn_forw3.addEventListener("click", function (sig) {
            sig.preventDefault();

            let birthdate = document.querySelector('#b-date').value;
            let email = document.getElementById("mail").value;

            if (email == "") {
                document.getElementById("mail-error").innerHTML = "* Email invalido"
                document.getElementById("mail").style.border = "2px solid #a8234a"
                email.focus();
            } else if (email.length < 6) {
                document.getElementById("mail-error").innerHTML = "* 6 o mas caracteres"
                document.getElementById("mail").style.border = "2px solid #a8234a"
                email.focus();
            } else if (!validatemail(email)) {
                document.getElementById("mail-error").innerHTML = "* No olvidaste el @?"
                document.getElementById("mail").style.border = "2px solid #a8234a"
                email.focus();
            } else {
                if (birthdate == "") {
                    document.getElementById("b-date-error").innerHTML = "* Seleccione una fecha"
                    document.getElementById("b-date").style.border = "2px Solid #a8234a"
                    document.getElementById("mail-error").innerHTML = ""
                    document.getElementById("mail").style.border = "1px solid var(--secondary);"
                    birthdate.focus();
                } else {
                    document.getElementById("b-date-error").innerHTML = ""
                    document.getElementById("b-date").style.border = "1px solid var(--secondary);"
                    document.getElementById("mail-error").innerHTML = ""
                    document.getElementById("mail").style.border = "1px solid var(--secondary);"

                    movPag.style.marginLeft = "-50%";
                    num[cont - 1].classList.add("active");
                    progressText[cont - 1].classList.add("active");
                    progresscheck[cont - 1].classList.add("active");
                    cont += 1;
                }

            }
            function validatemail($n) {
                let ExpRegular_Correo = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                return ExpRegular_Correo.test($n);
            }
        })

        /*PAGe 2 - atras page 1*/
        btn_back1.addEventListener("click", function (sig) {
            sig.preventDefault();
            movPag.style.marginLeft = "0%"; //regresaria al 0% 
            num[cont - 2].classList.remove("active");
            progressText[cont - 2].classList.remove("active");
            progresscheck[cont - 2].classList.remove("active");
            cont -= 1;
        })



        /*PAGe 3 a page 4*/
        btn_forw4.addEventListener("click", function (sig) {
            sig.preventDefault();

            let pass1 = document.querySelector('#pass-1').value
            let pass2 = document.querySelector('#pass-2').value

            if (pass1 == "") {
                document.getElementById("pass-1-error").innerHTML = "* Campo obligatorio";
                document.getElementById("pass-1").style.border = "2px solid #a8234a";
                pass1.focus()
            } else if (pass2 == "") {
                document.getElementById("pass-2-error").innerHTML = "* Campo obligatorio"
                document.getElementById("pass-2").style.border = "2px solid #a8234a"
                pass2.focus()
                document.getElementById("pass-1-error").innerHTML = " ";
                document.getElementById("pass-1").style.border = "";
            } else if (pass1.length < 8 || !passVerify(pass1) || pass2.length < 8 || !passVerify(pass2)) {
                document.getElementById("pass-1-error").innerHTML = "* 1 Mayus, 1minus y 8letras"
                document.getElementById("pass-1").style.border = "2px solid #a8234a"
                pass1.focus()
            } else if (pass1 != pass2) {
                document.getElementById("pass-1-error").innerHTML = "* contaseñas diferentes"
                document.getElementById("pass-1").style.border = "2px solid #a8234a"
                document.getElementById("pass-2-error").innerHTML = "* Campo obligatorio"
                document.getElementById("pass-2").style.border = "2px solid #a8234a"
                pass1.focus()
            } else {
                document.getElementById("pass-1-error").innerHTML = " ";
                document.getElementById("pass-1").style.border = "1px solid var(--secondary);";
                document.getElementById("pass-2-error").innerHTML = " ";
                document.getElementById("pass-2").style.border = "1px solid var(--secondary)";
                movPag.style.marginLeft = "-75%";
                num[cont - 1].classList.add("active");
                progressText[cont - 1].classList.add("active");
                progresscheck[cont - 1].classList.add("active");
                cont += 1;
            }


            function passVerify($n) {
                let expPass = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/;
                return expPass.test($n);
            }
        })

        /*PAGe 3 - atras page 2*/
        btn_back2.addEventListener("click", function (sig) {
            sig.preventDefault();
            movPag.style.marginLeft = "-25%"; //regresaria al 25%
            num[cont - 2].classList.remove("active");
            progressText[cont - 2].classList.remove("active");
            progresscheck[cont - 2].classList.remove("active");
            cont -= 1;
        })



        /*PAGe 4 / atras-pag3*/
        btn_back3.addEventListener("click", function (sig) {
            sig.preventDefault();
            movPag.style.marginLeft = "-50%"; //regresaria al 50%
            num[cont - 2].classList.remove("active");
            progressText[cont - 2].classList.remove("active");
            progresscheck[cont - 2].classList.remove("active");
            cont -= 1;
        })

    })


    document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
