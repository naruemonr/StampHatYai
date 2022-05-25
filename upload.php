<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
    $targetDir = "uploads/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo(basename($_FILES['file']['name']),PATHINFO_EXTENSION);

    // $ext = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
    // $new_image_name = 'img_'.uniqid().".".$fileType;

   // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = $db -> query("INSERT INTO images (file_name,uploaded_on,) VALUES ('".$fileName."', NOW())");
            $result = mysqli_query($dbcon, $sql);

            if($sql){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>