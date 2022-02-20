<?php 
session_start();
require_once "db_connect.php";
$query = "SELECT * FROM ships";
$req = mysqli_query($connection, $query);


if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

	$ship_id = $_POST['ship_id'];
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$start = $_POST['start'];
	$end = $_POST['end'];

	$query = "INSERT INTO orders (";
	$query .= "ship_id, first_name, last_name, start, end";
	$query .= ") VALUES (";
	$query .= "'{$ship_id}', '{$first_name}', '{$last_name}', '{$start}', '{$end}'";
	$query .= ")";

	if ( mysqli_query($connection, $query) ) {
		header("Location: ships.php");
    } else {
		die("Error. Something wrong.");
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jachty</title>

    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
<!-- header -->
<section class="header">
    <div class="logo">
        <a href="index.php">
            <img src="./images/logo.png" alt="logo" />
        </a>
    </div>
    <div class="menu">
        <a href="index.php">Informacje</a>
        <a href="ships.php">Wypożyczalnia</a>
    </div>
</section>

<!-- body -->
<hr>
<div>
    <?php if ($req): ?>
        <?php while( $resp = mysqli_fetch_assoc($req) ): ?>
            <div class="ship" id="displayNoneProduct">
                <img src="./images/<?php echo $resp['name']; ?>.jpg" width="300px" height="200px" style="background-size: cover;" alt="jacht">

                <div class="custom_flex">
                    <h2><?php echo $resp['name']; ?></h2>
                    <p><?php echo $resp['category']; ?></p>
                    <p><?php echo $resp['description']; ?></p>
                    <p><span><?php echo $resp['price']; ?></span>zł</p>
                    <button onClick="openF(<?php echo $resp['id']; ?>)">Złóż zamówienie</button>
                </div>
            </div>


            <!-- this window open only when u cleck 'create order' -->
            <div class="modal_wrapper check_display" id="check_display<?php echo $resp['id']; ?>">
                <div class="modal">
                    <button  style="margin-left: 800px; background-color: red;" id="close" onClick="closeF(<?php echo $resp['id']; ?>)">X</button>
                    <form class="form-style custom_flex" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <p>Wybrałeś <strong>"<?php echo $resp['name']?>"</strong>, aby złożyć zamówienie - wpisz swoje dane.</p>
                        <input style="display:none" type="text"  name="ship_id" value="<?php echo $resp['id']; ?>">

                        <label for="first_name<?php echo $resp['id']; ?>" style="margin-top: 10px;">Imie</label>
                        <input id="first_name<?php echo $resp['id']; ?>" required type="text" name="first_name"/>

                        <label for="last_name<?php echo $resp['id']; ?>" style="margin-top: 10px;">Nazwisko</label>
                        <input id="last_name<?php echo $resp['id']; ?>" required type="text" name="last_name"/>

                        <label for="start<?php echo $resp['id']; ?>" style="margin-top: 10px;">Początek wypożyczenia</label>
                        <input id="start<?php echo $resp['id']; ?>" required type="date" name="start"/>

                        <label for="end<?php echo $resp['id']; ?>" style="margin-top: 10px;">Koniec wypożyczenia</label>
                        <input id="end<?php echo $resp['id']; ?>" required type="date" name="end"/>

                        <button class="button" type="submit" style="margin-top: 20px;">Złóż zamówienie</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Brak statków.</p>
    <?php endif; ?>
</div>
<!-- footer -->
<footer class="footer">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18561.512467454395!2d18.530086850693166!3d54.44194954085424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46fd0a8e9ae66fb7%3A0x7dba1c366faafae9!2sPla%C5%BCa%20Sopot!5e0!3m2!1spl!2spl!4v1645351240459!5m2!1spl!2spl" width="900" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    (c) Projekt zostal wykonany przez Filip Borzęda 8635
</footer>
<script src="main.js"></script>
</body>
</html>