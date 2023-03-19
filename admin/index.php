<?php
include('../libraries/db.php');
include('../libraries/img.php');
$page = "dashboard.php";
$p = "";
if (isset($_GET['p'])) {
	$p = $_GET['p'];
	switch ($p) {
		case "slideshow":
			$page = "slideshow.php";
			break;
		case "product":
			$page = "product.php";
			break;
		case "page":
			$page = "page.php";
			break;
		case "configuration":
			$page = "configuration.php";
			break;
		case "user":
			$page = "user.php";
			break;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include "includes/head.php" ?>

<body>
	<div class="wrapper">
		<!-- sidebar -->
		<?php include "includes/sidebar.php" ?>

		<div class="main">
			<!-- header -->
			<?php include "includes/header.php" ?>

			<!-- dashboard -->
			<?php include $page ?>

			<!-- footer -->
			<?php include "includes/footer.php" ?>
		</div>
	</div>

	<!-- script -->
	<?php include "includes/modal.php" ?>
	<?php include "includes/foot.php" ?>

</body>

</html>