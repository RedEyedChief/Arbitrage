$( document ).ready(function(){

    $("#select_area").val(-1);

    $("#select_area").val(0);

    $("#select_area").on("change", function(e){
        var t = $(e.target),
            id = t.val();

        if (id != -1){
            // Refresh City select
            $.post("orders/getCities", {area: id}, function(response){
                var select_city = $("#select_city"),
                    select_marker = $("#select_market");

                select_city.empty();
                select_marker.empty();

                if (response != ''){
                    $.each(response, function() {
                        select_city.append($("<option />").val(this.idCity).text(this.nameCity));
                    });
                }
            }, 'json')
        }
    });

    $("#select_city").on("change", function(e){
       var t = $(e.target),
           id = t.val();

       if (id!=-1){
           $.post("orders/getMarkets", {city: id}, function(response){
               var select_market = $("#select_market");

               select_market.empty();

               if (response != ''){
                   $.each(response, function() {
                       select_market.append($("<option />").val(this.idMarket).text(this.nameMarket));
                   });
               }
           }, 'json')
       }
    });

    $("#order_form").on("submit", function(e){
        e.preventDefault();
        var frm = $("#order_form"),
            //sel_area = frm.find("#select_area").val(),
            //sel_city = frm.find("#select_area").val(),
            sel_market = frm.find("#select_market").val();

        if(sel_market != -1){
            $.post('orders/getProducts', {market: sel_market}, function(response){
                $("#datatable_products").dataTable({
                    destroy: true,
                    "dom": 'rt<"bottom"p>',
                    "data": response,
                    "columns": [
                        { "key": "idProduct", title: "ID", visible: false },
                        { "key": "nameProduct", title:"Name" },
                        { "key": "countProduct", "class": "center", title: "Count", visible: false },
                        { "key": "priceProduct", "class": "center", title:"Price" },
                        { title: "Order", class:"text-right" }
                    ],
                    "columnDefs": [
                        {
                            // The `data` parameter refers to the data for the cell (defined by the
                            // `data` option, which defaults to the column being worked with, in
                            // this case `data: 0`.
                            "render": function ( data, type, row ) {
                                return '<form class="form-inline">' +
                                        '<div class="form-group">' +
                                            '<input placeholder="Quantity" class="form-control" name="number" type="number" style="margin-right: 7px" />' +
                                            '<input type="button" class="btn btn-small order_product" value="Order" data-product="'+ row[0] +'"> ' +
                                        '</div>' +
                                        ' </form>';
                            },
                            "targets": 4
                        }
                    ]
                });
            }, 'json');
        }
    });

    $("#datatable_products").on("click", ".order_product", function(e){
        var t = $(e.target),
            product = t.data('product');

        var data = {product: product, quantity: t.prev().val()};

        $.post("orders/placeOrder", data, function(response){
            if(response.result){
                t.addClass("btn-success");
                t.removeClass("btn-danger");
            }
            else {
                t.addClass("btn-danger");
                t.removeClass("btn-success");
                alert(response.error);
            }
        }, 'json');
    });

    $("#orders").dataTable({
        "dom": 'rt<"bottom"p>',
    });
});