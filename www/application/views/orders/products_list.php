<h1>Make order</h1>

<form class="form-horizontal" id="order_form">
    <div class="form-group">
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
        <label for="select_city" class="col-sm-3 control-label">City</label>
        <div class="col-sm-5">
            <select id="select_city" class="form-control"></select>
        </div>
    </div>
    <div class="form-group">
        <label for="select_city" class="col-sm-3 control-label">Market</label>
        <div class="col-sm-5">
            <select id="select_market" class="form-control"></select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-default">Refresh</button>
        </div>
    </div>
</form>

<table class="table table-bordered" id="datatable_products">
</table>