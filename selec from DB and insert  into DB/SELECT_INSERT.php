<?php include 'connexion.php';
$result = mysqli_query($con, "SELECT prenom FROM TABLE_NAME ORDER BY prenom ASC");
if (isset($_POST['nom']) && isset($_POST['prenom'])) {
	

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    
    $nom = validate($_POST['nom']);
	$prenom = validate($_POST['prenom']);
if (empty($anneeScolaire) || empty($nom)) {
    header("Location: SELECT_INSERT.php");
}else {
    $sql = "INSERT INTO TABLE_NAME(nom, prenom) VALUES('$nom', '$prenom')";
    $res = mysqli_query($con, $sql);

    if ($res) {
        echo "Your message was sent successfully!";
    }else {
        echo "Your message could not be sent!";
    }
}
}else {
}



?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 450px;
    }
    .imgGallery img {
      padding: 8px;
      max-width: 100px;
    }    
  </style>
</head>
<body>
  <div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="mb-3">
      <h3 class="text-center mb-5">select prenom from database table and insert nom and prenom to another database table</h3>

      <div class="user-image mb-3 text-center">
        <div class="imgGallery"> 
          <!-- Image preview -->
        </div>
        <div class="form" method="post"> 
    <label for="">nom </label>
    <input type="text" name="nom"><br>
  <label>prenom</label>
  <select id="prenom" name="prenom" >
    <option value="">Select</option>
    <?php 
    foreach($result as $row){
        echo '<option value=" '.$row["prenom"].'"> '.$row["prenom"].'</option>';
    }
  ?>
  </select>
    </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
         submit
      </button>
    </form>
  </div>
</body>
</html>