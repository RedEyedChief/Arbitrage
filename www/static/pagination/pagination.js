$(document).ready(function(){
    //$('.link').click(function(){return(PAGE.load($(this).attr("href")));})
    $(document).on( 'click', '.link', function(){return(PAGE.load($(this).attr("href")));});
    
    window.onpopstate = function(event) {
        PAGE.load(location.href)
    };
    })

var PAGE = {
    load: function(url)
    {
        if (!history.pushState) { return true; }
        $(".content").load(url,{ajax: true,contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15"});
        history.pushState({}, "", url);
        return false;
    }
}