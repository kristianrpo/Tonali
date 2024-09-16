$(document).ready(function () {
    $(".decrease-quantity, .increase-quantity").click(function (e) {
        e.preventDefault();
        let productId = $(this).data("id");
        let quantitySpan = $('span[data-id="' + productId + '"]');
        let quantity = parseInt(quantitySpan.text());

        if ($(this).hasClass("increase-quantity")) {
            quantity++;
        } else {
            if (quantity > 1) {
                quantity--;
            }
        }
        $.ajax({
            type: "POST",
            url: cartUpdateUrl,
            data: {
                _token: csrfToken,
                id: productId,
                quantity: quantity,
            },
            success: function (response) {
                quantitySpan.text(quantity);
                $(".summary-quantity-" + productId).text(quantity);
                $(".total-price").text(response.total);
            },
        });
    });
});
