$('.confirm-delete').click(function(e) {
    manage.remove()
});

$('#formAdd').submit(function(){
    manage.add(this);
    return false;
    });

$('.remove-icon').click(function(e) {
    manage.id=$(this).attr("element-id")
    manage.source=$(this)
    manage.updateModal()
});

var manage = {
    source: null,
    id: "",
    remove: function()
    {
        $.post('/content/remove'+$("#removeType").html(), {id: this.id},function(data){
            $(".remove-icon[element-id="+manage.id+"]").parent().hide("slow");
            $(".remove-icon[element-id="+manage.id+"]").parent().remove();
        })
        $('#confirm-delete').modal('hide')
        return true;
    },
    
    add: function(form)
    {
        $.post('/login/register/true', $(form).serialize(),function(data){
            $(data).insertBefore($("#listpoll tr:first"));
        })
    },
    
    updateModal: function()
    {
        $("#removeName").html(this.source.parent().find(".itemName").html())
        $("#removeId").html(this.source.parent().find(".itemId").html())
        $("#removeType").html($("#itemType").html())
    }
}
