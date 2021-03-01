<?php 
	
	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST)) {
		
		// keep track post values
		$name = $_POST['name'];
		// update data
		// if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set name = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$id));
			Database::disconnect();
			header("Location: index.php");
	// 	}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $data['name'];
		Database::disconnect();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">    
		<div class="span10 offset1">
			<div class="row">
				<h3>Update a Customer</h3>
			</div>

			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
			  <div class="control-group">
			    <label class="control-label">Name</label>
			    <div class="controls">
			      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">					      	
			    </div>
			  </div>					  
			  <div class="form-actions">
				  <button type="submit" class="btn btn-success">Update</button>
				  <a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>				
    </div> <!-- /container -->
  </body>
</html>