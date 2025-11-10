<?php require_once("auth.php"); 
?>
<?php

require_once("config.php");

if(isset($_POST['input'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $text=$_POST['text'];
    $photo=$_POST['photo'];
    $photop=$_POST['photop'];
    // menyiapkan query
    $sql = "INSERT INTO eventm (name, email,text, photo,photop) 
            VALUES (:name, :email, :text, :photo, :photop)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        "name" => $name,
        "email" => $email,
        "text" => $text,
        "photo" => $photo,
        "photop" => $photop
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: timeline.php");
}

?>
<?php $result = mysqli_query($koneksi,"SELECT * FROM eventm");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">
<ul class="nav nav-tabs navbar-right">
  <li class="nav-item">
    <a class="nav-link active" href="#">Event Mahasiswa</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Shitpost</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">
                    <img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                    <p><?php echo $_SESSION["user"]["email"] ?></p>

                    <p><a href="logout.php">Logout</a> | <a href='editR.php<?phpid_Absensi=$result2[id_Absensi]?>'>Edit</a></p>
                </div>
            </div>

            
        </div>


        <div class="col-md-8">

            <form action="" method="post" />
                <div class="form-group" >
                    <textarea class="form-control" name="text" placeholder="Apa yang kamu pikirkan?"></textarea>
                        <button class="btn btn-outline-secondary" type="submit" name="input">Post</button>
                        <input class="form-control-img" type="file" name="photo"/>
                    </div>
                    <input type="hidden" name="name" value="<?php echo  $_SESSION["user"]["name"]; ?>">
                    <input type="hidden" name="email" value="<?php echo  $_SESSION["user"]["email"]; ?>">
                    <input type="hidden" name="photop" value="<?php echo  $_SESSION["user"]["photo"]; ?>">
    
            <div class="card mb-3">
                <div class="card-body">
                <?php while($user_data =mysqli_fetch_array($result)){
?>
                  <h6>  <img class="img img-responsive  rounded-circle mb-3" width="40" src="img/<?php echo $user_data['photop']; ?>" /> <?php echo $user_data['name']; ?></h6>
                    <hr />
                    <h4><?php echo $user_data['text']; ?></h4>
                  <div class="text-center" > <img class="img img-responsive  mb-3" width="450" src="img/<?php echo $user_data['photo']; ?>" /></div>
                  <textarea class="form-control"  value="<?php echo $user_data['text']; ?>" placeholder="jadilah yang pertama komentar" readonly></textarea>
                  <hr />
                  <textarea class="form-control" name="komen" placeholder="Apa yang kamu pikirkan?"></textarea>
                  <button class="btn btn-outline-secondary" type="submit" name="komen">Komentari</button>
                  <hr/>
                  <br>
               <?php }?>
                </div>
                
            </div>
            
        </div>
          </from>
    </div>
</div>

<?php

require_once("config.php");

if(isset($_POST['komen'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $komentar=$_POST['komentar'];
    // menyiapkan query
    $sql = "INSERT INTO komentar (name, email,komentar) 
            VALUES (:name, :email, :komentar)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        "name" => $name,
        "email" => $email,
        "komentar" => $komentar
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: timeline.php");
}

?>
</body>
</html>