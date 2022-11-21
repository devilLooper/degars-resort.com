<?php 
session_start();
$_SESSION['firstName']

?>
<!doctype html>
<html lang="en">

<head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Transaction Complete</title>
</head>
<body>
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="text-success display-5 fw-bold">Payment Success</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Payment transactions uder review you may check you status later on admin's approval.
                Thank You!</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Home</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">  
    function preventBack() {window.history.forward();}  setTimeout("preventBack()", 0);  window.onunload = function () {null};
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>