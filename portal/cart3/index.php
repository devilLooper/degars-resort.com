<?php 
    $db = mysqli_connect('localhost', 'root', '', 'manorsdb');
    include '../../includes/header.php';
    $pcus_id = $_GET['pcus_id'];
    $pid = $_GET['pid'];
?>
<title>Purchased Products | Add Ons</title>
<nav class="navbar navbar-expand-md fixed-top" style="background-color: #003049;">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">
            <h1 style="color: #ffff ;"><strong>Degars Manor</strong></h1>
        </a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse justify-content-end" id="basicExampleNav">
            <!-- Links -->
            <span class="text-white">Contact Us: </span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-brands fa-facebook-f" style="color: blue;"></i>
                        facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-solid fa-envelope" style="color: red;"></i>
                        Gmail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-brands fa-instagram-square"
                            style="color: orange;"></i> Instagram</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-brands fa-twitter" style="color: blue;"></i>
                        Twitter</a>
                </li>
            </ul>
        </div>
    </div>
</nav><br><br><br><br><br>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">My Purchased Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive-lg" id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                            $add_all = "SELECT SUM(productPrice) AS totalPurchased FROM mypurchased2 
                            WHERE pcus_id = '$pcus_id' AND pid = '$pid'";

                            $sum_result = mysqli_query($db,$add_all);
                            $sum_row = mysqli_fetch_assoc($sum_result);
                            $sum_output = $sum_row['totalPurchased'];
                            
                            ?>
                            <?php
                            $results = mysqli_query($db, "SELECT *
                            FROM `mypurchased2` 
                            WHERE pcus_id = '$pcus_id' AND pid = '$pid'
                            ");
                                                            
                            if (isset($_GET['pcus_id']) && isset($_GET['pid'])) {
                            $pcus_id = $_GET['pcus_id'];
                            $pid = $_GET['pid'];

                            while ($row = $results->fetch_assoc()) { ?>
                            <td style="width:fit-content;"><?php echo $row['productName']; ?></td>
                            <td style="width:fit-content;"><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['productPrice']; ?></td>
                            <td>
                                <a style="border: 0" class="btn btn-outline-danger" ;
                                    href="delete.php?purchased_id=<?php echo $row['purchased_id'];?>&pcus_id=<?php echo $row['pcus_id'];?>&pid=<?php echo $row['pid'];?>"
                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                            
                        }else {
                            echo '<h5 class="alert alert-danger">No purchased yet!</h5>';
                        }
                        
                            ?>
                        <td></td>
                        <td>Total</td>
                        <td><strong><?php echo $sum_output?></strong></td>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-outline-success float-lg-end"
                    href="../package/proceed_to_payment.php?pid=<?php echo $pid;?>&pcus_id=<?php echo $pcus_id;?>">Proceed
                    to Payment</a>
            </div>
        </div>
    </div>
</div>
<div class="container d-grid justify-content-end">
    <div class="row g-2">
        <form action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search product"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-dark" type="submit" name="submit">Search</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning position-relative mx-2" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    My Purchased
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart3" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php 
                        $count_product = mysqli_query($db, "SELECT * FROM mypurchased2 WHERE pcus_id = $pcus_id");
                        $rowcounts = mysqli_num_rows($count_product);
                        echo $rowcounts;
                        ?>

                    </span>
                </button>

            </div>
        </form>

    </div>
</div>
<div class="container-sm my-5">
    <div class="row">
        <div class="col-lg-12">
            <form action="addItem.php?pcus_id = <?php echo $pcus_id; ?>&<?php echo $pid; ?>" method="post">
                <input type="hidden" name="pcus_id" value="<?php echo $pcus_id; ?>">
                <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                <?php 
                if(isset($_POST['submit'])){
                $search = $_POST['search'];

                $sql = "SELECT * FROM `product` WHERE productName LIKE '%$search%'";
                $result = mysqli_query($db,$sql);

                 if ($result) {
                if (mysqli_num_rows($result)>0) {
                    echo'
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-responsive-lg" id="example" class="display nowrap" style="width:100%">
                                    </div>
                                    <thead>
                                    <tr>
                                    <th style="width: 30%;">Product</th>
                                    <th>Price</th>
                                    <th style="width: 30%;">Quantity</th>
                                    <th>Actions</th>
                                    </tr>
                                    </thead>
                                    ';

                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <tbody>
                                    <tr>
                                    <td><input type="text" name="productName" value="'.$row['productName'].'" style="border: 0;" ></td>
                                    <td><input type="text" name="productPrice" value="'.$row['sale_price'].'" style="border: 0;" ></td>
                                    <td><input class="form-control w-75" type="number" name="quantity" id=""></td>
                                    <td><input class="btn btn-primary" type="submit" value="Add item" name="submit"></td>
                                    </tr>                        
                                    </tbody>                        
                                    ';
                                }
                                    
                                } else {
                                echo'<h6 class="alert alert-danger">No results found!</h6>';
                            }
                            }
                        }
                    ?>
                </table>
                <div class="table-responsive-lg">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php 
include '../../includes/footer.php';
?>