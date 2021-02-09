<?php
$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["arquivo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<script language='JavaScript'>
            alert('Arquivo já existente!!'); 
            javascript:window.location='usuarios.php';
        </script>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["arquivo"]["size"] > 500000) {
    echo "<script language='JavaScript'>
            alert('Arquivo muito grande!!'); 
            javascript:window.location='usuarios.php';
        </script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif"  && $imageFileType != "pdf" ) {
    echo "<script language='JavaScript'>
            alert('Aceita-se somente JPG, PNG, JPEG, GIF, PDF!!'); 
            javascript:window.location='usuarios=.php';
        </script>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script language='JavaScript'>
            alert('Não foi possível carregar o arquivo!!'); 
            javascript:window.location='usuarios.php';
        </script>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)) {
    echo "<script language='JavaScript'>
            alert('Arquivo carregado com sucesso!!'); 
            javascript:window.location='usuarios.php';
        </script>";
  } else {
    echo "<script language='JavaScript'>
            alert('Não foi possível carregar o arquivo!!'); 
            javascript:window.location='usuarios.php';
        </script>";
  }
}
?>