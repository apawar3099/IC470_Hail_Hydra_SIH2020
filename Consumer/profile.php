<?php
require_once "../utils.php";
check_session('customers');
$title='Change Password';
$content=<<<_END
<div class="card shadow mb-4 " style="width: min(700px,90%);margin: auto;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
</div>
_END;
require_once "../templates/dash-temp.php";
?>