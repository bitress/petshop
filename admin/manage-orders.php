<?php

include_once 'connection.php';

if (isset($_SESSION['isLoggedIn']) && isset($_SESSION['admin'])){

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE users.id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

} else {
    header("Location: index.php");
}

if (isset($_POST['update_order'])){

    $status = $_POST['status'];
    $id = $_POST['checkout_id'];
    $sql = "UPDATE `checkout` SET `status` = '$status' WHERE `checkout_id` = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result){
        header("Location: manage-orders.php");
    }



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin | Rawr PetShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></head>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<body>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Rawr PetShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Welcome admin</h1>
            <p class="lead fw-normal text-white-50 mb-0">Have fun managing!</p>
        </div>
    </div>
</header>

<div class="container pt-4">
    <div class="row">

        <div class="col-lg-2 col-md-3">
            <div class="list-group list-group-borderless">
                <a href="index.php" class="list-group-item list-group-item-action">
                    Manage Products
                </a>

                <a href="manage-customer.php" class="list-group-item list-group-item-action">
                    Manage Customers
                </a>

                <a href="manage-orders.php" class="list-group-item list-group-item-action active">
                    Manage Orders
                </a>

                <a href="manage-category.php" class="list-group-item list-group-item-action">
                    Manage Category
                </a>
            </div>
        </div>


        <div class="col-md-9 col-lg-10">
            <h3>Orders</h3>


            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Datetime</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php

                    $sql = "SELECT checkout.*, products.*, cart.quantity, users.* FROM `checkout` LEFT JOIN cart ON cart.cart_id = checkout.cart_id INNER JOIN products ON products.id = cart.product_id LEFT JOIN users ON users.id = cart.user_id";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0){
                        while($product = mysqli_fetch_assoc($result)){


                            if ($product['status'] === '0'){
                                $status = 'Confirmed';
                            } else if ($product['status'] == '1'){
                                $status = 'Picked up by the Courier';
                            } else if ($product['status'] == '2'){
                                $status = 'Delivered';
                            } else {
                                $status = '';
                            }

                            ?>
                            <tr>
                                <td><?php echo $product['checkout_id']?></td>
                                <td><?php echo $product['firstname']?></td>
                                <td><?php echo $product['product_name']?></td>
                                <td><?php echo $product['datetime']?></td>
                                <td><?php echo $product['quantity'] * $product['product_price']?></td>
                                <td><?php echo $status; ?></td>
                                <td>

                                    <button class="btn btn-outine-info" type="button" data-bs-toggle="modal" data-bs-target="#edit_<?php echo $product['checkout_id']?>"><i class="bi bi-pencil-square"></i></button>

                                </td>
                            </tr>


                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php

$sql = "SELECT checkout.*, products.*, cart.quantity, users.* FROM `checkout` LEFT JOIN cart ON cart.cart_id = checkout.cart_id INNER JOIN products ON products.id = cart.product_id LEFT JOIN users ON users.id = cart.user_id";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0){
    while($product = mysqli_fetch_assoc($result)){


        if ($product['status'] === '0'){
            $status = 'Confirmed';
        } else if ($product['status'] == '1'){
            $status = 'Picked up by the Courier';
        } else if ($product['status'] == '2'){
            $status = 'Delivered';
        } else {
            $status = '';
        }

        ?>
        <!-- Modal -->
        <div class="modal fade" id="edit_<?php echo $product['checkout_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Order Status</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="manage-orders.php">
                            <input type="hidden" name="checkout_id" value="<?php echo $product['checkout_id']?>">
                            <div class="mb-3">
                                <label>Order Status</label>
                                <select name="status" class="form-control">
                                    <option value="0">Confirmed</option>
                                    <option value="1">Picked up by the Courier</option>
                                    <option value="2">Delivered</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <button type="submit" name="update_order" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>


<script>
    const dataTable = new simpleDatatables.DataTable("#myTable", {
    })

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>