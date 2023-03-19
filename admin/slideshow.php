<?php

/**
 * 0: Active
 * 1: Move Up
 * 2: Move Down
 * 3: Edit
 * 4: Delete
 * 5: Add
 */

// !!IMPORTANT!!!
$table = "tbl_slideshow";
$column = "*";
$criteria = "";
$clause = " order by ordernum ";
if (isset($_GET['action'])) {
    $a = $_GET['action'];
    switch ($a) {
            // Active
        case '0':
            if (isset($_GET['active'])) {
                $arr = ["active" => $_GET['active']];
                $where = "ssid='" . $_GET['ssid'] . "'";
                $result = dbUpdate($table, $arr, $where);
            }

        case '1':
            if (isset($_GET['order'])) {
                $result = Move($table, $_GET['ssid'], $_GET['order'], "<", " desc ");
                if ($result) {
                    // Do something
                } else {
                    // Do nothing
                }
            }
            break;
        case "2":
            if (isset($_GET['order'])) {
                $result = Move($table, $_GET['ssid'], $_GET['order'], ">", " asc ");
                if ($result) {
                    // Do something
                } else {
                    // Do nothing
                }
            }
            break;


        case '4':
            $where = " ssid='" . $_GET['ssid'] . "'";
            $result = dbDelete($table, $where);
            break;

        default:
            break;
    }
}

$result = dbSelect($table, $column, $criteria, $clause);
$num = dbCount($table);

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
                                    <a href="index.php?p=slideshow&action=0&ssid=<?= $row['ssid'] ?>&active=<?= ($row['active'] == "1" ? "0" : "1") ?>">
                                        <i class="align-middle text-secondary" data-feather="<?= ($row['active'] == "1" ? "eye" : "eye-off") ?>"></i>
                                    </a>
                                    <a href="index.php?p=slideshow&action=1&ssid=<?= $row['ssid'] ?>&order=<?= $row['ordernum'] ?>"><i class="align-middle text-secondary" data-feather="arrow-up"></i></a>
                                    <a href="index.php?p=slideshow&action=2&ssid=<?= $row['ssid'] ?>&order=<?= $row['ordernum'] ?>"><i class="align-middle text-secondary" data-feather="arrow-down"></i></a>
                                    <a href="index.php?p=slideshow&action=3&ssid=<?= $row['ssid'] ?>"><i class="align-middle text-secondary" data-feather="edit"></i></a>
                                    <a href="index.php?p=slideshow&action=4&ssid=<?= $row['ssid'] ?>"><i class="align-middle text-secondary" data-feather="trash"></i></a>
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