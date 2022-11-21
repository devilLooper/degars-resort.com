<?php
include 'connection/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Payment</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.container {
    width: 30%;
    margin: 0 auto;
    margin-top: 2%;
}

.container h1 {
    text-align: center;
    font-size: 52px;
}

.container p {
    text-align: center;
}

.card {
    background: #fff;
    border: 1px solid rgba(128, 128, 128, 0.3);
    padding: 4rem 3rem;
    border-radius: 5px;
    margin-top: 1rem;
    box-shadow: 0 3px 10px rgb(0  0  0 / 0.2);
}

label {
    display: block;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: center;
}

input {
    border: 1px solid #333;
    border-radius: 5px;
    color: #333;
    font-size: 32px;
    width: 100%;
    margin: 0 0 20px;
    padding: .5rem 1rem;
    text-align: center;
}

button {
    width: 100%;
    background: rgb(230, 163, 20);
    border-radius: 5px;
    color: #333;
    font-size: 26px;
    padding: 0.6rem;
    outline: none;
    border: none;
    text-transform: uppercase;
    letter-spacing: 0.2rem;
    transition: all .4s ease-in;
}

button:hover {
    background: rgb(31, 197, 9);
    color: #fff;
    cursor: pointer;
}
</style>
<body>
    <div class="container">
        <div class="card">
            <?php 
                $sql = "SELECT rate FROM e_reservation";
                $result = $db -> query($sql);
                $row = $result -> fetch_assoc();
                $var2 = ".00";
            ?>
            <form action="process.php" method="POST">
                <label>Enter Amount</label>
                <input type="text" name="amount" id="currency" data-type="currency" 
                value="<?php echo $row['rate'] . $var2;?>">
                <button type="submit">Pay Now</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="index.js"></script>
</body>
</html>