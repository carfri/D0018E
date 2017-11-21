<html>
<body>
<div class="container">
      <form class="form-signin" action="register.php" method="POST">
        <h2 class="form-signin-heading">Register new user</h2>

        <!--input form for email-->
        <label for="inputEmail" class="sr-only">Email address:</label>
        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>

        <!--password-->
        <label for="inputPassword" class="sr-only">Password:</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                                    
        <div class="input-group">
        <!--First and second name-->
        <label for="inputName" class="sr-only">First name:</label>
        <input type="text" name="firstname" id="inputName" class="form-control" placeholder="First name" required>
        <label for="inputLastName" class="sr-only">Last name:</label>
        <input type="text" name="lastname" id="inputLastName" class="form-control" placeholder="Last name" required>
	    </div>
        <div class="input-group1">
        <!--shipment info-->
        <label for="inputCity" class="sr-only">City:</label>
        <input type="text" name="city" id="inputCity" class="form-control" placeholder="City" required>
        <label for="inputAddress" class="sr-only">Address:</label>
        <input type="text" name="address" id="inputAddress" class="form-control" placeholder="Address" required>
	    </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
</div>
</body>
</html>