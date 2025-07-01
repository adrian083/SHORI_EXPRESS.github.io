let slideIndex = 0;
let slides = [];
function showSlides() {
    if (slides.length === 0) {
        slides = document.getElementsByClassName("carousel-slide");
        if (slides.length === 0) return;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 4000);
}

function plusSlides(n) {
    if (slides.length === 0) {
        slides = document.getElementsByClassName("carousel-slide");
        if (slides.length === 0) return;
    }
    slideIndex += n;
    if (slideIndex > slides.length) { slideIndex = 1 }
    if (slideIndex < 1) { slideIndex = slides.length }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

document.addEventListener('DOMContentLoaded', () => {
    slides = document.getElementsByClassName("carousel-slide");
    if (slides.length > 0) {
        showSlides();
    }
});

        document.addEventListener('DOMContentLoaded', () => {
            const quantityInputs = document.querySelectorAll('.item-quantity');
            const totalDisplay = document.getElementById('total_pedido_display');
            const totalHiddenInput = document.getElementById('total_pedido_hidden');
            const orderForm = document.getElementById('orderForm');

            function calculateTotal() {
                let total = 0;
                quantityInputs.forEach(input => {
                    const price = parseFloat(input.dataset.price);
                    const quantity = parseInt(input.value);
                    if (!isNaN(price) && !isNaN(quantity) && quantity > 0) {
                        total += price * quantity;
                    }
                });
                totalDisplay.textContent = `$${total.toFixed(2)}`;
                totalHiddenInput.value = total.toFixed(2);
            }

            quantityInputs.forEach(input => {
                input.addEventListener('input', calculateTotal);
            });

            calculateTotal();

            orderForm.addEventListener('submit', (event) => {

            });
        });