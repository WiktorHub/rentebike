<?php include('top.html'); ?>
<div style="margin-top:1%">

<?php

session_start ();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: logowanie.php');
	exit();
}
?>

<html>
<head>
<title> Moje konto </title>
</head>
<body>
<center>
<div class="container-fluid" id="naglowek1">
        <div class="row">
            <div class="col-md-12">
			<a name="modele"></a>
                <center>
                <P> </P>
                <h2 style="font-weight: 100; font-size: 50px">MOJE KONTO</h2>
                <p> </p>
                    </center>
            </div>  
      </div>    
    </div>
	<div class="container" id="sekcja3">
<?php

echo "<h2> Witaj ".$_SESSION['user']." w Rentebike!".'</h2><br /> <br />
<h2><b> Dane twojego konta: </b></h2> <br />
<h3> Imię: '.$_SESSION['imie'].'<br />
Nazwisko: '.$_SESSION['nazwisko'].'<br />
Telefon: '.$_SESSION['telefon'].'<br />
E-mail: '.$_SESSION['email'].'<br />
Miasto: '.$_SESSION['miasto'].'<br />
Kod pocztowy: '.$_SESSION['kod'].'</h3><br /> <br />
<h4><u><a href="wyloguj.php" style="color: white">Wyloguj użytkownika!</a></u></h4><br />';
?>
</div>
</center>
</body>
</html>
<div style="margin-top:1%">
<?php include('footer.html'); ?>







