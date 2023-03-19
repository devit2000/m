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
                if ($result) {
                    // Do something
                } else {
                    // Do nothing
                }
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
        case '3':
            $active = 1;
            $ordernum = 1;
            $tmp_name = $_FILES['img']['tmp_name'];
            $orginal_name = $_FILES['img']['name'];
            $size = $_FILES['img']['size'];
            $destination = "../img/slideshow";
            $ext = strtolower(pathinfo($orginal_name, PATHINFO_EXTENSION));

            if ($ext == "jpg" || $ext == "jpeg" || $ext == "gif" || $ext == "png") {
                if (($size / 1048576) <= 3) {
                    $img = floor(microtime(true) * 1000) . "." . $ext;
                    // Thumbnail
                    $sourceProperties = getimagesize($tmp_name);

                    $width = $sourceProperties[0];
                    $height = $sourceProperties[1];
                    $imageType = $sourceProperties[2];
                    $arr = ['title' => $_POST['title'], 'text' => $_POST['des'], 'link' => $_POST['link'], 'active' => $active, "ordernum" => $ordernum, "img" => $img];
                    $result = dbUpdate($table, $arr, " ssid=" . $_GET['ssid']);
                    if ($result) {
                        // Do something
                    } else {
                        // Do nothing
                    }
                    if ($result) {
                        createThumbnail($imageType, $tmp_name, $width, $height, $destination, $img, $ext);
                        move_uploaded_file($tmp_name, $destination . $img);
                        $error = 0;
                        $errmsg = "A slideshow has been added successfully!";
                    } else {
                        $error = 1;
                        $errmsg = "Fail to add a slideshow!";
                    }
                } else {
                    $error = 1;
                    $errmsg = "File image should not be excceed 3MB!";
                }
            } else {
                $error = 1;
                $errmsg = "Only image file is allowed to upload!";
            }

            break;

        case '4':
            $where = " ssid='" . $_GET['ssid'] . "'";
            $result = dbDelete($table, $where);
            if ($result) {
                // Do something
            } else {
                // Do nothing
            }
            break;

        case '5':
            $active = 1;
            $ordernum = 1;
            $tmp_name = $_FILES['img']['tmp_name'];
            $orginal_name = $_FILES['img']['name'];
            $size = $_FILES['img']['size'];
            $destination = "../img/slideshow";
            $ext = strtolower(pathinfo($orginal_name, PATHINFO_EXTENSION));

            if ($ext == "jpg" || $ext == "jpeg" || $ext == "gif" || $ext == "png") {
                if (($size / 1048576) <= 3) {
                    $img = floor(microtime(true) * 1000) . "." . $ext;
                    // Thumbnail
                    $sourceProperties = getimagesize($tmp_name);

                    $width = $sourceProperties[0];
                    $height = $sourceProperties[1];
                    $imageType = $sourceProperties[2];
                    $arr = ['title' => $_POST['title'], 'text' => $_POST['des'], 'link' => $_POST['link'], 'active' => $active, "ordernum" => $ordernum, "img" => $img];
                    $result = dbInsert($table, $arr);
                    if ($result) {
                        // Do something
                    } else {
                        // Do nothing
                    }
                    if ($result) {
                        createThumbnail($imageType, $tmp_name, $width, $height, $destination, $img, $ext);
                        move_uploaded_file($tmp_name, $destination . $img);
                        $error = 0;
                        $errmsg = "A slideshow has been added successfully!";
                    } else {
                        $error = 1;
                        $errmsg = "Fail to add a slideshow!";
                    }
                } else {
                    $error = 1;
                    $errmsg = "File image should not be excceed 3MB!";
                }
            } else {
                $error = 1;
                $errmsg = "Only image file is allowed to upload!";
            }

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
        <a href="#" class="btn float-end " data-bs-toggle="modal" data-bs-target="#slideshow" style="background-color: #222e4a; color: aliceblue; margin-top: -35px; margin-bottom: 20px;">Add New Slide</a>
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
                                <td><img src="../img/slideshow/thumbnail/<?= $row['img'] ?>" alt="" style="width: 70px"></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= substr($row['text'], 0, 50) . "...." ?></td>
                                <td><?= $row['link'] ?></td>
                                <td>
                                    <a href="index.php?p=slideshow&action=0&ssid=<?= $row['ssid'] ?>&active=<?= ($row['active'] == "1" ? "0" : "1") ?>">
                                        <i class="align-middle text-secondary" data-feather="<?= ($row['active'] == "1" ? "eye" : "eye-off") ?>"></i>
                                    </a>
                                    <a href="index.php?p=slideshow&action=1&ssid=<?= $row['ssid'] ?>&order=<?= $row['ordernum'] ?>"><i class="align-middle text-secondary" data-feather="arrow-up"></i></a>
                                    <a href="index.php?p=slideshow&action=2&ssid=<?= $row['ssid'] ?>&order=<?= $row['ordernum'] ?>"><i class="align-middle text-secondary" data-feather="arrow-down"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#slideshow" onclick="slideshow(<?= $row['ssid'] ?>)" href="#"><i class="align-middle text-secondary" data-feather="edit"></i></a>
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