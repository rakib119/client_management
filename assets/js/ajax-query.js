// get sub category 
    function categoriesid(id) {
        $.ajax({
            url: "get_sub_cat.php",
            type: "POST",
            data: {
                categories_id: id
            },
            success: function(data) {
                $("#subcategories_id").html(data);
            }
        });
    }
// get service 
    function subcategoriesid(id) {
        $.ajax({
            url: "get_service.php",
            type: "POST",
            data: {
                subcategories_id: id
            },
            success: function(data) {
                $("#service_id").html(data);
            }
        });
    }

// get service 
    function getServicePrice(id) {
        $.ajax({
            url: "get_service_amount.php",
            type: "POST",
            data: {
                service_id: id
            },
            success: function(data) {
                $("#main_price").val(data);
                $("#discount_price").val(data);
            }
        });

    }

//  discount Calculation 
    function calculate_discount(id) {
        var service_id = $("#service_id").val()
        $.ajax({
            url: "discount_calculation.php",
            type: "POST",
            data: {
                campaign_id: id,
                service_id: service_id,
            },
            success: function(data) {
                $("#discount_price").val(data);
            }
        });
    }
