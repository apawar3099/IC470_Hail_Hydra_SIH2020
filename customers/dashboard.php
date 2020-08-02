<?php
require_once "../utils.php";
check_session('customers');

$title='Customer\'s Dashboard';
$mindate=date('Y-m-d',time()+86400);
$maxdate=date('Y-m-d',time()+86400*3);

$stmt=$conn->query('SELECT * FROM customers WHERE id='.$_SESSION['id']);
$r=$stmt->fetch(PDO::FETCH_ASSOC);

$cooldown=false;

$stmt=execSQL('SELECT *,ISNULL(payment_id) as pid FROM orders WHERE customer=? AND date>?',array($_SESSION['id'],date('Y-m-d',time()-86400*7)));
// $stmt2=execSQL('SELECT id FROM waterproviders WHERE state=? AND city=? AND zone=? AND ward=? ORDER BY RAND() LIMIT 1',array($r['state'],$r['city'],$r['zone'],$r['ward']));

if($stmt->rowCount()>0)
{
    $cooldown=true;
    $s=$stmt->fetch(PDO::FETCH_ASSOC);
    if($s['pid']==TRUE)
    {
        $msg='<div class="alert alert-warning">Your last payment attemp was unsuccessful ! <a href="'.$s['url'].'">try again</a></div>';
    }
    $form=<<<_END
        Your last order was on: {$s['date']}<br>
        You can only book water tanker once every 7 days.{$s['payment_id']}
    _END;
}
else
{
    $form=<<<_END
        <form method="post" action="start-payment.php" name="bookwater">
            <div class="form-group">
                <label for="date">Date of Dilivery:</label>
                <input id="date" class="form-control" type="date" name="date" required min="{$mindate}" max="{$maxdate}">
            </div>
            <div class="form-group">
                <label for="volume">Quantity of Water :</label>
            </div>
            <div class="form-check">
                <input id="i1" class="form-check-input" type="radio" name="quantity" value="1">
                <label for="i1" class="form-check-label">1 kL</label>
            </div>
            <div class="form-check">
                <input id="i2" class="form-check-input" type="radio" name="quantity" value="3">
                <label for="i2" class="form-check-label">3 kL</label>
            </div>
            <div class="form-check">
                <input id="i3" class="form-check-input" type="radio" name="quantity" value="6">
                <label for="i3" class="form-check-label">6 kL</label>
            </div>
            <input type="hidden" id="price" name="price" value="0">
            <br><br>
            <div class="form-group">
                <label for="price">Price : Rs. <span class="text-primary text-lg" id="pricespan">0</span> </label>
            </div>
            <div class="text-center"><input type="submit" value="Pay" class="btn btn-success"></div>
            <script>
                transportprice={$transportprice};
                waterprice={$waterprice};
                inp=document.getElementById("price");
                pspan=document.getElementById("pricespan");
                var radios = document.forms["bookwater"].elements["quantity"];
                for(var i = 0, max = radios.length; i < max; i++) {
                    radios[i].onclick = function() {
                        console.log(this.value);
                        inp.value=transportprice+waterprice*this.value;
                        pspan.innerHTML=transportprice+waterprice*this.value;
                    }
                }
            </script>
        </form>
    _END;
}






$msg=msg2();
$content=<<<_END
{$msg}
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas facilis recusandae voluptate aliquid doloribus. Deserunt nobis inventore, animi voluptate placeat odit dolores molestiae, nesciunt voluptates aliquam sequi accusamus nostrum soluta!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae possimus quas sed accusantium ex! Unde eligendi delectus quas alias blanditiis dicta expedita, nulla in hic voluptatibus asperiores veritatis, fugiat nostrum!</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Orders</h6>
            </div>
            <div class="card-body">
                {$form}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History</h6>
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th>Volume</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Transaction Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

_END;
require_once "../templates/dash-temp.php";
?>