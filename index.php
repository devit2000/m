<?php
    $page = "home.php";
    $slider = true;
    $sidebar = true;
    if(isset($_GET['p']))
    {
        $p = $_GET['p'];
        switch($p)
        {
            case "product": 
                $page = "product.php";
                $slider = false;
                $sidebar = false;
            break;
            case "about": 
                $page = "about.php";
                $slider = false;
                $sidebar = false;
            break;
            case "contact": 
                $page = "contact.php";
                $slider = false;
                $sidebar = false;
            break;

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include "includes/head.php" ?>

<body>
    
    <!-- header -->
    <?php include "includes/header.php" ?>

    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">

            <!-- slide show -->
            <?php if($slider)
                { include "includes/slider.php"; }
            ?>

            <!-- ad -->
            <?php if($sidebar)
                { include "includes/sidebar.php"; }
            ?>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- contant -->
    <?php include $page ?>


    <!-- footer -->
    <?php include "includes/footer.php" ?>


</body>
</html>