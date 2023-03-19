<?php

$table = "tbl_slideshow";
$column = "*";
$criteria = "";
$clause = "";
$result = dbSelect($table, $column, $criteria, $clause);
$num = mysqli_num_rows($result);

?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3"><strong>SlideShow</strong></h1>
        <a href="#" class="btn float-end " style="background-color: #222e4a; color: aliceblue; margin-top: -35px; margin-bottom: 20px;">Add New Slide</a>
        <div class="row" style="clear: both;">
            <div class="col">
                <?php
                if ($num > 0) {
                ?>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><img src="../img/slideshow/<?= $row['img'] ?>" alt="" style="width: 70px"></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= substr($row['text'], 0, 50) . "...." ?></td>
                                <td><?= $row['link'] ?></td>
                                <td>
                                    <a href="index.php?p=slideshow&action=0&ssid=<?= $row['ssid'] ?>&active<?= ($row['active'] == "1" ? "0" : "1") ?>">
                                        <i class="align-middle text-secondary" data-feather="<?= ($row['active'] == "1" ? "eye" : "eye-off") ?>"></i>
                                    </a>
                                    <a href="#"><i class="align-middle text-secondary" data-feather="arrow-up"></i></a>
                                    <a href="#"><i class="align-middle text-secondary" data-feather="arrow-down"></i></a>
                                    <a href="#"><i class="align-middle text-secondary" data-feather="edit"></i></a>
                                    <a href="#"><i class="align-middle text-secondary" data-feather="trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>

                    </table>

                    <nav class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link text-secondary" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link text-secondary" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
            </div>
        <?php
                } else {
                    echo "<p>There is no slideshow</p>";
                }
        ?>
        </div>
    </div>
</main>