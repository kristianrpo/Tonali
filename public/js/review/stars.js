document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("ratingInput");

    stars.forEach((star) => {
        star.addEventListener("click", function () {
            const rating = this.getAttribute("data-value");

            ratingInput.value = rating;

            stars.forEach((s) => s.classList.remove("text-yellow-300"));
            stars.forEach((s) => s.classList.add("text-gray-300"));

            for (let i = 0; i < rating; i++) {
                stars[i].classList.remove("text-gray-300");
                stars[i].classList.add("text-yellow-300");
            }
        });
    });
});
