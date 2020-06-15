<?php get_header() ?>
<?php

if(isset($_POST['submit'])){
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];


  $fileExt= explode('.' , $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array( 'csv', 'xls', 'xlsx' );
  // console_log($fileName);
  // console_log($fileTmpName);
  // console_log($fileSize);
  // console_log($fileError);
  // console_log($fileType);
  print_r($file);
  echo $fileName."<br >";
  echo $fileTmpName."<br >";
  echo $fileSize."<br >";
  echo $fileError."<br >";
  echo $fileType."<br >";
  print_r($allowed);
  echo $fileActualExt."<br >";

  // move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)


  if(in_array($fileActualExt, $allowed)){
    if($fileError=== 0 ){
      if ($fileSize < 7000000) {
        $fileNameNew = uniqid('',true).'.'.$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName,$fileDestination);
        // header("Location:index.php?uploadSucess");
      }
      else {
          echo "Your File is too big";
      }
    }
    else {
      echo "Error uploading File";
    }
  }
  else{
    echo "You cannot upload Files of this type";
  }



}

 ?>

<?php get_footer() ?>
