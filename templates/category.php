<div class="col-12 ">
    <div class=" lh-1 fs-1 text-center mb-2 p-2">
        <h3 class="text-center">Categories</h3>
    </div>

    <div class="row g-0">
        <div class="splide">
            <div class="splide__track">
                <div class="splide__list">

                    <?php

                    $category = new Category();
                    $cat = $category->fetchAllCategory();

                    foreach ($cat as $c) {

                        ?>

                        <div class="col-sm-2 splide__slide m-2">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/category/<?php echo $c['category_image'] ?>" width="100px" class="float-end">
                                    <h5 class="card-title"><?php echo $c['category_name'] ?></h5>
                                    <a class="btn btn-outline btn-sm" href="category.php?name=<?php echo $c['category_name'] ?>">Show Products</a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>