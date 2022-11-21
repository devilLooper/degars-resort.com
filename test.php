<?php
    include 'includes/header.php'; 
    include 'connection/conn.php'; 
?>

<title>Github Push Repo</title>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-lg"></div>
        <div class="col-lg-8">
            <div class="form-group">
                <?php
                    $qry = mysqli_query($db, 
                    "SELECT * FROM test");
                    $result = $db->query($qry);
                    
                    if ($result->num_rows > 0) 
                    {
                        while($row = $result->fetch_assoc())
                        {
                            echo $row["date"];   
                        }
                    } 
                    $dateToday = date("Y/m/d");
                    $dueDate = new DateTime($dateToday);
                    $dueDate->add(new DateInterval('P10D'));
                    echo $dueDate->format('Y-m-d') . "\n";
                ?>
            </div>
        </div>
        <div class="col-lg"></div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>