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
                    button.setAttribute("name", "heart"); // Altera o ícone para mostrar que foi adicionado
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