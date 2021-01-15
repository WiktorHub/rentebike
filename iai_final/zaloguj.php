<?php
session_start();
if((!isset($_POST['user'])) || (!isset($_POST['password'])))
{
	header('Location: logowanie.php');
	exit();
}
require_once "connect.php";

$polaczenie =@new mysqli ($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    $login = $_POST['user'];
	$haslo = $_POST['password'];
	$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
    
    
    $sql = "SELECT * FROM klienci WHERE BINARY user = '$login'";
    
    if($rezultat = @$polaczenie->query($sql))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
			
            $wiersz = $rezultat->fetch_assoc();
			$_SESSION['user'] = $wiersz['user'];
			$_SESSION['imie'] = $wiersz['imie'];
			$_SESSION['nazwisko'] = $wiersz['nazwisko'];
			$_SESSION['telefon'] = $wiersz['telefon'];
			$_SESSION['email'] = $wiersz['email'];
			$_SESSION['miasto'] = $wiersz['miasto'];
			$_SESSION['kod'] = $wiersz['kod'];
			
			unset($_SESSION['error']);
			
			if (password_verify($haslo, $wiersz['password']))
			{ 			
		     $_SESSION['zalogowany'] = true;
            $rezultat->free_result();
			header('Location: konto.php');
			}
			 else{
				$_SESSION['error'] = '<br /> Błędne dane logowania <br /> 
			<a href="logowanie.php"> Spróbuj ponownie ';
			unset($_SESSION['wylogowany']);
			header('Location: logowanie.php');
				 
						} 
						
		}
        else  
        {
			$_SESSION['error'] = '<br /> Błędne dane logowania <br /> 
			<a href="logowanie.php"> Spróbuj ponownie ';
			unset($_SESSION['wylogowany']);
			header('Location: logowanie.php');
			}
        
    }
    
    $polaczenie -> close();
}
?>