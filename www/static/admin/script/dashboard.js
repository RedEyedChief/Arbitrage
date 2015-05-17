$(document).ready(function()
{
    $("#doParse").click(function() {

        console.log('here');

        $('#parser_error').hide();
        $('#parser_data_error').hide();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'http://arbitrage/dashboard/parsing_request',
            data: {
                parserURL: $('#parserURL').val(),
                parserRule: $('#parserRule').val()
            },
            beforeSend: function(){
                console.log('validate');

                var parserURL = $('#parserURL').val();
                var parserRule = $('#parserRule').val();

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
                if (parserURL == "" || parserRule==""){
                    $('#parser_error').show();

                    if (parserURL =="") $('#parserURL').parent().addClass('has-error');
                    if (parserRule =="") $('#parserRule').parent().addClass('has-error');

                    return false;
                }

                else return true;
            },

            success: function (data) {
                $("#parseResult").fadeIn(2000);
                console.log('success', data);

                var html = "<table class='table table-striped parseResult' >" +
                    "<thead>" +
                    "<tr>" + "</th>" +
                    "<th>ID</th>" +
                    "<th>Image</th>" +
                    "<th>Information</th>" +
                    "<th style='width: 30px;'></th>" +
                    "<th style='width: 30px;'></th>" +
                    "</tr>" +
                    "</thead>" +
                    "<tbody>";

                for (index = 0; index < data.length; ++index) {
                    html += "<tr> <td>" + (index+1) + "</td>" +
                    "<td> </td>" +
                    "<td>" + data[index]['info'] + "</td>" +
                    "<td> <i class='fa fa-edit text-muted cursor ' onclick='element_OP_edit(this)'> </i> </td>" +
                    "<td> <i class='fa fa-remove text-muted cursor ' onclick='element_OP_delete(this)'> </i> </td> </tr>"
                }
                html += "</tbody>" +
                "</table>";
                $('#table_parsing_result').html(html);
            },
            error: function (data) {
                console.log('retard',data[status]);
            }
        });
        return false;
    });


    $("#parserSave").click(function() {
        $('#Form_error').hide();

        $.ajax({
            url: 'http://arbitrage/dashboard/element_OP',
            data: {
                parserName: $('#parserName').val(),
                parserPrice: $('#parserPrice').val(),
                parserSeller: $('#parserSeller').val()
            },
            type: 'POST',
            beforeSend: function(){
                console.log('validate');

                var parserName = $('#parserName').val();
                var parserPrice = $('#parserPrice').val();
                var parserSeller = $('#parserSeller').val();

                if (parserName !== "")
                {
                    $('#parserName').parent().removeClass('has-error');
                    $('#parserName').parent().addClass('has-success');
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
                if (parserName == "" || parserPrice=="" || parserSeller==""){
                    $('#Form_error').show();

                    if (parserName =="") $('#parserName').parent().addClass('has-error');
                    if (parserPrice =="") $('#parserPrice').parent().addClass('has-error');
                    if (parserSeller =="") $('#parserSeller').parent().addClass('has-error');

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


function element_OP_edit(op)
{
    $("#parserForm").show();
    $(op).parents('tr').addClass('warning');
}

function element_OP_delete(op)
{
    $(op).parents('tr').remove();
}