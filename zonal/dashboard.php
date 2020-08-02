<?php
require_once "../utils.php";
check_session('zonal');

$title='Zonal Office\'s Dashboard';
$mindate=date('Y-m-d',time()+86400);
$maxdate=date('Y-m-d',time()+86400*3);

$stmt=$conn->query('SELECT * FROM zonal WHERE id='.$_SESSION['id']);
$r=$stmt->fetch(PDO::FETCH_ASSOC);

$cooldown=false;

$stmt=execSQL('SELECT * FROM orders WHERE zone=? AND date=?',array($_SESSION['id'],CURDATE()));
// $stmt2=execSQL('SELECT id FROM waterproviders WHERE state=? AND city=? AND zone=? AND ward=? ORDER BY RAND() LIMIT 1',array($r['state'],$r['city'],$r['zone'],$r['ward']));

if($stmt->rowCount()>0)
{
    $cooldown=true;
    $s=$stmt->fetch(PDO::FETCH_ASSOC);
    // Display all results from the query
}
else
{
   // display that no orders are there today
    
}





$msg='';
if(isset($_SESSION['msg']))
{
    $msg= $_SESSION['msg'].'<br>';
    unset($_SESSION['msg']);
}
$content=<<<_END
{$msg}
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
            </div>
            <div class="card-body">
                <p>Welcome! We are here to provide you water in the hour of need. The main idea of this system is to be able to utilise rainwater to its maximum and make it available to the people directly through our portal. We take pride in the fact that this scheme could be a life saver if implemented properly in the cities its needed the most. All we do is this, -Join hands with the institutions willing to contribute and provide them subsidy to setup the rainwater harvesting unit. - Make use of this harvested water to provide it to the people on demand. Make sure to join hands with us! That is, if you want your city to sustain.</p>
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