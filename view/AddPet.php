<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add your Pet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>

<div class="container col-xs-3">
    <h2>Add your Pet</h2>
    <form method="post" action="../controller/AddPetController.php">
        <!--Pet type-->
        <div class="form-group">
            <label for="pet_type" class="col-form-label">Pet type:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="pet_type" id="pet_type" placeholder="Enter type of pet">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!-- Pet breed-->
        <div class="form-group">
            <label for="pet_breed" class="col-form-label">Pet breed:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="pet_breed" id="pet_breed"
                       placeholder="Enter breed of the pet">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!--Pets current age-->
        <div class="form-group">
            <label for="pet_age" class="col-form-label">Pets current age:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="pet_age" id="pet_age"
                       placeholder="Enter pets current age">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!--Advert type-->
        <div class="form-group">
            <label class="col-form-label">Advert Type</label>
            <fieldset class="form-group">
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="advert_type" id="optionradios1" value="0">For
                    Sale
                </label>
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="advert_type" id="optionradios2" value="1">For
                    Adoption
                </label>
            </fieldset>
        </div>
        <!--text area-->
        <div class="form-group">
            <label for="textarea">Full advert details</label>
            <textarea class="form-control" name="advert_details" id="textarea" rows="4"></textarea>
        </div>
        <!-- Add Pet Picture -->
        <div class="form-group">
            <label for="imageInput">Pet Picture</label>
            <input type="file" class="form-control-file" id="imageInput">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>



