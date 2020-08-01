<?php
require_once "../utils.php";
check_session('customers');
$title='Customer\'s Dashboard';
$content=<<<_END
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
                Water available in your area: 1000<br>
                Price per tanker: Rs. 1000<br><br>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="date">Date of Dilivery:</label>
                        <input id="date" class="form-control" type="date" name="date" required min="2020-08-01">
                    </div>
                    <div class="form-group">
                        <label for="volume">Quantity of Water :</label>
                    </div>
                    <div class="form-check">
                        <input id="i1" class="form-check-input" type="radio" name="quantity" value="1">
                        <label for="i1" class="form-check-label">1 kL</label>
                    </div>
                    <div class="form-check">
                        <input id="i2" class="form-check-input" type="radio" name="quantity" value="2">
                        <label for="i2" class="form-check-label">2 kL</label>
                    </div>
                    <div class="form-check">
                        <input id="i3" class="form-check-input" type="radio" name="quantity" value="3">
                        <label for="i3" class="form-check-label">3 kL</label>
                    </div>
                    <div class="form-check">
                        <input id="i4" class="form-check-input" type="radio" name="quantity" value="4">
                        <label for="i4" class="form-check-label">4 kL</label>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="price">Price : Rs. <span class="text-primary text-lg">1000</span> </label>
                    </div>
                    <div class="text-center"><input type="submit" value="Pay" class="btn btn-success"></div>
                </form>
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