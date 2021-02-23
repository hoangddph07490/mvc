<?php
    $titleErr = isset($_GET['titleErr']) ? $_GET['titleErr'] : "";
    $desErr = isset($_GET['desErr']) ? $_GET['desErr'] : "";

?>

<h1>Create task</h1>
<form method="post" action="#">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title">
    </div>
    <div class="text-danger">
        <?php if ($titleErr != "") {
            echo $titleErr;
        } ?>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description">
    </div>
    <div class="text-danger">
        <?php if ($desErr != "") {
            echo $desErr;
        } ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>