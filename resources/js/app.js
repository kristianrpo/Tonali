document.addEventListener("DOMContentLoaded", function () {
    window.openDeleteModal = function () {
        document.getElementById("deleteModal").classList.remove("hidden");
    };

    window.closeDeleteModal = function () {
        document.getElementById("deleteModal").classList.add("hidden");
    };
});
