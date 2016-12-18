<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<div class="container col-xs-3">
    <h2>Register</h2>
    <form action="../controller/registerController.php" method="post">
        <!-- Username -->
        <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Re-Enter Password -->
        <div class="form-group">
            <label for="re_enter_psswd" class="col-form-label">Re-Enter Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" name="re_enter_psswd" id="re_enter_psswd"
                       placeholder="Re-Enter Password"/>
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <div class="input-group">
                <input type="email" class="form-control" name="user_email" id="email" placeholder="Email"/>
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Account Type -->
        <div class="form-group">
            <label class="col-form-label">Account Type</label>
            <fieldset class="form-group">
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="petterRadioButton"
                           value="0"> Petter
                </label>
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="getterRadioButton"
                           value="1"> Getter
                </label>
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="bothRadioButton"
                           value="2"> Both
                </label>
            </fieldset>
        </div>
        <!-- First Name -->
        <div class="form-group">
            <label for="firstName" class="col-form-label">First Name</label>
            <div class="input-group">
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name"/>
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Last Name -->
        <div class="form-group">
            <label for="lastName" class="col-form-label">Last Name</label>
            <div class="input-group">
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name"/>
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Telephone -->
        <div class="form-group">
            <label for="telephone" class="col-form-label">Telephone</label>
            <div class="input-group">
                <input type="tel" class="form-control" name="telephone" id="telephone" placeholder="Telephone"/>
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Home Address -->
        <div class="form-group">
            <label for="address" class="col-form-label">Home Address</label>
            <div class="input-group">
                <input type="text" class="form-control" name="address" id="address" placeholder="Address"/>
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Add Profile Picture -->
        <div class="form-group">
            <label for="imageInput">Profile Picture</label>
            <input type="file" class="form-control-file" id="imageInput">
        </div>
        <!-- Sign-Up Button -->
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
</body>
</html>