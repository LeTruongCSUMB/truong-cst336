<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    print_r($file);
    $fileName = $_FILES['file']['name'];
    //fileName = $file['name'] same :D //
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType  = $_FILES['file']['type'];
        
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    
    if(in_array($fileActualExt, $allowed)){
        if($fileError ===0){
            if($fileSize < 5000){
                $fileNameNew = uniqid('',true);// $fileActualExt;
                $fileDestination  = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?uploadsuccess");
            }else{
                echo "file size should be less than 5mb";
            }
        }else{
            echo "Error";
        }
    }else{
        echo "Only image files are allowed";
    }
}

?>
<html>
    <head>
        <title></title>
        <style>
            
        </style>
    </head>
    <body>
        <form action='gallery.php' method='POST' enctype='multipart/form-data'> 
            <input type='file' name='image'>
            <button type='submit' value='submit '>Upload</button>
        </form>
    </body>
</html>

