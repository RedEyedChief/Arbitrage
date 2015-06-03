<link href="/static/site/style/styles.css" rel="stylesheet">
<!--<div class="row" style="padding-top:50px"> -->
<section id="order">
        <div class="container">
    <div class="col-md-3"></div>
<div class="col-md-6 admin-panel" >
<form class="form-horizontal" id="order_form">
    <div class="form-group">
        <h3 align='center'>Оберіть стартову точку</h3>
        <h4 align='center'>Переконайтесь, що у вас обрано правильний тариф:</h4>
        <div class="form-group">
            
                <label for="user_price" class="col-sm-3 control-label">Ваш тариф:</label>
                 <div class="col-sm-5">
                <input readonly class="form-control" name="user_price" id="user_price" placeholder="No price yet"  value=<?=$user_price[0]["namePrice"]?>>
            </div>
            
        </div>
        <label for="select_city" class="col-sm-3 control-label">Область</label>
        <div class="col-sm-5">
            <select id="select_city" class="form-control">
                <?php
                if (!isset($city)){
                    print "<option> There is no city available! </option>";
                }
                else{
                    print '<option selected>Оберіть, будь ласка</option>';
                    foreach ($city as $val){
                        print "<option value='".$val['nameCity']."'>".$val['nameCity']."</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="select_market"  class="col-sm-3 control-label">Місто</label>
        <div class="col-sm-5">
            <select id="select_market" name="select_market" class="form-control"></select>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-default">Показати продукти</button>
        </div>
    </div>
</form>

<table class="table table-bordered table-striped" id="datatable_products">
</table>

<div class="col-sm-offset-3 col-sm-5" style="padding-bottom:10px">
    <button id="make_order" name="make_order" class="btn btn-default" >Замовити</button>

</div>
</div>
</div>
</section>
</div>
<div class="col-md-3"></div>
</div>
