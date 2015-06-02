<link href="/static/site/style/styles.css" rel="stylesheet">
<div class="row" style="padding-top:50px">
    <div class="col-md-3"></div>
<div class="col-md-6 admin-panel" >

<div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#personal_info" aria-controls="home" role="tab" data-toggle="tab">Personal Info</a></li>
        <li role="presentation"><a href="#my_orders" aria-controls="profile" role="tab" data-toggle="tab">Orders</a></li>
    </ul>

    <div class="tab-content" >
        <div role="tabpanel" class="tab-pane active" id="personal_info">
            <form id="profile_details" action="/profile/saveUserData" style="padding-bottom:10px" method="POST">
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" name="firstName" class="form-control" id="user_name" placeholder="Name" value="<?=$user_info[0]["firstName"]?>">
                </div>
                <div class="form-group">
                    <label for="user_surname">Surname</label>
                    <input type="text" name="surName" class="form-control" id="user_surname" placeholder="Surname" value=<?=$user_info[0]["surName"]?>>
                </div>
                <div class="form-group">
                    <label for="user_mail">Email address</label>
                    <input type="email" name="email" class="form-control" id="user_mail" placeholder="Enter email" value=<?=$user_info[0]["mail"]?>>
                </div>
                <div class="form-group">
                    <label for="user_telephone">Telephone</label>
                    <input class="form-control" name="telephone" id="user_telephone" placeholder="Enter telephone" value=<?=$user_info[0]["telephone"]?>>
                </div>
                <div class="form-group">
                    <label for="user_telephone">Your price</label>
                    <input readonly class="form-control" name="user_price" id="user_price" placeholder="No price yet"  value=<?=$user_price[0]["namePrice"]?>>
                </div>
                  <div class="form-group">
                    <label for="select_price">Change price</label>
                    
                    <select id="select_price" name="price" class="form-control">
            <?php
            if (!isset($price)){
                print "<option> There is no price available! </option>";
            }
            else{
                foreach ($price as $val){
                    print "<option value='".$val['idPrice']."'>".$val['namePrice']."</option>";
                }
            }
            ?>
            </select>
      
    </div>
    <div class="form-group">
                    <label for="user_telephone">Your area</label>
                    <input  class="form-control" name="area" id="user_area" placeholder="No area yet" value=<?=$areas[0]["areaProfile"] ?> >
                </div>
  
     <div class="form-group">
                    <label for="user_telephone">Your city</label>
                    <input class="form-control" name="city" id="user_city" placeholder="No city yet" value=<?=$areas[0]["cityProfile"] ?> >
                </div>

                <div class="form-group">
                    <label for="user_pass">Password</label>
                    <input type="password" name="password" class="form-control" id="user_pass" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="user_pass2">Password confirmation</label>
                    <input type="password" class="form-control" id="user_pass2" placeholder="Password Confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Discard</button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" name="my_orders" id="my_orders">
            <table <table class="table table-bordered" id="orders">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Show Results</th>
                    </tr>
                </thead>
                <tbody>
                <?php $count = 1;
                    foreach($orders as $order){
                        print "<tr>";
                        print "<td>". $count ."</td>";
                        print "<td>".$order['date']."</td>";
                        $arr=unserialize($order['products']);
                       // print_r( $arr);
                        print "<td>";
                        foreach ($arr as $el)
                        {
                            print $el;
                            print (" ");
                        }
                         print "</td>";
                         print "<td>";
                         $count++; ?>

                        <button id="show_result" name="show_result" class="btn btn-primary" onclick="window.location.href='result/result_ok/<?=$count?> '">Show results</button>
                        <?php
                        print "</td>";
                        print "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
<div class="col-md-3"></div>
</div>