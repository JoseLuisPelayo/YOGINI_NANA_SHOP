<script>
    document.addEventListener('DOMContentLoaded', function() {
        let iconMenu = document.querySelector('.menu-icon');
        let dropdowns = document.querySelectorAll('.dropdown-toggle');
        let navMLinks = document.querySelector('#nav-m-links');
        let cartCounter = document.querySelectorAll('.cart-counter');

        iconMenu.addEventListener('click', (e) => {
            e.preventDefault();
            navMLinks.classList.toggle('active');
            iconMenu.classList.toggle('active');
        })

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', (e) => {
                e.preventDefault();
                dropdown.classList.toggle('active');
            })
        })

        cartCounter.forEach(cart => {
    if (cart.innerHTML != '') {
        cart.style.display = 'flex'
    } 
    })
})
</script>