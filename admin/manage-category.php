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

if (isset($_POST['update_category'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $orig_image = $_POST['orig_image'];


    if(isset($_FILES["image"])){
        $image  = $_FILES['image']['name'];
        $target_dir = "../images/category/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) ;
    } else {
        $image = $orig_image;
    }

    $sql = "UPDATE category SET category_name = '$name', category_image = '$image' WHERE  category_id = '$id'";
    mysqli_query($con, $sql);

    header("Location: manage-category.php");




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

                <a href="manage-orders.php" class="list-group-item list-group-item-action">
                    Manage Orders
                </a>

                <a href="manage-category.php" class="list-group-item list-group-item-action active">
                    Manage Category
                </a>
            </div>
        </div>


        <div class="col-md-9 col-lg-10">
            <h3>Category</h3>


            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                    <th>Category Image</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php

                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0){
                        while($product = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><img src="<?= WEBSITE_DOMAIN . '/images/category/'. $product['category_image']?>" class="img-thumbnail w-50"> </td>
                                <td><?php echo $product['category_id']?></td>
                                <td><?php echo $product['category_name']?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $product['category_id']?>">Edit</button>
                                        <a type="button" href="delete-category.php?id=<?php echo $product['category_id']?>" class="btn btn-danger">Delete</a>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit<?php echo $product['category_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="manage-category.php" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?php echo $product['category_id']?>">

                                                        <div class="mb-3">
                                                            <label>Enter Category Name</label>
                                                            <input type="text" name="name" value="<?php echo $product['category_name']?>" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Enter Image</label>
                                                            <input type="hidden" name="orig_image" value="<?php echo $product['category_image']?>">
                                                            <input type="file" name="image" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <button type="submit" name="update_category" class="btn btn-primary">Save changes</button>
                                                        </div>

                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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



<script>
    const dataTable = new simpleDatatables.DataTable("#myTable", {
    })

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>