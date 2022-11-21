<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');

if(isset($_POST['submit'])){
    $c = $_POST['content'];

    $sql = "INSERT INTO `sulay` (`content`) VALUES ('$c')";
    $res = mysqli_query($db,$sql);

    if ($res == TRUE) {
        echo 'Inserted';
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <table class="table caption-top">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">First</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <form action="sulay.php" method="post">
        <?php 
        $msg = "THuiodfh";
        ?>
      <td></td>
      <td><input type="submit" name="submit" value="Add"></td>
      </form>
    </tr>






  </tbody>
</table>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>