<?php

function createThumbnail(){
    $sourcefile = imagecreatefromstring(file_get_contents($_FILES["fileName"]["tmp_name"]));
    $newx = 150; $newy = 150;  //new size
    
    $newx = 150; $newy = 150; //new size

    if(imagesx($sourcefile) > imagesy($sourcefile)) {   // landscape orientation
        $newy = round($newx/imagesx($sourcefile) * imagesy($sourcefile));
    }else{   // portrait orientation 
        $newx = round($newy/imagesy($sourcefile) * imagesx($sourcefile));
    }

    $thumb = imagecreatetruecolor($newx,$newy);
    imagecopyresampled($thumb, $sourcefile, 0,0, 0,0, $newx, $newy,     
     imagesx($sourcefile), imagesy($sourcefile)); 
    imagejpeg($thumb,"thumb.jpg"); //creates jpg image file called "thumb.jpg"
    echo "<img src='thumb.jpg'/>";
}


function filterUploadedFile() {
  $allowedTypes = array("text/plain","image/png");
  $allowedExtensions = array("txt", "png");
  $allowedSize = 1000;
  $filterError = "";
  if (!in_array($_FILES["fileName"]["type"],  $allowedTypes ) ) {
        $filterError = "Invalid type. <br>";
   }

  $fileName = $_FILES["fileName"]["name"];
   if (!in_array(substr($fileName,strrpos($fileName,".")+1), $allowedExtensions) ) {
       $filterError = "Invalid extension. <br>"; 
    }
   
   if ($_FILES["fileName"]["size"]  > $allowedSize  ) {
        $filterError .= "File size too big. <br>";
    }
    return $filterError;
}

if (isset($_POST['uploadForm'])) {
    $filterError = filterUploadedFile();
    if (empty($filterError)) {
        /*if ($_FILES["fileName"]["error"] > 0) {
          echo "Error: " . $_FILES["fileName"]["error"] . "<br>";
        }
        else {
          echo "Upload: " . $_FILES["fileName"]["name"] . "<br>";
          echo "Type: " . $_FILES["fileName"]["type"] . "<br>";
          echo "Size: " . ($_FILES["fileName"]["size"] / 1024) . " KB<br>";
          echo "Stored in: " . $_FILES["fileName"]["tmp_name"];*/
          
          include 'dbConn.php';
          $binaryData = file_get_contents($_FILES["fileName"]["tmp_name"]);
          $sql = "INSERT INTO up_files (fileName, fileType, fileData ) " .
                    "  VALUES (:fileName, :fileType, :fileData) ";
          $stm=$dbConn->prepare($sql);
          $stm->execute(array (":fileName"=>$_FILES["fileName"]["name"],
                               ":fileType"=>$_FILES["fileName"]["type"],
                               ":fileData"=>$binaryData));
          echo "<br />File saved into database <br /><br />";
          
            if (file_exists("path/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            }else{
                move_uploaded_file($_FILES["fileName"]["tmp_name"],  "path/" . $_FILES["fileName"]["name"]);       
            }
        //}
    }//end empty($filterError)
} //endIf form submission
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FileUpload Practice</title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data"> 
        Select file: <input type="file" name="fileName" /> <br />
        <input type="submit"  name="uploadForm" value="Upload File" /> 
        </form>
    </body>
</html>