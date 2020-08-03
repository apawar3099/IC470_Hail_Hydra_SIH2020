<script src='https://www.google.com/recaptcha/api/siteverify?secret=6LfHdrkZAAAAAOGHrvpFsT9m4sXRQf1QWf4TGYCJ&response=' async defer></script>
<?php
$title='FeedBack';
$content=<<<_END
<h2 style="text-align:center;">FeedBack</h2>
<form>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="orderNumber">Order Number</label>
    <input type="text" class="form-control" id="orderNumber" placeholder="order number">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Your suggestions/feedback/complaints </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Type your response here..."></textarea>
  </div>
  <div class="g-recaptcha" data-sitekey="your_site_key"></div>
  <br/>
  <button type="button" class="btn btn-primary btn-lg">Submit</button>
</form>
_END;
require_once "templates/template1.php";
?>
