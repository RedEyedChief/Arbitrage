$('.confirm-delete').click(function(e) {
    manage.remove($("#objectType").val())
});

$('.remove-icon').click(function(e) {
    manage.id=$(this).attr("element-id")
    manage.source=$(this)
    manage.updateModal()
});

var manage = {
    source: null,
    id: "",
    remove: function(type)
    {
        $.post('/content/remove'+$("#removeType").html(), {id: this.id},function(data){
            $(".remove-icon[element-id="+manage.id+"]").parent().hide("slow");
            $(".remove-icon[element-id="+manage.id+"]").parent().remove();
        })
        $('#confirm-delete').modal('hide')
        return true;
    },
    
    updateModal: function()
    {
        $("#removeName").html(this.source.parent().find(".itemName").html())
        $("#removeId").html(this.source.parent().find(".itemId").html())
        $("#removeType").html($("#itemType").html())
    }
}
