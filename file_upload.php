<?php
$error=[];
if(isset($_REQUEST['upload'])){
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
}
if(isset($_FILES['file'])){
    $filename=$_FILES['file']['name'];
    $filetype=$_FILES['file']['type'];
    $filesize=$_FILES['file']['size']/(1024*1024);
    $tmp_name=$_FILES['file']['tmp_name'];

    $image=['image/jpeg','image/jpg','image/png'];
    if(!in_array($filetype,$image)){
        $error['file']="Only jpg,jpeg,png files are allowed";
    }
    elseif($filesize>2){
        $error['file']="File size should not be more than 2MB";
    }
    else{
       
        $extension = pathinfo($filename,PATHINFO_EXTENSION);
        $newfilename=date('ymdhis').".".$extension;
        if (move_uploaded_file($tmp_name,   $newfilename)) {
            echo "File uploaded successfully!";
        } else {
            $error['file'] = "There was an error uploading your file.";
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
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept=".jpg,.jpeg,.png">
    <?php echo isset($error['file'])&& !empty($error['file'])?$error['file']:'' ?>
    <button type="submit" name="upload" value="upload">upload</button>
    </form>
</body>
</html>