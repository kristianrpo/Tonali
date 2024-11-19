document.addEventListener("DOMContentLoaded", function () {
    // Dropdown for filter
    const filterDropdownButton = document.getElementById(
        "filterDropdownButton",
    );
    const filterDropdown = document.getElementById("filterDropdown");
    if (filterDropdownButton && filterDropdown) {
        filterDropdownButton.addEventListener("click", function () {
            filterDropdown.classList.toggle("hidden");
        });
    }

    // Dropdown for category
    const categoryDropdownButton = document.getElementById(
        "categoryDropdownButton",
    );
    const categoryDropdown = document.getElementById("categoryDropdown");
    if (categoryDropdownButton && categoryDropdown) {
        categoryDropdownButton.addEventListener("click", function () {
            categoryDropdown.classList.toggle("hidden");
        });
    }

    // Dropdown for rating
    const ratingDropdownButton = document.getElementById(
        "ratingDropdownButton",
    );
    const ratingDropdown = document.getElementById("ratingDropdown");
    if (ratingDropdownButton && ratingDropdown) {
        ratingDropdownButton.addEventListener("click", function () {
            ratingDropdown.classList.toggle("hidden");
        });
    }

    // Dropdown for price
    const priceDropdownButton = document.getElementById("priceDropdownButton");
    const priceDropdown = document.getElementById("priceDropdown");
    if (priceDropdownButton && priceDropdown) {
        priceDropdownButton.addEventListener("click", function () {
            priceDropdown.classList.toggle("hidden");
        });
    }

    // Dropdown for stock quantity
    const stockQuantityDropdownButton = document.getElementById(
        "stockQuantityDropdownButton",
    );
    const stockQuantityDropdown = document.getElementById(
        "stockQuantityDropdown",
    );
    if (stockQuantityDropdownButton && stockQuantityDropdown) {
        stockQuantityDropdownButton.addEventListener("click", function () {
            stockQuantityDropdown.classList.toggle("hidden");
        });
    }
});
