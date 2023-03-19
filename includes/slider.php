<?php
    include ("configuration.php");
    include ("libraries/db.php");
    $result = dbSelect("tbl_slideshow", "*", "active='1'", "order by ordernum asc");
    $num = mysqli_num_rows($result);
?>
<div class="col-lg-8">
    <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
                for($i=0; $i<$num; $i++)
                {

            ?>
                <li data-target="#header-carousel" data-slide-to="<?=$i?>" class="<?=(($i==0)?"active":"") ?>"></li>
            <?php
                }
            ?>
        </ol>
        
        <div class="carousel-inner">
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($result))
                {
            ?>
            <div class="carousel-item position-relative <?=(($i==0)?"active":"") ?>" style="height: 430px;">
                <img class="position-absolute w-100 h-100" src="img/slideshow/<?=$row['img']?>" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?=$row['title']?></h1>
                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn"><?=$row['text']?></p>
                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="<?=$row['title']?>">Shop Now</a>
                    </div>
                </div>
            </div>
        
            <?php
                $i++;
                }
            ?>
        </div>
    </div>
</div>