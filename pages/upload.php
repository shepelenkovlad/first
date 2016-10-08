<?php
if (isset($_REQUEST['sub']))
	{
		$pdo = Tools::Connect('localhost','root','123456','examsh');
		$name = $_SESSION['name'];
		//$fn = $GLOBALS['fn'];
		//$file = fopen($fn, 'rb');
        $fn = $_FILES['image']['name'];
		$img = file_get_contents( $_FILES['image']['tmp_name'] );;
        $dt = date("Y-m-d H:i:s");
        
        $size = filesize($_FILES['image']['tmp_name']);
		  //$img = addslashes($img);
		$ins = 'insert into pictures (username, picturename, dt, size, picture) values (?,?,?,?,?)';
		$res = $pdo->prepare($ins);
		$res->execute(array($name, $fn, $dt, $size, $img));
	}

 ?>
 <form action="index.php?id=1" method="post" enctype="multipart/form-data">
	Choose image to upload:<input type="file" name="image" /><br/>
	<input type="submit" name="sub" value=" SEND "/><br/>
 </form>