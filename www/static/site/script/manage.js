$('.confirm-delete').click(function(e) {
    manage.remove()
});

$('.remove-icon').click(function(e) {
    manage.id=$(this).attr("element-id")
});

var manage = {
    id: "",
    remove: function()
    {
        $.post('/content/removeArticle', {id: this.id},function(data){
            $(".remove-icon[element-id="+manage.id+"]").parent().hide("slow");
            $(".remove-icon[element-id="+manage.id+"]").parent().remove();
        })
        $('#confirm-delete').modal('hide')
        return true;
    }
}
