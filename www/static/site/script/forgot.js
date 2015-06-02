var login = {
        reset_pass: function(data){
            console.dir(data);
            $.post('/login/reset_password',data, function(response){
                alert(response);
                if (response == ''){
                    window.location = '/';
                } else {
                    $("#reset_errors").empty().append(response).parent().show();
                }
            }, 'json');
        }
};

$( document ).ready(function(){
    $("#reset").find("form").on("submit", function(e){
        e.preventDefault();
        login.reset_pass($("#reset").find("form").serializeArray());
    });
});