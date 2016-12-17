<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>

<div class="container col-xs-3">
    <h2>Login</h2>
    <form method="post" action="../controller/loginController.php">
        <!-- Username -->
        <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <div class="input-group ">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Remember Me -->
        <div class="checkbox">
            <label class="col-form-label"><input type="checkbox"> Remember me</label>
        </div>
        <!-- Sign-In Button -->
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</div>

</body>
</html>

