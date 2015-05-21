                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="block">
                        <?php if(!isLoggedIn()) : ?>
                        <h3>Login Form</h3>
                            <form role="form" method="post" action="login.php">
                              <div class="form-group">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control" placeholder="Enter Username">
                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password">
                              </div>
                              <button name="do_login" type="submit" class="btn btn-primary">Submit</button> <a class="btn btn-default" href="register.php">Create Account</a>
                            </form>
                        </div>
                    <?php else :?>
                        <form role="form" method="post" action="logout.php">
                              <strong>Welcome, <?php $userInfoArray = getUser();echo ($name = $userInfoArray["name"]); ?>!</strong> 
                              <br/><br/>
                              <button name="do_logout" type="submit" class="btn btn-primary">Logout</button>
                         </form>
                    <?php endif; ?>
                </div>
                <div class="sidebar">
                    <div class="block">
                        <h3>Categories</h3>
                        <div class="list-group">
                            <a href="topics.php" class="list-group-item <?php echo is_active($category->id); ?>" >All Topics</a>
                            <?php foreach (getCategories() as $category) : ?>
                                <a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item <?php echo is_active($category->id);?>" ><?php echo $category->name; ?></a>
                            <?php endforeach ; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->


    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="templates/js/bootstrap.js"></script>
  </body>
</html>

