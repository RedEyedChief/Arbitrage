$(document).ready(function()
{
    $("#doParse").click(function(){
        $("#parseResult").fadeIn(2000);
        });

    $("#parserSave").click(function() {
        $('#Form_result').hide();

        $.ajax({
            url: 'http://arbitrage/dashboard/parsing',
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
                    $('#Form_result').show();

                    if (parserName =="") $('#parserName').parent().addClass('has-error');
                    if (parserPrice =="") $('#parserPrice').parent().addClass('has-error');
                    if (parserSeller =="") $('#parserSeller').parent().addClass('has-error');

                    return false;
                }


                else return true;
            },
            success: function (msg) {

                console.log('success');
            },
            error: function () {
                alert('retard');
            }
        });
        return false;
    });
});