      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> <span id="itemType">Користувачі</span></h3>
	    <hr>
		  
	    <div class="panel-body">
			
			<form class="form-inline form-add" id="formAdd" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputAmount"></label>
			    <div class="input-group">
			      <input style="display:none">
			      <input type="password" style="display:none">
			      <select class="form-control has-tooltip" name="role" data-toggle="tooltip" data-placement="top" title="Роль">
				<option value="1">&#xf007; - Користувач</option>
				<option value="2">&#xf006; - Модератор</option>
				<option value="3">&#xf132; - Адміністратор</option>
				<!--<option value="4">&#xf0A3; - Superadmin</option>-->
			      </select>
			      <div class="input-group-addon"></div>
			      <input type="email" class="form-control" name="mail" id="" placeholder="Емейл" autocomplete="off" required>
			      <div class="input-group-addon"></div>
			      <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" autocomplete="off" required>
			      <div class="input-group-addon"></div>
			      <input type="password" class="form-control" name="password2" id="password2" placeholder="" autocomplete="off" style="display: none;">
			      <div class="input-group-addon" style="display: none;"></div>
			      <input type="text" class="form-control" name="firstname" id="" placeholder="Ім'я" autocomplete="off" required>
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="surname" id="" placeholder="Прізвище" autocomplete="off" required>
			      <div class="input-group-addon"></div>
			      <button type="submit" class="btn btn-success form-control has-tooltip" id="addItem" data-toggle="tooltip" data-placement="top" title="Додати"><span>&#xf055;</span></button>
			    </div>
			  </div>
			  
			</form>
			
			<br>
			<div class="alert alert-danger alert-dismissible fade in" id="errorMessage" role="alert" style="display: none;">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
			  <strong>Помилка!</strong><span class="details"></span>
			</div>
			<hr>
			
			<ul class="pagination">
			  <?php for($i=0;$i<intval($num[0]->num/10)+1;$i++):?>
			  <li><a href="?start=<?=$i*10?>&end=<?=($i+1)*10?>"><?=$i+1?></a></li>
			  <?php endfor; ?>
			</ul>
			
		  <table class="table table-striped">
			<thead>
			  <tr><th style="width: 28px;"></th><th>ID</th><th>Емейл</th><th>Ім'я</th><th>Роль</th><th style="width: 30px;"></th><th style="width: 30px;"></th></tr>
			</thead>
			<tbody id="listpoll">
			  <?php endif;?>
			  <?php if(!empty($users)):?>
				<?php $c=1;foreach ($users as $item):?>
				<?php switch($item->role){
				    case '2':$icon = "fa fa-star-o"; break;
				    case '3':$icon = "fa fa-shield"; break;
				    case '4':$icon = "fa fa-certificate"; break;
				    default: $icon = "";break;
				}
				if($item->isActive==0) $removed = "removedUser"; else $removed = "";
				if($async) $added = "newItem"; else $added = ""?>
					<tr class="item link <?=$removed." ".$added?>" href="/matherials/article/<?=$item->idProfile?>">
						<td class="<?=$icon?>"></td>
						<td class="id-article itemId"><?=$item->idProfile?></td>
						<td class="author-article"><?=$item->mail?></td>
						<td class="itemName"><?=$item->firstName." ".$item->surName?></td>
						<td><?=$item->role?></td>
						
						<td class="edit-icon" element-id="<?=$item->idProfile?>" data-toggle="modal" data-target="#confirm-edit"><?php if($item->role!=4):?><i class="fa fa-edit text-muted"></i><?php endif;?></td>
						<td class="remove-icon" element-id="<?=$item->idProfile?>" data-toggle="modal" data-target="#confirm-delete"><?php if($item->role!=4):?><i class="fa fa-remove text-muted"></i><?php endif;?></td>
						
					</tr>
				<?php $c++;endforeach;?>
				<?php endif;?>
				<?php if(!$async):?>
			</tbody>
		  </table>
	    
	  		
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
     
      
      <script>
	$(".has-tooltip").tooltip()
	
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[1234567890абвгдеёіїІЇґҐжзи'йклмнопрстуфхцчшщьыъэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЫЪЭЮ@.ЯqwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-]*$/.test(value);
	}, "Letters only please");
	
	$('#formAdd').validate({
	validClass: 'has-success',
        rules: {
            password: {
                rangelength: [3,20],
                required: true,
            },
            mail: {
                required: true,
                email: true,
		rangelength: [4,40],
		lettersonly: true
            },
            firstname: {
                minlength: 2,
                required: true,
		lettersonly: true
            },
	    surname: {
                minlength: 2,
                required: true,
		lettersonly: true
            }
        },
        highlight: function (element) {
	  console.log($(element))
            $(element).removeClass('has-success').addClass('has-error');
        },
        success: function (element) {
	  console.log($(element).closest('.form-control'))
            $(element).closest('input').removeClass('has-error').addClass('has-success');
        },
errorPlacement: function(error,element) {
    return true;
  }
    });
	
	
	var CATEGORY = "Users"
      </script>
      
       <?php endif; ?>   