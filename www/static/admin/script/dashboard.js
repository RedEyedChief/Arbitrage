var idProduct = 0;

$(document).ready(function()
{
    view_op();

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
                    var html = "<table class='table table-striped parseResult' >" +
                        "<thead>" +
                        "<tr>" + "</th>" +
                        "<th>ID</th>" +
                        "<th>Information</th>" +
                        "<th style='width: 30px;'></th>" +
                        "<th style='width: 30px;'></th>" +
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
                    "</table>";
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
});

//Machulyanskiy: Відображення списку ОП
function view_op()
{
    $(".add_op").hide();
    $(".view_op").show();

    console.log('view');
    $.ajax({
        url: 'http://arbitrage/dashboard/get_OP',
        dataType: 'json',
        success: function (data) {
			console.log(data);
			if(data != false)
			{
			$('#empty_OP').hide();
            var html = "<table class='table table-striped' >" +
                "<thead>" +
                "<tr>" + "</th>" +
                "<th>ID</th>" +
                "<th>Adress</th>" +
                "<th>Rule</th>" +
                "<th style='width: 30px;'></th>" +
                "<th style='width: 30px;'></th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>";

            for (index = 0; index < data.length; ++index) {
                html += "<tr> <td>" + data[index]['idParser'] + "</td>" +
                "<td>" + data[index]['adressParser'] + "</td>" +
                "<td>" + data[index]['rurlesParser'] + "</td>" +
                "<td> <i class='fa fa-list-ul text-muted cursor ' onclick='get_elements_OP(this)'> </i> </td>" +
                "<td> <i class='fa fa-remove text-muted cursor ' onclick='OP_delete(this)'> </i> </td> </tr>"
            }
            html += "</tbody>" +
            "</table>";
            $('#list_OP').html(html);
			
			}
			else $('#empty_OP').show();
			//$('#empty_OP').html('<div class="alert alert-warning"> <strong>' + 'List of OP is empty !' + '</strong> </div>');
        },
        error: function () {
            console.log('retard');
            
        }

    });
}

/*function get_elements_OP(op)
{
    var id = $(op).parents('tr').children(0).html();
    $.ajax({
        type: "POST",
        url: 'http://arbitrage/dashboard/get_elements_OP',
        data: {id : id},
        dataType: 'json',
        success:function(data){
            //console.log(data);
            var html = "<div class='ok'><table class='table table-striped ' >" +
                "<thead>" +
                "<tr>" + "</th>" +
                "<th>ID</th>" +
                "<th>Name</th>" +
                "<th>Price</th>" +
                "<th style='width: 30px;'></th>" +
                "<th style='width: 30px;'></th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>";
            for (index = 0; index < data.length; ++index) {
                html += "<tr> <td>" + data[index]['id'] + "</td>" +
                "<td>" + data[index]['name'] + "</td>" +
                "<td>" + data[index]['price'] + "</td>" +
                "<td> <i class='fa fa-edit text-muted cursor ' onclick=''> </i> </td>" +
                "<td> <i class='fa fa-remove text-muted cursor ' onclick=''> </i> </td> </tr>"
            }
            html += "</tbody>" +
            "</table></div>";
            $(op).parents('tr').html(html);
        },
        error: function () {
            console.log('retard');
        }
    });
}*/

//Machulyanskiy: Видалення ОП
function OP_delete(op)
{
    var id = $(op).parents('tr').children(0).html();

    $.ajax({
        type: "POST",
        async: true,
        url: 'http://arbitrage/dashboard/delete_OP',
        data: {id : id},
        success:function(data){
            $(op).parents('tr').remove();
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