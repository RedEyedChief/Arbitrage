$(document).ready(function(){
    $('form[name=poll]').submit(function(){
        poll.vote($('form[name=poll]').attr('num'))
        return false;
        })
    
    $('.add-row').click(function(){
        poll.form.addRow($(this))
        return false;
        })
})

var poll = {
    vote: function(id)
    {
        $.post('/content/votePoll', "id="+id+"&"+$('form[name=poll]').serialize(),function(data){
            var panel = $('.panel-poll')
            panel.attr("class","")
            panel.html(data)
        })
    },
    form: {
        addRow: function(e)
        {
            console.log(e);
            $('<div class="form-group text-vote"><input type="text" class="form-control input-sm" name="textPollVote[]" placeholder="Variant" required></div>').insertAfter(e.parent().parent().find(".text-vote:last"))
            return false
        }
    }
}
