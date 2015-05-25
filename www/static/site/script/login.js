var login = {
    modal: {
        show: function (name) {
            $('#' + name).modal().show();
        },
        login: function(data){
            console.dir(data);

            $.post('/login/signin',data, function(response){
                if (response == ''){
                    window.location = '/';
                } else {
                    $("#login_errors").empty().append(response).parent().show();
                }
            }, 'json');
        },
        register: function(data){
            console.dir(data);

            $.post('/login/register',data, function(response){
                if (response == ''){
                    window.location = '/';
                } else {
                    $("#register_errors").empty().append(response).parent().show();
                }
            }, 'json');
        }
    }
};

$( document ).ready(function(){
    $("#signInModal").find("form").on("submit", function(e){
        e.preventDefault();
        login.modal.login($("#signInModal").find("form").serializeArray());
    });

    $("#signUpModal").find("form").on("submit", function(e){
        e.preventDefault();
        login.modal.register($("#signUpModal").find("form").serializeArray());
    });
});