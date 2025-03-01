let cartCounter = document.querySelectorAll('.cart-counter');
var menu = document.querySelectorAll('.menu-img')

console.log(menu)
const swiper = new Swiper('.swiper', {
    loop: true,
    grabCursor: true,
    spaceBetween: 16,

    // autoplay: {
    //     delay: 5000,
    // },

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return '<div class="' + className + '"><img src="'+menu[index].currentSrc+'"></div>';
        },
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

})

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        let productId = button.getAttribute('product_id');

        let request = new XMLHttpRequest();
        request.open('POST', '/proyecto/products/:id', true);
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

cartCounter.forEach(cart => {
    if (cart.innerHTML != '') {
        cart.style.display = 'flex'
    }
})
