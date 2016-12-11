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
    <!--get gia na fainontai se olous ta stoixeia tou pet-->
    <form method="get">
        <!--Pet type-->
        <div class="form-group">
            <label for="pettype" class="col-form-label">Pet type:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="pettype" id="pettype" placeholder="Enter type of pet">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!-- Pet breed-->
        <div class="form-group">
            <label for="petbreed" class="col-form-label">Pet breed:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="petbreed" id="petbreed" placeholder="Enter breed of the pet">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!--Pets current age-->
        <div class="form-group">
            <label for="currentage" class="col-form-label">Pets current age:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="currentage" id="currentage" placeholder="Enter pets current age">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!--Advert type-->
        <div class="form-group">
            <legend>Advert type:</legend>
            <div class="form-check">
            <label class="form-check-label">
                 <input class="form-check-input" type="radio" name="optionradios" id="optionradios1" value="for sale"> For Sale
            </label>
            </div>
            <div class="form check">
                <label class="form-check-label">
                 <input class="form-check-input" type="radio" name="optionradios" id="optionradios2" value="for free">For Free
                 </label>
            </div>
        </div>
        <!--text area-->
        <div class="form-group"
            <label for="textarea">Full advert details</label>
            <textarea class="form-control" id="textarea" rows="4"></textarea>
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



