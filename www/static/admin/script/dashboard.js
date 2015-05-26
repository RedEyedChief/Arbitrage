var idProduct = 0;

$(document).ready(function()
{
    //view_op();

    $(".add_op").hide();
    $(".view_op").show();

    //Machulyanskiy: Переходимо в пункт створення ОП
    $("#add_op").click(function() {
        $(".view_op").hide();
        $(".add_op").show();
    });

    //Machulyanskiy: Задаємо правила і парсимо сторінку (створюємо ОП) + зберігаємо тип продукту
    $("#doParse").click(function() {
        $('#progress_parsing').show();
        $('#parser_error').hide();
        $('#parser_data_error').hide();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'http://arbitrage/dashboard/parsing_request',
            data: {
                parserURL: $('#parserURL').val(),
                parserRule: $('#parserRule').val(),
                parserProductType: $('#parserProductType').val(),
                parserCategory: $('#parserCategory').val()
            },
            beforeSend: function(){
                console.log('validator');
                var parserURL = $('#parserURL').val();
                var parserRule = $('#parserRule').val();
                var parserProductType = $('#parserProductType').val();
                var parserCategory = $('#parserCategory').val();

                if (parserURL !== "")
                {
                    $('#parserURL').parent().removeClass('has-error');
                    $('#parserURL').parent().addClass('has-success');
                }
                if (parserRule !== "")
                {
                    $('#parserRule').parent().removeClass('has-error');
                    $('#parserRule').parent().addClass('has-success');
                }
                if (parserProductType !== "")
                {
                    $('#parserProductType').parent().removeClass('has-error');
                    $('#parserProductType').parent().addClass('has-success');
                }
                if (parserCategory !== "")
                {
                    $('#parserCategory').parent().removeClass('has-error');
                    $('#parserCategory').parent().addClass('has-success');
                }
                if (parserProductType == "" || parserURL == "" || parserRule=="" || parserCategory==""){
                    $('#parser_error').show();

                    if (parserURL =="") $('#parserURL').parent().addClass('has-error');
                    if (parserRule =="") $('#parserRule').parent().addClass('has-error');
                    if (parserProductType =="") $('#parserProductType').parent().addClass('has-error');
                    if (parserCategory =="") $('#parserCategory').parent().addClass('has-error');

                    return false;
                }

                else return true;
            },

            success: function (data) {
                /*idProduct = data['idProduct'];
                console.log(idProduct,data, data[0]['idProduct']);*/
                $('#progress_parsing').hide();
				$('#parse_nothing_found').hide();
                $("#parseResult").fadeIn(2000);
                //console.log('success', data['status'], data["message"]);
                if(data['status'] == 'not_ok')
                {
                    if(data["message"] == 'Wrong URL!')
                    {
                        console.log('message');
                        $('#parserURL').parent().removeClass('has-success');
                        $('#parserURL').parent().addClass('has-error');
                    }
                    else
                    {
                        $('#parserRule').parent().removeClass('has-success');
                        $('#parserRule').parent().addClass('has-error');
                    }
                    $('#parse_error').html('<div class="alert alert-danger" id="parse_error_message"><strong>' + data["message"] + '</strong> </div>');
                    $('#table_parsing_result table').remove();
                }
                else
                {
                    $('#parse_error_message').remove();
                    var html = "<table class='table table-striped table_parse_Result' >" +
                        "<thead>" +
                        "<tr>" + "</th>" +
                        "<th>ID</th>" +
                        "<th>Information</th>" +
                        "<th class='width_30_px'></th>" +
                        "<th class='width_30_px'></th>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody>";

                    for (index = 0; index < data.length; ++index) {
                        idProduct = data[index]['idProduct'];
                        //idMarket = data[index]['idMarket'];
                        html += "<tr> <td>" + (index + 1) + "</td>" +
                        "<td>" + data[index]['info'] + "</td>" +
                        "<td> <i class='fa fa-edit text-muted cursor ' onclick='element_OP_edit(this)'> </i> </td>" +
                        "<td> <i class='fa fa-remove text-muted cursor ' onclick='element_OP_delete(this)'> </i> </td> </tr>"
                    }
                    html += "</tbody>" +
                    "</table><hr><button type='button' class='btn btn-success btn-lg center-block col-xs-4' id='continue_view'>Continue</button>";
                    $('#table_parsing_result').html(html);
                }

                //if(data['message']) $('#parse_error').show();

            },
            error: function (data) {
                //console.log('retard',data[status]);
                $('#progress_parsing').hide();
				$('#parse_nothing_found').show();
            }
        });
        return false;
    });

    //Machulyanskiy: Зберігаємо екземляри товару
    $("#parserSave").click(function() {
        $('#Form_error').hide();

        console.log($('tr.success:not(.already)').length, $('tr.success').length );
        if($('tr.success:not(.already)').length > 0)
        {
            $('tbody tr.success').hide();
            console.log($('#table_parse_Result').find('tbody'));
            var html="<tr class='success already'> <td class='round-icon'><i class='fa fa-plus-circle text-muted cursor bootstrap_success_color' onclick='view_elements(this)'> </i></td>" +
                "<td></td>" +
                "<td> </td>" +
                "<td> </td> </tr>";
            //$('#table_parse_Result').find('tbody').html(html);
            $('tr.success').before(html);
        }

        $.ajax({
            url: 'http://arbitrage/dashboard/save_items_of_product',
            data: {
                parserProductName: $('#parserProductName').val(),
                parserPrice: $('#parserPrice').val(),
                parserSeller: $('#parserSeller').val(),
                parserCount: $('#parserCount').val(),
                parserType: $('#parserType').val(),
                parserMarket: $('#parserMarket').val(),
                idProduct: idProduct

            },
            type: 'POST',
            beforeSend: function(){
                console.log('validate');
                var parserProductName = $('#parserProductName').val();
                var parserPrice = $('#parserPrice').val();
                var parserSeller = $('#parserSeller').val();
                var parserCount = $('#parserCount').val();
                var parserType = $('#parserType').val();
                var parserMarket = $('#parserMarket').val();

                if (parserProductName !== "")
                {
                    $('#parserProductName').parent().removeClass('has-error');
                    $('#parserProductName').parent().addClass('has-success');
                }
                if (parserPrice !== "")
                {
                    $('#parserPrice').parent().removeClass('has-error');
                    $('#parserPrice').parent().addClass('has-success');
                }
                if (parserSeller !== "")
                {
                    $('#parserSeller').parent().removeClass('has-error');
                    $('#parserSeller').parent().addClass('has-success');
                }
                if (parserCount !== "")
                {
                    $('#parserCount').parent().removeClass('has-error');
                    $('#parserCount').parent().addClass('has-success');
                }
                if (parserType !== "")
                {
                    $('#parserType').parent().removeClass('has-error');
                    $('#parserType').parent().addClass('has-success');
                }
                if (parserMarket !== "")
                {
                    $('#parserMarket').parent().removeClass('has-error');
                    $('#parserMarket').parent().addClass('has-success');
                }
                if (parserProductName=="" || parserPrice=="" || parserSeller=="" || parserCount=="" || parserType=="" || parserMarket==""){
                    $('#Form_error').show();

                    if (parserProductName =="") $('#parserProductName').parent().addClass('has-error');
                    if (parserPrice =="") $('#parserPrice').parent().addClass('has-error');
                    if (parserSeller =="") $('#parserSeller').parent().addClass('has-error');
                    if (parserCount =="") $('#parserCount').parent().addClass('has-error');
                    if (parserType =="") $('#parserType').parent().addClass('has-error');
                    if (parserMarket =="") $('#parserMarket').parent().addClass('has-error');

                    return false;
                }


                else return true;
            },
            success: function (msg) {
                //console.log($('tr[class=warning]'));
                $('tr[class=warning]').addClass('success');
                $('.warning, .success').removeClass('warning');
                console.log('success');
            },
            error: function () {
                alert('retard');
            }
        });
        return false;
    });

    $('#continue_view').click(function(){
        console.log($('tr.success').length);
        if($('tr.success').length > 0)
        {
            $(".add_op").hide();
            $(".view_op").show();
        }
        else
        {
            var html='<div class="alert alert-danger"> <strong>' + 'For continuing you must save at least one element' + '</strong> </div>';
            $('#continue_view').before(html);
        }
    });
});

//Machulyanskiy: Відображення списку ОП
function view_op()
{
    $(".add_op").hide();
    $(".view_op").show();

    /*console.log('view');
    $.ajax({
        url: 'http://arbitrage/dashboard/get_OP',
        dataType: 'json',
        success: function (data) {
			console.log(data);
			if(data != false)
			{
			$('#empty_OP').hide();*/
            /*var html = "<table class='table table-striped' >" +
                "<thead>" +
                "<tr>" + "</th>" +
                "<th>ID</th>" +
                "<th>Adress</th>" +
                "<th>Rule</th>" +
                "<th>Product</th>" +
                "<th>Category</th>" +
                "<th class='width_30_px'></th>" +
                "<th class='width_30_px'></th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>";

            for (index = 0; index < data.length; ++index) {
                html += "<tr> <td>" + data[index]['idParser'] + "</td>" +
                "<td>" + data[index]['adressParser'] + "</td>" +
                "<td>" + data[index]['rurlesParser'] + "</td>" +
                "<td>" + data[index]['nameProduct'] + "</td>" +
                "<td>" + data[index]['categoryProduct'] + "</td>" +
                "<td> <i class='fa fa-list-ul text-muted cursor ' onclick='get_elements_OP(this)'> </i> </td>" +
                "<td> <i class='fa fa-remove text-muted cursor ' onclick='OP_delete(this)'> </i> </td> </tr>"
            }
            html += "</tbody>" +
            "</table>";*/
           /* var html = '<form class="form-inline form-add">' +
            '<div class="form-group">' +
            '<div class="input-group">' +
            '<div class="form-control bg_eee" style="width: 42px;">ID</div>' +
            '<div class="input-group-addon"></div>' +
            '<input type="text" class="form-control" value="Adress" style="cursor:default" readonly>' +
            '<div class="input-group-addon"></div>' +
            '<input type="text" class="form-control" value="Rule" style="cursor:default" readonly>' +
            '<div class="input-group-addon"></div>' +
            '<input type="text" class="form-control" value="Product" style="cursor:default" readonly>' +
            '<div class="input-group-addon"></div>' +
            '<input type="text" class="form-control" value="Category" style="cursor:default" readonly>' +
            '<div class="input-group-addon"></div>' +
            '<div class="form-control bg_eee"><i class="fa fa-list-ul text-muted"></i></div>' +
            '<div class="input-group-addon"></div>' +
            '<div class="form-control bg_eee"><i class="fa fa-remove text-muted "></i></div>' +
            '</div></div></form>';

                for (index = 0; index < data.length; ++index) {
                    html += '<form class="form-inline form-add">' +
                    '<div class="form-group" id="form_group_OP">' +
                    '<div class="input-group" id="element_OP">' +
                    '<div class="form-control">' + data[index]["idParser"] + '</div>' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="adressParser" value='+ data[index]["adressParser"] + '>' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="rurlesParser" value='+ data[index]["rurlesParser"] + '>' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="nameProduct" value='+ data[index]["nameProduct"] + '>' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="categoryProduct" value='+ data[index]["categoryProduct"] + '>' +
                    '<div class="input-group-addon"></div>' +
                    '<div class="form-control "><i class="fa fa-list-ul text-muted cursor" onclick="get_elements_OP(this)"></i></div>' +
                    '<div class="input-group-addon"></div>' +
                    '<div class="form-control "><i class="fa fa-remove text-muted cursor" onclick="OP_delete(this)"></i></div>' +
                    '</div></div></form>';
                }
            $('#list_OP').html(html);
			
			}
			else $('#empty_OP').show();
			//$('#empty_OP').html('<div class="alert alert-warning"> <strong>' + 'List of OP is empty !' + '</strong> </div>');
        },
        error: function () {
            console.log('retard');
            
        }

    });*/
}

function get_elements_OP(op)
{
    console.log($(op).parents('#form_group_OP').children(0));
    if($(op).parents('#form_group_OP').children(1).hasClass('bg_eee'))
    {
        $(op).parents('#form_group_OP').find('#table_OP').remove();
        return;
    }

    var id = $(op).parents('#element_OP').children(0).html();


    console.log(id);
    $.ajax({
        type: "POST",
        url: 'http://arbitrage/dashboard/get_elements_OP',
        data: {id : id},
        dataType: 'json',
        success:function(data){
            //console.log(data);
            var html = "<table class='table' id='table_OP' >" +
                "<thead>" +
                "<tr>" + "</th>" +
                "<th>#</th>" +
                "<th>Name</th>" +
                "<th>Price</th>" +
                "<th>Count</th>" +
                "<th>Type</th>" +
                "<th>Seller</th>" +
                "<th class='width_30_px'></th>" +
                "<th class='width_30_px'></th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>";
            for (index = 0; index < data.length; ++index) {
                html += "<tr> <td>" + index+1 + "</td>" +
                "<td>" + data[index]['nameItem'] + "</td>" +
                "<td>" + data[index]['priceItem'] + "</td>" +
                "<td>" + data[index]['countItem'] + "</td>" +
                "<td>" + data[index]['typeItem'] + "</td>" +
                "<td>" + data[index]['sellerItem'] + "</td>" +
                "<td> <i class='fa fa-edit text-muted cursor ' onclick='item_OP_edit(this)'> </i> </td>" +
                "<td> <i class='fa fa-remove text-muted cursor ' onclick=''> </i> </td> </tr>"
            }
            html += "</tbody>" +
            "</table>";
            $(op).parents('#element_OP').after(html);
            $('#table_OP').addClass('bg_eee');
        },
        error: function () {
            console.log('retard');
        }
    });
}

//Machulyanskiy: Видалення ОП
function OP_delete(op)
{
    var id = $(op).parents('#element_OP').children(0).html();

    $.ajax({
        type: "POST",
        async: true,
        url: 'http://arbitrage/dashboard/delete_OP',
        data: {id : id},
        success:function(data){
            $(op).parents('#element_OP').remove();
        },
        error: function () {
            console.log('retard');
        }
    });

}

//Machulyanskiy: Беремо на редагування елемент ОП
function element_OP_edit(op)
{
    $("#parserForm").show();
    $(op).parents('tr').addClass('warning');
}

//Machulyanskiy: Видаляємо елемент ОП
function element_OP_delete(op)
{
    $(op).parents('tr').remove();
}

//Machulyanskiy: Беремо на редагування продукт ОП
function item_OP_edit(op)
{
    //console.log($(op).parents('tr')[0].click());
    console.log($('#table_OP').click());
    if($(op).parents('tr').find('td').keypress())
    {
        console.log('zyap-zyap');
    }
    $("#parserForm").show();
    $(op).parents('tr').addClass('warning');
}