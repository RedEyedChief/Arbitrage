//OP - Object of Parsing
//ОП - Объект парсинга

var idProduct = 0;
var idParser = 0;

$(document).ready(function()
{
    view_op();

    $(".add_op").hide();
    $(".view_op").show();

    //Machulyanskiy: Переходимо в пункт створення ОП
    $("#add_op").click(function() {
        $(".view_op").hide('slow');
        $(".add_op").show('slow');
    });

    //Machulyanskiy: Задаємо правила і парсимо сторінку (створюємо ОП) + зберігаємо тип продукту
    $("#doParse").click(function() {

        $('#progress_parsing').show('slow');
        $('#parser_error').hide();
        $('#parser_data_error').hide();

        /*if($('#parser_error').is(":visible"))
        {
            console.log('bag');
            $('#progress_parsing').hide('slow');
            $('#parse_error').hide('slow');
        }*/

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/dashboard/parsing_request',
            data: {
                parserURL: $('#parserURL').val(),
                parserRule: $('#parserRule').val(),
                parserProductType: $('#parserProductType').val(),
                parserCategory: $('#parserCategory').val()
            },

            beforeSend: function(){
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
                    $('#parser_error').show('slow');
                    $('#progress_parsing').hide('slow');
                    $('#parse_error_message').remove();

                    if (parserURL =="") $('#parserURL').parent().addClass('has-error');
                    if (parserRule =="") $('#parserRule').parent().addClass('has-error');
                    if (parserProductType =="") $('#parserProductType').parent().addClass('has-error');
                    if (parserCategory =="") $('#parserCategory').parent().addClass('has-error');

                    return false;
                }

                else return true;
            },

            success: function (data) {

                $('#progress_parsing').hide('slow');
				$('#parse_nothing_found').hide('slow');
                $("#parseResult").fadeIn(500);

                //Machulyanskiy: обрабокта результата валидации URL и Rule OP с сервера
                if(data['status'] == 'not_ok')
                {
                    if(data["message"] == 'Wrong URL!')
                    {
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
                        html += "<tr> <td>" + (index + 1) + "</td>" +
                        "<td>" + data[index]['info'] + "</td>" +
                        "<td> <i class='fa fa-edit text-muted cursor ' onclick='element_OP_edit(this)'> </i> </td>" +
                        "<td> <i class='fa fa-remove text-muted cursor ' onclick='element_OP_delete(this)'> </i> </td> </tr>"
                    }
                    html += "</tbody>" +
                    "</table><hr>";

                    $('#table_parsing_result').html(html);
                    $('#button_abort_OP').show('slow');
                }
            },
            error: function (data) {
                //console.log('retard',data[status]);
                $('#progress_parsing').hide('slow');
				$('#parse_nothing_found').show('slow');
            }
        });
        return false;
    });

    //Machulyanskiy: Зберігаємо екземляри товару
    $("#parserSave").click(function() {
        $('#Form_error').hide();

        //логика отображения рядка, где находятся сохраненные элементы
        if($('tr.success:not(.already)').length > 0)
        {
            $('tbody tr.success:not(.already)').hide();

            if(!($('.table_parse_Result tbody').children(0).hasClass('already')))
            {
                var html = "<tr class='success already'> <td class='round-icon'><i class='fa fa-plus-circle text-muted cursor bootstrap_success_color' onclick='view_elements()'> </i></td>" +
                    "<td> </td>" +
                    "<td> </td>" +
                    "<td> </td> </tr>";

                $('.table_parse_Result tbody tr:first').before(html);
            }
        }

        $.ajax({
            url: '/dashboard/save_items_of_product',
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

            success: function (data) {
                    $('tr[class=warning]').addClass('success');
                    $('.warning, .success').find('.fa-remove').remove();
                    $('.warning, .success').removeClass('warning');
                    $("#parserForm").hide('slow');
                    $("#parserForm input:not(.btn)").val('');
                    $("#button_view_OP").show('slow');

            },

            error: function () {
                alert('retard');
            }
        });
    });
});

//Machulyanskiy: просмотр созданого ОП
function continue_view()
{
    view_op();

    if($('.parser_id:contains('+idParser+')'))
    {
            //console.log($('#get_elements_OP')[0], typeof($('#get_elements_OP')[0]));
            //var find = $('#get_elements_OP')[0];
            $('#get_elements_OP')[0].click();
            //console.log( document.querySelector('#get_elements_OP'), document.querySelector('#get_elements_OP')[0]);


            //get_elements_OP(find);
    }
}

//Machulyanskiy: отмена парсинга
function abort_parse()
{
    $("#parseResult").hide('slow');
    $('#button_abort_OP').hide('slow');
    $('#button_view_OP').hide('slow');
    $('#table_parsing_result').children().remove();
    $(".add_op input:not(.btn)").val('');
}

//Machulyanskiy: Відображення списку ОП
function view_op()
{
    $(".add_op").hide('slow');
    $('#button_abort_OP').hide('slow');
    $('#button_view_OP').hide('slow');
    $(".view_op").show('slow');
    $('#table_parsing_result').children().remove();

    $(".add_op input:not(.btn)").val('');

    $.ajax({
        url: '/dashboard/get_OP',
        dataType: 'json',
        success: function (data) {

			if(data != false)
			{
			$('#empty_OP').hide();
            var html = '<form class="form-inline form-add">' +
            '<div class="form-group">' +
            '<div class="input-group">' +
            '<div class="form-control bg_eee " style="width: 39px;">ID</div>' +
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
            '<div class="form-control bg_eee"><i class="fa fa-repeat text-muted"></i></div>' +
            '<div class="input-group-addon"></div>' +
            '<div class="form-control bg_eee"><i class="fa fa-remove text-muted "></i></div>' +
            '</div></div></form>';

                for (index = 0; index < data.length; ++index) {
                    idParser = data[index]["idParser"];
                    html += '<form class="form-inline form-add">' +
                    '<div class="form-group form_group_OP">' +
                    '<div class="input-group element_OP">' +
                    '<div class="form-control parser_id" style="width: 39px;">' + data[index]["idParser"] + '</div>' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="adressParser" value='+ data[index]["adressParser"] + '>' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="rurlesParser" value="'+ data[index]["rurlesParser"] + '">' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="nameProduct" value='+ data[index]["nameProduct"] + '>' +
                    '<div class="input-group-addon"></div>' +
                    '<input type="text" class="form-control" id="categoryProduct" value='+ data[index]["categoryProduct"] + '>' +
                    '<div class="input-group-addon"></div>' +
                    '<div class="form-control "><i class="fa fa-list-ul text-muted cursor" id="get_elements_OP" onclick="get_elements_OP(this)"></i></div>' +
                    '<div class="input-group-addon"></div>' +
                    '<div class="form-control "><i class="fa fa-repeat text-muted cursor" onclick="OP_repeat(this)"></i></div>' +
                    '<div class="input-group-addon"></div>' +
                    '<div class="form-control "><i class="fa fa-remove text-muted cursor" onclick="OP_delete(this)"></i></div>' +
                    '</div></div></form>';
                }
            $('#list_OP').html(html);
			
			}
			else $('#empty_OP').show('slow');
			$('#empty_OP').html('<div class="alert alert-warning"> <strong>' + 'List of OP is empty !' + '</strong> </div>');
        },
        error: function () {
            console.log('retard');
            
        }

    });
}

//Machulyanskiy: вивод продуктов даного ОП
function get_elements_OP(op)
{
    //console.log(document.querySelector('#get_elements_OP') === op);

    //удаление таблицы при повторном клике на иконку
    if($(op).parents('.form_group_OP').children(1).hasClass('bg_eee'))
    {
        $(op).parents('.form_group_OP').find('#table_OP').remove();
        return;
    }

    //узнаем айди ОП в форме
    var id = $(op).parents('.element_OP').children(0).html();

    $.ajax({
        type: "POST",
        url: '/dashboard/get_elements_OP',
        data: {id : id},
        dataType: 'json',

        success:function(data){
            console.log(data);
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
                html += "<tr> <td class='not_this'>" + data[index]['idItem'] + "</td>" +
                "<td>" + data[index]['nameItem'] + "</td>" +
                "<td>" + data[index]['priceItem'] + "</td>" +
                "<td>" + data[index]['countItem'] + "</td>" +
                "<td>" + data[index]['typeItem'] + "</td>" +
                "<td>" + data[index]['sellerItem'] + "</td>" +
                "<td class='not_this'> <i class='fa fa-edit text-muted cursor ' onclick='item_OP_edit(this)'> </i> </td>" +
                "<td class='not_this'> <i class='fa fa-remove text-muted cursor ' onclick='item_OP_delete(this)'> </i> </td> </tr>"
            }
            html += "</tbody>" +
            "</table>";
            $(op).parents('.element_OP').after(html);

            $('#table_OP').addClass('bg_eee');
        },

        error: function () {
            console.log('retard');
        }
    });
}

//Machulyanskiy: розпарсить уже существующий ОП
function OP_repeat(op)
{
    var adress = $(op).parents('.element_OP').find('#adressParser').val();
    var rule = $(op).parents('.element_OP').find('#rurlesParser').val();
    var product = $(op).parents('.element_OP').find('#nameProduct').val();
    var category = $(op).parents('.element_OP').find('#categoryProduct').val();

    $('#parserURL').val(adress);
    $('#parserRule').val(rule);
    $('#parserProductType').val(product);
    $('#parserCategory').val(category);

    $(".view_op").hide('slow');
    $(".add_op").show('slow');
}

//Machulyanskiy: Видалення ОП
function OP_delete(op)
{
    //узнаем айди ОП в форме
    var id = $(op).parents('.element_OP').children(0).html();

    $.ajax({
        type: "POST",
        async: true,
        url: '/dashboard/delete_OP',
        data: {id : id},
        success:function(data){
            $(op).parents('form').remove();
        },
        error: function () {
            console.log('retard');
        }
    });

}

//Machulyanskiy: Беремо на редагування елемент ОП
function element_OP_edit(op)
{
    $("#parserForm").show('slow')
    $(op).parents('.table_parse_Result').find('tr.warning').removeClass('warning');
    $(op).parents('tr').addClass('warning');
}

//Machulyanskiy: Видаляємо елемент ОП
function element_OP_delete(op)
{
    $(op).parents('tr').hide('slow').remove();
}

//Machulyanskiy: Беремо на редагування продукт ОП
function item_OP_edit(op)
{
    $(op).parents('tr').removeClass('success');


    //переходим в режим редактирования таблицы
    if ($(op).hasClass('fa-edit'))
    {
        $(op).parents('tr').addClass('warning');
        $(op).removeClass('fa-edit');
        $(op).addClass('fa-check-square-o');

        var tr = $(op).parents('tr');
        var td = tr.find('td:not(.not_this)'); //все поля помимо иконок и айди

            td.mousedown(function (event) {
                if($(op).hasClass('fa-check-square-o')) {

                    if ($(this).hasClass('on_edit')) return; //если поле уже на редактировании - возвращаемся

                    if ($(this).parent().find('.on_edit')) {
                        var save = $(this).parent().find('.on_edit');
                        var val = save.children().val();
                        save.children().remove();
                        save.removeClass('on_edit');
                        save.text(val);
                    }

                    $(this).addClass('on_edit');    //берем поле на редактирование

                    //вместо поля таблицы создаем инпут с его данными
                    var html = '<input class="form-control" type="text" value="' + $(this).text() + '" style=" width:' + $(this).width() + 'px !important;">';
                    $(this).html(html);
                }
            });

    }
    //сохраняем измененные данные
    else if($(op).hasClass('fa-check-square-o'))
    {
        $(op).removeClass('fa-check-square-o');
        $(op).addClass('fa-edit');
        $(op).parents('tr').removeClass('warning');
        var save = $(op).parents('tr').find('.on_edit'); //находим поле,которое на редактировании
        var val = save.children().val();                //берем данные с инпута
        save.children().remove();                      //удаляем инпут
        save.removeClass('on_edit');                  //убираем поля с редактирования
        save.text(val);                              //заносим данные просто в поле таблицы

        $.ajax({
            type: "POST",
            url: '/dashboard/update_items_OP',
            data:
            {
                id : $(op).parents('tr').find('td:eq(0)').text(),
                name : $(op).parents('tr').find('td:eq(1)').text(),
                price: $(op).parents('tr').find('td:eq(2)').text(),
                count: $(op).parents('tr').find('td:eq(3)').text(),
                type: $(op).parents('tr').find('td:eq(4)').text(),
                seller: $(op).parents('tr').find('td:eq(5)').text()
            },
            dataType: 'json',
            success:function(data){
                //console.log(data['status'], data["message"]);
                if(data['status'] == 'not_ok')
                {
                    $('#for_error').html('<div class="alert alert-danger"><strong>' + data["message"] + '</strong> </div>');
                }
                else
                {
                    $(op).parents('tr').addClass('success');

                    return;

                }
            },
            error: function () {
                console.log('retard');
            }
        });
    }
}

function item_OP_delete(op)
{
    var id = $(op).parents('tr').find('td:eq(0)').text();

    $.ajax({
        type: "POST",
        async: true,
        url: '/dashboard/item_OP_delete',
        data: {id : id},
        success:function(data){
            if(data['status'] == 'not_ok')
            {
                $('#for_error').html('<div class="alert alert-danger"><strong>' + data["message"] + '</strong> </div>');
            }
            else $(op).parents('tr').remove();
        },
        error: function () {
            console.log('retard');
        }
    });

}

function view_elements()
{
    //разворачиваем список сохраненных элементов
    if($('tbody tr.success:not(.already)').is(":hidden"))
    {
        $('.already i').addClass('fa-minus-circle');
        $('.already i').removeClass('fa-plus-circle');
        $('tbody tr.success:not(.already)').show('slow');
    }
    //сворачиваем список
    else if($('tbody tr.success:not(.already)').is(":visible"))
    {
        $('.already i').addClass('fa-plus-circle');
        $('.already i').removeClass('fa-minus-circle');
        $('tbody tr.success:not(.already)').hide('slow');
    }
}