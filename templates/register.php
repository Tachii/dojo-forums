<?php include ('includes/header.php'); ?>

<form role="form" enctype="multipart/form-data" method="post" action="register.php">
  <div class="form-group">
    <label >Name*</label>
    <input name="name" type="text" class="form-control" placeholder="Enter your name">
  </div>
  <div class="form-group">
    <label >Email Adress*</label>
    <input name="email" type="email" class="form-control" placeholder="Enter your email">
  </div>
  <div class="form-group">
    <label >Choose Username*</label>
    <input name="username" type="text" class="form-control" placeholder="Enter your name">
  </div>
  <div class="form-group">
    <label >Password*</label>
    <input name="password" type="password" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <label >Confirm Password*</label>
    <input name="rpassword" type="password" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Upload Avatar</label>
    <input type="file" name="avatar">
  </div>
  <div class="form-group">
    <label >About Me</label>
    <textarea name="about" class="form-control" rows="6" cols="80" placeholder="Tell us about yourself (Optional)"> </textarea>
  </div>
  <input name="register" type="submit" class="btn btn-default" value="Register">
</form>

<?php include ('includes/footer.php');?>