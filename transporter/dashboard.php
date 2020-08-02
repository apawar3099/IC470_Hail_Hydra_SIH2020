<?php
require_once "../utils.php";
check_session('transporter');
$title='Transporter\'s Dashboard';
$content=<<<_END
<div class="card shadow mb-4 " style="width: min(1000px,90%);margin: auto;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Current Orders</h6>
    </div>
    <div class="card-body row">
        <div class="col-lg-6 mb-4">
            <div class="card bg-primary text-white shadow" style="height:100%;">
                <div class="card-body">
                    Fill At:<br>
                    office, 43rd street,patna.
                    <div class="font-weight-bold">OTP: 12345678</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-white shadow" style="height:100%;">
                <div class="card-body">
                    Deliver To:<br>
                    House,fake address,pune
                    <form method="post" action="">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="number" name="otp" placeholder="OTP" aria-label="OTP" aria-describedby="my-addon">
                            <div class="input-group-append">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-primary text-white shadow" style="height:100%;">
                <div class="card-body">
                    Fill At:<br>
                    office, 43rd street,patna.<br><br>
                    <div class="font-weight-bold">OTP: 12345678</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-white shadow" style="height:100%;">
                <div class="card-body">
                    Deliver To:<br>
                    House,fake address,pune
                    <form method="post" action="">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="number" name="otp" placeholder="OTP" aria-label="OTP" aria-describedby="my-addon">
                            <div class="input-group-append">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
_END;
require_once "../templates/dash-temp.php";
?>
?>