$('.confirm-delete').click(function(e) {
    manage.remove()
});

$('#formEdit').submit(function() {
    $('#confirm-edit').modal('hide')
    editor.save(this)
    return false
});

$('#formAdd').submit(function(){
    manage.add(this);
    return false;
    });

$(document.body).on('click','.remove-icon',function(e) {
    manage.id=$(this).attr("element-id")
    manage.source=$(this)
    manage.updateModal()
});

$(document.body).on('click','.edit-icon',function(e) {
    editor.id=$(this).attr("element-id")
    editor.source=$(this)
    editor.getInfo()
    
});

var manage = {
    source: null,
    id: "",
    remove: function()
    {
        $.post('/content/remove'+$("#itemType").html(), {id: this.id},function(data){
            $(".remove-icon[element-id="+manage.id+"]").parent().removeClass("newItem");
            $(".remove-icon[element-id="+manage.id+"]").parent().addClass("removedUser");
        })
        $('#confirm-delete').modal('hide')
        return true;
    },
    
    add: function(form)
    {
        if($("#itemType").html()=="Users") {
            $.post('/login/register/true', $(form).serialize(),function(data){
                $(data).insertBefore($("#listpoll tr:first"));
            })
        } else {
            $.post('/content/add'+$("#itemType").html(), $(form).serialize(),function(data){
                $(data).insertBefore($("#listpoll tr:first"));
            })
        }    
    },
    
    updateModal: function()
    {
        $("#removeName").html(this.source.parent().find(".itemName").html())
        $("#removeId").html(this.source.parent().find(".itemId").html())
        $("#removeType").html($("#itemType").html())
    }
}

var editor = {
    source: null,
    id: "",
    info: null,
    userTemplate: '<div class="input-group-addon" id="description"></div><input class="form-control" id="data" value="val"></input>',

    getInfo: function()
    {
        userTemplate = this.userTemplate
        $.post('/content/get'+$("#itemType").html()+'Fields', {id: this.id}, function(data){
            data = JSON.parse(data);
            console.log(data[0]);
            data = data[0];
            $("#editorFields").html("")
            for (var key in data) {
                if (data.hasOwnProperty(key)) {
                    var string = '<div><div class="input-group">'+userTemplate+'</div><br></div>'
                    var group = $('<div/>').html(string).contents();
                    
                    var obj = data[key];
                    //alert(key+" "+obj);
                    var replacer = editor.replacers.replace(editor.replacers[$("#itemType").html()],key)
                    group.find("#description").html(replacer.name)
                    if(replacer.attr!='')group.find("#data").attr(replacer.attr,replacer.attr)
                    console.log(group.find("#data").val())
                    group.find("#data").attr('value',obj)
                    group.find("#data").attr('name',key)
                    $("#editorFields").append(group.html());
                }
            }
        })
    },
    
    save: function(form)
    {
        $.post('/content/update'+$("#itemType").html(), $(form).serialize(),function(data){
            $(".remove-icon[element-id="+editor.id+"]").parent().replaceWith($(data));
        })    
    },
    
    replacers: {
        replace: function(replacer,key){
            if (replacer.hasOwnProperty(key))
            {
                return {name:replacer[key][0], attr:replacer[key][1]}
            }
            else
            {
                return {name:"", attr:""}
            }
        },
        
        Users: {
            idProfile: ['ID','readonly'],
            firstName: ['Name',''],
            surName: ['Surname',''],
            lastName: ['Last name',''],
            role: ['Role',''],
            mail: ['Email','']
        },
        
        Products: {
            idProduct: ['ID','readonly'],
            nameProduct: ['Name',''],
            priceProduct: ['Price',''],
            countProduct: ['Count',''],
            categoryProduct: ['Category','']
        },
        
        Prices: {
            idPrice: ['ID','readonly'],
            namePrice: ['Name',''],
            costPrice: ['Cost','']
        },
        
        Cities: {
            idCity: ['ID','readonly'],
            nameCity: ['Name','']
        }
    }
}