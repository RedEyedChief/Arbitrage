<h1>Make order</h1>

<form class="form-horizontal" id="order_form">
    <div class="form-group">
        <h3>Choose starting city</h3>
        <label for="select_area" class="col-sm-3 control-label">Area</label>
        <div class="col-sm-5">
            <select id="select_area" class="form-control">
                <?php
                if (!isset($area)){
                    print "<option> There is no area available! </option>";
                }
                else{
                    foreach ($area as $val){
                        print "<option value='".$val['idArea']."'>".$val['nameArea']."</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="select_city"  class="col-sm-3 control-label">City</label>
        <div class="col-sm-5">
            <select id="select_city" name="select_city" class="form-control"></select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-default">Show products</button>
        </div>
    </div>
</form>

<table class="table table-bordered" id="datatable_products">
</table>

<div class="col-sm-offset-3 col-sm-5">
    <button id="make_order" name="make_order" class="btn btn-default">Order</button>
</div>
