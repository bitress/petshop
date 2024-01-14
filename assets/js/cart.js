$(function() {



    // ADD TO CART FUNCTIONS

        $(".addtocart").on("click", function(e) {
            e.preventDefault();

            var product_id = $(this).data("id");
            var quantity = $("#quantity_"+ product_id).val();

            $.ajax({
                url: "config/Ajax.php",
                type: "POST",
                data: {
                    action: "addToCart",
                    product_id: product_id,
                    quantity: quantity
                }, success: function (data) {
                    if (data === "true"){
                        notyf.success("Added to cart successfully")
                    } else {
                        notyf.error(data)
                    }
                }
            })
        })



    // FETCH CART FUNCTIONS
    function fetchCart(){
        $.ajax({
            url: "config/Ajax.php",
            type: "POST",
            data: {
                action: "getCartItems"
            },
            dataType: "json",
            success: function(data) {
                // The data object contains the properties returned by the PHP script
                var cartItems = data.cart_items;
                var cartItemsHtml = data.cart_items_html;
                var total = data.total_price;

                $(".cart-items").html(cartItems);
                $("#cart-list").html(cartItemsHtml)
                $("#total_cart").html("Total: ₱" + total);
            }
        });
    }

    fetchCart();

    // Fetch the cart every 3 seconds
    setInterval(function(){
        fetchCart();
    }, 3000)


    // END OF FETCH CART FUNCTIONS

});