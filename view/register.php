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
<?php include 'header.php'?>

<div class="container col-xs-3">
    <h2>Register</h2>
    <form id="registerForm" action="../controller/registerController.php" method="post" enctype="multipart/form-data">
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
            <label for="user_email" class="col-form-label">Email</label>
            <div class="input-group">
                <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email"/>
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
            <label for="image">Profile Picture</label>
            <input type="file" class="form-control-file" name="image" id="image"/>
        </div>
        <!-- Sign-Up Button -->
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>

<script type="text/javascript" src="../lib/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../lib/bootstrap.min.js"></script>
<script type="text/javascript" src="../lib/formValidation.min.js"></script>
<script type="text/javascript" src="../lib/validation.bootstrap.min.js"></script>

<script>$(document).ready(function () {
        $('#registerForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Username field can not be empty'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password field can not be empty'
                        },
                        different: {
                            field: 'username',
                            message: 'The username and password cannot be the same as each other'
                        }
                    }
                },
                re_enter_psswd: {
                    validators: {
                        notEmpty: {
                        message: 'Password field can not be empty'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                user_email: {
                    validators: {
                        notEmpty: {
                            message: 'Password field can not be empty'
                        },
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },
                accountType: {
                    validators: {
                        choice: {
                            min: 1,
                            max: 1,
                            message: 'Please choose 1 account type'
                        }
                    }
                },
                lastName: {
                    validators: {
                        notEmpty: {
                            message: 'Password field can not be empty'
                        }
                    }
                },
                firstName: {
                    validators: {
                        notEmpty: {
                            message: 'Password field can not be empty'
                        }
                    }
                },
                telephone: {
                    validators: {
                        notEmpty: {
                            message: 'Password field can not be empty'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Password field can not be empty'
                        }
                    }
                }
            }
            });
    });</script>
</body>
</html>