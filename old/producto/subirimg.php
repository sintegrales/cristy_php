<?php
    session_start();
    $_SESSION['id'] = $_GET['id'];
    //echo $_SESSION['id'];
    require("../conexion.php");

    if(isset($_POST['boton'])) {
        $nombre = $_POST['nombre'];
				
		//$album = $_GET['album'];
		$destino = '../../producto';
		// Leemos el tamaño del fichero
		$tamano = $_FILES [ 'imagen' ][ 'size' ];
		$imagen = $_FILES [ 'imagen' ][ 'name' ];
        list($no, $ext) = explode('.', $imagen);
        $nom = '/d'.$_SESSION['id']. "/" . $_SESSION['id'] ."_". $nombre . "." . $ext;
        mkdir($destino.'/d'.$_SESSION['id'], 0777);
        $dir = $destino.'/'.$nom;

        //echo $dir;
		// Comprobamos el tamaño
		if( $tamano < 5000000 ){
			move_uploaded_file ( $_FILES [ 'imagen' ][ 'tmp_name' ], $dir);
		}
		else echo "El tamaño es superior al permitido" ;
		
        $consulta = "SELECT imagenes FROM producto WHERE id_producto = ". $_SESSION['id'];
        $res = mysqli_query($conexion, $consulta) or die('no consulto producto');
        $img = mysqli_fetch_array($res);

        $img1 = json_decode($img[0]);
        //$img1 = unserialize($img[0]);
        array_push($img1, $nom);
        $img2 = json_encode($img1);
        //$img2 = serialize($img1);

        /* echo "<pre>";
        print_r($img1);
        echo "</pre>"; */

        $ins = "UPDATE producto SET imagenes='". $img2 ."' WHERE id_producto = " . $_SESSION['id'];
        mysqli_query($conexion, $ins) or die('no inserto'.$ins);
        echo '<script>alert("la imagen se subio con exito");</script>';

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    
</head>
<body>
    <form action="" method="post"  enctype="multipart/form-data" style="margin-top: 50px;">
        <input type="text" name="nombre" class="form-control" required="required">
        <input type="file" name="imagen" class="form-control" required="required">
        <br>
        <button type="submit" name="boton" class="btn btn-primary" style="width: 100%;">SUBIR</button>
    </form>
    
</body>


</html>