document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search-bar');
    const categoryFilter = document.querySelector('.category-filter');
    const torraFilter = document.querySelector('.torra-filter');
    const productRows = document.querySelectorAll('table tbody tr');

    function filterProducts() {
        const searchValue = searchInput.value.toLowerCase();
        const categoryValue = categoryFilter.value.toLowerCase();
        const torraValue = torraFilter.value.toLowerCase();

        productRows.forEach(row => {
            const productName = row.getAttribute('data-name').toLowerCase();
            const productCategory = row.getAttribute('data-category').toLowerCase();
            const productTorra = row.getAttribute('data-torra').toLowerCase();

            const matchesSearch = productName.includes(searchValue);
            const matchesCategory = !categoryValue || productCategory === categoryValue;
            const matchesTorra = !torraValue || productTorra === torraValue;

            if (matchesSearch && matchesCategory && matchesTorra) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);
    torraFilter.addEventListener('change', filterProducts);
});
