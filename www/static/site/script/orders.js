$( document ).ready(function(){

    $("#select_area").val(-1);

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

    $("#select_market").on("change", function(e){
       var t = $(e.target),
           id = t.val();
        
       /*if (id!=-1){
           $.post("orders/getProducts", {market: id}, function(response){
               var select_gg = $("#select_market");

               select_gg.empty();

               if (response != ''){
                   $.each(response, function() {
                       select_gg.append($("<option />").val(this.idgg).text(this.namegg));
                   });
               }
           }, 'json')
       }*/
    });

    $("#order_form").on("submit", function(e){
        e.preventDefault();
        var frm = $("#order_form"),
            //sel_area = frm.find("#select_area").val(),
            //sel_city = frm.find("#select_area").val(),
            sel_market = frm.find("#select_market").val();

        if(sel_market != -1){
            $.post('orders/getProducts', function(response){
                $("#datatable_products").dataTable({
                    destroy: true,
                    "dom": 'rt<"bottom"p>',
                    "data": response,
                    "columns": [

                        { "data": "nameProduct", title:"Name" },
                        { title: "Order", class:"text-right" }
                        //{class:"checkbox"}
                    ],
                    "columnDefs": [
                        {
                            // The `data` parameter refers to the data for the cell (defined by the
                            // `data` option, which defaults to the column being worked with, in
                            // this case `data: 0`.
                            "render": function ( data, type, row ) {
                                return '<form class="form-inline">' +
                                        '<div class="form-group">' +

                                            '<input type="checkbox" value="Order" data-product="'+ row["nameProduct"] +'"> ' +
                                        '</div>' +
                                        ' </form>';
                            },
                            "targets": 1
                        }
                    ]
                });
            }, 'json');
        }
    });

    $("#make_order").on("click", function(e){
        var checked_items = $("#datatable_products input:checked");

        var product_id = [];
        var city = document.getElementById("select_city").value; // А ЭТО ТОГДА БЛЯТЬ ЧТО ТАКОЕ ?! КАКОГО ХУЯ ТЫ ИЩЕШЬ ЕГО ВООБЩЕ В ЛЕВОЙ ФУНКЦИИ
        var market = document.getElementById("select_market").value;

        $.each(checked_items,function(n,v){
            product_id.push($(v).data('product'));
        });

        $.post("orders/placeOrder", {products:product_id,city,market}, function(response){
            if(response.result){
                window.location.replace("my");
                t.addClass("btn-success");
                t.removeClass("btn-danger");
                alert('Order was successful!');
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