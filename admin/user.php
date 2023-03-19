<?php
    include ("../configuration.php");
    include ("../libraries/db.php");
    $result = dbSelect("tbl_user", "*", "", "");
?>

<main class="content">
    <div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Users</strong></h1>


        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <table border="1">
                    <tr>
                        <th>uID</th>
                        <th>uName</th>
                        <th>uGender</th>
                        <th>uPhone</th>
                    </tr>

                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                        <tr>
                            <td><?=$row[0]?></td>
                            <td><?=$row[1]?><td>
                            <td><?=$row[2]?></td>
                            <td><?=$row[3]?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    
                </table>
            </div>
        </div>

    </div>
</main>