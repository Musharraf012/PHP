<?php
if (isset($_REQUEST['submit'])) {

    echo '<pre>';
    print_r($_FILES['file']);
    echo '</pre>';
    $image = ['image/jpg', 'image/jpeg', 'image/png'];
    if(isset($_FILES['file'])){
        foreach($_FILES['file']['name'] as $key=>$value){

            $filename = $_FILES['file']['name'];
            $filetype = $_FILES['file']['type'][$key];
            $tmpname = $_FILES['file']['tmp_name'][$key];
            $filesize = $_FILES['file']['size'][$key];
            
            
        }

   
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" accept=".jpg,.jpeg,.png" multiple>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>