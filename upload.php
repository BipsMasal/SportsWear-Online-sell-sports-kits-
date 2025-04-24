<?php
include 'connect.php';
// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Get the file information
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Get the file extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Allowed file extensions
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    // Check if the file extension is allowed
    if(in_array($fileActualExt, $allowed)) {
        // Check for any errors
        if($fileError === 0) {
            // Check the file size
            if($fileSize < 1000000) {
                // Create a unique file name
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                // Set the destination directory
                $fileDestination = 'uploads/'.$fileNameNew;
                // Move the file to the destination
                move_uploaded_file($fileTmpName, $fileDestination);
                // Save the path of the file
                $path = $fileDestination;

                echo "File uploaded successfully. File path: ".$path;
            } else {
                echo "File size too large.";
            }
        } else {
            echo "There was an error uploading the file.";
        }
    } else {
        echo "Invalid file type.";
    }
    $title = $_POST['title'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO Products(pImage,pTitle,pDescription,pPrice)
    VALUES('/gameology/$path','$title','$desc',$price)";
    $res = mysqli_query($conn, $sql);
    if($res){
        $sql1 = "SET  @num := 0";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="UPDATE Products SET pID = @num := (@num+1)";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="ALTER TABLE `Products` AUTO_INCREMENT = 1;";
						$result1 = (mysqli_query($conn, $sql1));
    }
    header('location:uploadtest.php');
}

?>