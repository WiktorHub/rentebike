<?php
	session_start();
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: konto.php');
		exit();
	}
?>
<?php include('top.html'); ?>

<!DOCTYPE HTML>
<div style="margin-top:1%">
<link href="signin.css" rel="stylesheet">
<html lang="pl">
<head>
 
    <meta charset="utf-8"/>
    <title> Rent e-bike </title>
	<meta name="description" content="Formularz logowania wypożyczalni rowerów Rentebike">
	<meta name="keywords" content="formularz, logowanie, wypożyczalnia, rowery, Rentebike">
	<meta name="author" content="Rentebike">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
    <script src='https://www.google.com/recaptcha/api.js'></script> <!-- odnośnik, umożliwiający póżniejsze przeprowadzenie weryfikacji captcha -->
</head>
<body style="background-color: #52A8A8">
<div class="container-fluid" id="naglowek1">
    <center>
    <h2 style="font-weight: 100; font-size: 50px"><br>LOGOWANIE<br></h2>
        <br>
        </center>
	</div>
    
<center>
  
    
<div class="container-fluid" id="sekcja3">    
<form action="zaloguj.php" method="POST"  class="form-signin">
    <h5> Login: </h5> <br /> <input type="text" name="user" class="form-control"> <br>
    <h5> Hasło: </h5> <br /> <input type="password" name="password" class="form-control"> <br>
	<div style="margin-top:1%">
	 <div class="checkbox mb-3">
	 <h5>
    <label>
      <input type="checkbox" value="remember-me" class="check"> Zapamiętaj mnie!
    </label>
	</h5>
  </div>
 
    <div class="g-recaptcha" data-sitekey="6LcZu_oUAAAAAF4w6zZ1FEKJtwqWnb9iLR2-6qho"></div>  <!-- dodanie kodu witryny weryfikacji captcha -->
	<br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj się</button>
	<br>
    <p>     Nie posiadasz konta? <a href="rejestracja.php" style="color:white">Zarejestruj sie!</p></a> <br>
	<div style="margin-bottom:1%">
</div>
</form>
    </div>
</center>
<?php
	if(isset($_SESSION['error'])) 
		echo $_SESSION['error'];
	unset($_SESSION['error']);
	if(isset($_SESSION['wylogowany']))
		echo $_SESSION['wylogowany'];
	unset($_SESSION['wylogowany']);
?>

</body>
</html>
</link>

<?php include('footer.html'); ?>