<?php
require_once "../utils.php";
check_session('zonal');

$title='Zonal Office\'s Dashboard';
$mindate=date('Y-m-d',time()+86400);
$maxdate=date('Y-m-d',time()+86400*3);

$stmt=$conn->query('SELECT * FROM transporter');
// $r=$stmt->fetch(PDO::FETCH_ASSOC);

$data='';
foreach($stmt as $x)
{
    $data.='<tr>
    <td>'.$x['id'].'</td>
    <td>'.$x['name'].'</td>
    <td>'.$x['email'].'</td>
    <td><a href="http://maps.google.com/maps?q='.$x['lat'].','.$x['lng'].'" target="_blank">Google Maps</a></td>
</tr>';
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
    <div class="col-md-12">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transporter</h6>
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>location Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        {$data}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
_END;
require_once "../templates/dash-temp.php";
?>