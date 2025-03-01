document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.querySelector('.m-p-btn');
    const menu = document.querySelector('.menu-products-c');
    let cartCounter = document.querySelectorAll('.cart-counter');

    window.addEventListener('resize', handleResize);

    menuBtn.addEventListener('click', function () {
        menu.classList.toggle('active-p');
    })

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            let productId = button.getAttribute('product_id');

            let request = new XMLHttpRequest();
            request.open('POST', 'Yoguini_Nana_Shop/products/:id', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send('product_id=' + encodeURIComponent(productId));

            cartCounter.forEach(cart => {
                if (cart.innerHTML == '') {
                    cart.style.display = 'block'
                    cart.innerHTML = '1';
                } else {
                    cart.innerHTML = parseInt(cart.innerHTML) + 1;
                }
            })

        })
    });

    handleResize();

    cartCounter.forEach(cart => {
        if (cart.innerHTML != '') {
            cart.style.display = 'flex'
        }
    })



    function handleResize() {
        const windowWidth = window.innerWidth;
        if (windowWidth > 780) menu.classList.remove('active-p');
    }


})