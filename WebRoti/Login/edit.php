<?php

//koneksi ke database
include_once ("config.php");

//memeriksa form edit kemudian diarahkan ke halaman utama/index setelah berhasil
if(isset($_POST['update'])) 
{
	$id 	= $_POST ['id'];
	$name 	= $_POST ['name'];
	$username 	= $_POST ['username'];
	$email 	= $_POST ['email'];
    $password 	= $_POST ['password'];
    $photo 	= $_POST ['photo'];
	
	//meng-edit data
	$result =  mysqli_query ($db, "UPDATE user SET username='$username',name='$name',email='$email',password='$password',photo='$photo' WHERE id=$id"); 
	
	//mengarahkan ke halaman utama untuk tampilan data
	header ("Location: timeline.php");
}

?>
<?php

//Mengambil Data yg di edit berdasarkan id
$id = $_GET ['id'];

//Membaca dan menampilkan data berdasarkan id
$result =  mysqli_query ($koneksi, "SELECT * FROM user WHERE id");

while ($user_data = mysqli_fetch_array ($result)) 
{
       $id = $user_data ['id']; 
       $name   = $user_data ['name'];
	   $username  = $user_data ['username'];
       $email   = $user_data ['email'];
       $password   = $user_data ['password'];
       $photo   = $user_data ['photo'];

   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
<input type="hidden" name="id" value="<?php echo $_GET ['id'];?>">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="timeline.php">Home</a>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" value="<?php echo $name; ?>"  placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" placeholder="Alamat Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" value="<?php echo $password; ?>" placeholder="Password" />
            </div>

            <div class="form-group">
                <label for="photo">tambahkan Foto</label>
                <input class="form-control" type="file" name="photo"/>
            </div>

            <input type="submit" class="btn btn-success btn-block" name="update" value="Edit" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>

















