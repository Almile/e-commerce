document.addEventListener("DOMContentLoaded", () => {
    const cartButtons = document.querySelectorAll(".add-to-cart");

    cartButtons.forEach(button => {
        button.addEventListener("click", () => {
            const productId = button.getAttribute("data-id");

            fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error("Erro:", error));
        });
    });
});

function showFeedback() {
    const modal = document.getElementById('feedback-modal');
    modal.style.display = 'block';
    setTimeout(() => modal.style.display = 'none', 2000);
}


document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search-bar');
    const categoryFilter = document.querySelector('.category-filter');
    const torraFilter = document.querySelector('.torra-filter');
    const productList = document.querySelectorAll('.product-card');

function filterProducts() {
    const searchValue = searchInput.value.toLowerCase();
    const categoryValue = categoryFilter.value.toLowerCase();
    const torraValue = torraFilter.value.toLowerCase();

    productList.forEach(product => {
        const productName = product.getAttribute('data-name').toLowerCase();
        const productCategory = product.getAttribute('data-category').toLowerCase();
        const productTorra = product.getAttribute('data-torra').toLowerCase();

        const matchesSearch = productName.includes(searchValue);
        const matchesCategory = !categoryValue || productCategory === categoryValue;
        const matchesTorra = !torraValue || productTorra === torraValue;

        if (matchesSearch && matchesCategory && matchesTorra) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

    searchInput.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);
    torraFilter.addEventListener('change', filterProducts);

});

function updateCartTotals() {
    let total = 0;

    document.querySelectorAll('.quantity-input').forEach(function(input) {
        const productId = input.getAttribute('data-id');
        const price = parseFloat(input.getAttribute('data-price'));
        const quantity = parseInt(input.value);
        const subtotal = price * quantity;

        document.getElementById('subtotal-' + productId).innerText = 'R$ ' + subtotal.toFixed(2).replace('.', ',');

        total += subtotal;
    });

    document.getElementById('total').innerText = total.toFixed(2).replace('.', ',');
}

document.querySelectorAll('.quantity-input').forEach(function(input) {
    input.addEventListener('change', function() {
        updateCartTotals();
    });
});

updateCartTotals();

function addToCart(productId, quantity) {
    console.log("Produto Adicionado:", productId, "Quantidade:", quantity);
    alert('Produto adicionado ao carrinho!');
}

