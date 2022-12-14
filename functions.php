<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Halland shop</h1>
                <nav>
                    <a href="index.php">Trang chủ</a>
                    <a href="index.php?page=products">Sản phẩm</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                    <span>$num_items_in_cart</span>
						<i class="fas fa-shopping-cart"></i>
					</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
    // Get the amount of items in the shopping cart, this will be displayed in the header.

$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Haaland Shop</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>