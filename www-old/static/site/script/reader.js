$("#newsreaderFooter").click(function(){reader.show(global.newsreaderPosition,10)})

$("#send").click(function(){reader.comment()})

var reader = {
    show: function(begin, number)
    {
        $.post('/content/getNews', {begin: begin, count: number},function(data){
            data = JSON.parse(data);
            var reader = $('#newsreader')
            var template = reader.children(':first').clone()
            data.forEach(function(e){
                template.attr('href','/matherials/article/'+e['idArticle'])
                template.find(".header-article").html(e['headerArticle'])
                template.find(".description-article").html(e['descriptionArticle'])
                $(template.wrap('<div/>').parent().html()).insertAfter($(".article:last"))
                console.log(template)
                });
            global.newsreaderPosition = begin+number
            if (data.length==10) {
                $("#newsreaderFooter").html('<div class="show-more">Show more ...</div>')
            }else{
                $("#newsreaderFooter").html("")
            }
        })
    },
    
    comment: function()
    {
        $.post('/content/addComment',{article: $(".header-article").attr("id"), text: $(".comment-field").val()},function(data){
            data = JSON.parse(data);
            var template = '<div class="comment">'+
                '<span class="comment-username">'+data['user']+' </span>' +
                '<span class="comment-text">'+data['text']+'</span>' +
                '<span class="comment-date pull-right">'+data['date']+'</span>' +
            '</div>'
            $("#comments").append(template);
            $(".comment-field").val("")
        })
    }
}
