
<?php include('top.html'); ?>

<?php
	session_start();
	if(isset($_POST['email']))
	{
		$dane_poprawne=true; 
		$login=$_POST['login'];
		if ((strlen($login)<3) ||(strlen($login)>20)) //sprawdzenie, czy login składa się z od 3 do 20 znaków
		{
			$dane_poprawne=false;
			$_SESSION['e_login']= "<div class='error'> Błąd: Login powinien mieć od 3 do 20 znaków!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do loginu
		}
		if(!ctype_alnum($login)) // sprawdzenie, czy login składa się wyłącznie ze znaków alfanumerycznych
		{
			$dane_poprawne=false;
			$_SESSION['e_elogin']="<div class='error'> Błąd: Login musi zawierać same znaki alfanumeryczne!</div>";
		}
	/**/	$imie=$_POST['imie'];
		if ((strlen($imie)<2) ||(strlen($imie)>30) || (!ctype_alnum($imie))) //sprawdzenie, czy imie składa się z od 2 do 30 znaków i czy składa się tylko ze znaków alfanumerycznych
		{
			$dane_poprawne=false;
			$_SESSION['imie']= "<div class='error'> Błąd: Imię powinno mieć od 2 do 30 znaków i powinno składać się tylko ze znaków alfanumerycznych(bez polskich znaków)!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do imienia
		}
	/**/	$nazwisko=$_POST['nazwisko'];
		if ((strlen($nazwisko)<2) || (strlen($nazwisko)>30) || (!ctype_alnum($nazwisko))) //sprawdzenie, czy nazwisko składa się z od 2 do 30 znaków i czy składa się tylko ze znaków alfanumerycznych
		{
			$dane_poprawne=false;
			$_SESSION['nazwisko']= "<div class='error'> Błąd: Nazwisko powinno mieć od 2 do 30 znaków i powinno składać się tylko ze znaków alfanumerycznych(bez polskich znaków)!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do nazwiska
		}
	/**/	$pesel=$_POST['pesel'];
		if ((strlen($pesel)!=11)) //sprawdzenie, czy pesel ma 11 znaków
		{
			$dane_poprawne=false;
			$_SESSION['pesel']= "<div class='error'> Błąd: Pesel musi mieć 11 znaków!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do peselu
		}
	/**/	$ulica=$_POST['ulica'];
		if ((strlen($ulica)>60) ||(strlen($ulica)<2)) 
		{
			$dane_poprawne=false;
			$_SESSION['ulica']= "<div class='error'> Błąd: Nazwa ulicy musi mieć minimum 2 znaki!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do nazwy ulicy
		}
		$nrdomu=$_POST['nrdomu'];
		if ((strlen($nrdomu)>3) ||(strlen($nrdomu)<1)) 
		{
			$dane_poprawne=false;
			$_SESSION['nrdomu']= "<div class='error'> Błąd: Numer domu musi mieć od 1 do 3 znaków!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do numeru domu
		}
		$nrmieszkania=$_POST['nrmieszkania'];
		if ((strlen($nrmieszkania)>3) ||(strlen($nrmieszkania)<1)) 
		{
			$dane_poprawne=false;
			$_SESSION['nrmieszkania']= "<div class='error'> Błąd: Numer mieszkania musi mieć od 1 do 3 znaków!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do numeru mieszkania
		}
		$miasto=$_POST['miasto'];
		if ((strlen($miasto)>40) ||(strlen($miasto)<1)) 
		{
			$dane_poprawne=false;
			$_SESSION['miasto']= "<div class='error'> Błąd: Miasto musi mieć od 1 do 40 znaków!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do miasta
		}
		$kod=$_POST['kod'];
		if((strstr($kod, "-")==false) || (strlen($kod)!=6)) 
	
		{
			$dane_poprawne=false;
			$_SESSION['kod']= "<div class='error'> Błąd: Kod pocztowy musi mieć 6 znaków i znak '-'!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do kodu pocztowego
		}
		$dokument=$_POST['dokument'];
		if((strlen($dokument)>50) || (strlen($dokument)<5)) 
		{
			$dane_poprawne=false;
			$_SESSION['dokument']= "<div class='error'> Błąd: Numer dokumentu musi mieć powyżej 5 znaków!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do numeru dokumentu
		}
		$email=$_POST['email'];
		if(strstr($email, "@")==false) // sprawdzenie, czy email, zawiera znak @
		{
			$dane_poprawne=false; 
			$_SESSION['e_email']="<div class='error'> Błąd: email powinienien zawierać @!</div>"; 
		}
		$telefon=$_POST['telefon'];
		if((strlen($telefon)>15) || (strlen($telefon)<9)) 
	
		{
			$dane_poprawne=false;
			$_SESSION['telefon']= "<div class='error'> Błąd: Numer telefonu musi mieć od 9 do 15 cyfr!</div>"; // komunikat wyświetlony, gdy nie zostaną spełnione warunki co do numeru telefonu
		}
		$haslo=$_POST['haslo'];
		if (strlen($haslo)<8) // sprawdzenie, czy hasło składa się z co najmniej 8 znaków
		{
			$dane_poprawne=false;
			$_SESSION['e_haslo']="<div class='error'> Błąd: Hasło musi mieć minimun 9 znaków!</div>"; 
		}
		$phaslo=$_POST['phaslo'];
		if($haslo!==$phaslo) // sprawdzenie, czy oba hasła są takie same
		{
			$dane_poprawne=false;
			$_SESSION['e_phaslo']="<div class='error'> Błąd: Hasła muszą być takie same!</div>"; 
		}
        
        //haszowanie hehe hasła
        $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
        
		if (!isset($_POST['regulamin']) && empty($_POST['regulamin'])) // sprawdzenie, czy zaakceptowano regulamin
		{
			$dane_poprawne=false; 
			$_SESSION['e_regulamin']="<div class='error'> Błąd: Musisz zaakceptować regulamin!</div>"; 
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') // skrypt, za pomocą którego, możliwe jest przeprowadzenie weryfikacji captcha
		{
			function post_captcha($user_response) 
			{
				$fields_string = '';
				$fields = array(
				'secret' => '6LcZu_oUAAAAANBPBi7_xV7dKRJloDhVDS0H9Mg9', // kod tajny naszej witryny
				'response' => $user_response
				);
				foreach($fields as $key=>$value)
				$fields_string .= $key . '=' . $value . '&';
				$fields_string = rtrim($fields_string, '&');
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
				curl_setopt($ch, CURLOPT_POST, count($fields));
				curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
				$result = curl_exec($ch);
				curl_close($ch);
				return json_decode($result, true);
			}
			$res = post_captcha($_POST['g-recaptcha-response']);
			if (!$res['success']) 
			{
				// What happens when the CAPTCHA wasn't checked
				$dane_poprawne=false;
				$_SESSION['e_captcha']="<div class='error'> Błąd: Musisz potwierdzić, że nie jesteś robotem!</div>";
			} 
		} 
		//sprawdzenie czy email i login jest w bazie !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

			require_once "connect.php";
		
			try
			{
			$polaczenie =@new mysqli ($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno!=0)
			{
				throw new Exception ((mysqli_connect_errno));
			}
			else
			{
				//sprawdzenie czy email już istnieje
				$rezultat = $polaczenie->query("SELECT id_klienta FROM klienci WHERE email='$email'");
			
				if(!$rezultat) throw new Exception($polaczenie -> error);
			
			
				$ile_takich_maili=$rezultat->num_rows;
				if(($ile_takich_maili)>0)
				{
					$dane_poprawne=false;
					$_SESSION['e_email_ist']="<div class='error'> Błąd: Taki email już istnieje w bazie danych!</div>"; 
				}
				
				
				//sprawdzamy login
				$rezultat2 = $polaczenie->query("SELECT id_klienta FROM klienci WHERE user='$login'");
			
				if(!$rezultat2) throw new Exception($polaczenie -> error);
			
			
				$ile_takich_loginow=$rezultat2->num_rows;
				if(($ile_takich_loginow)>0)
				{
					$dane_poprawne=false;
					$_SESSION['e_login_ist']="<div class='error'> Błąd: Taki login już istnieje w bazie danych!</div>"; 
				}
				
				//DODANIE UŻYTKOWNIKA do bazy danych
				if($dane_poprawne == true){
					if($polaczenie -> query("INSERT INTO klienci(imie, nazwisko, user, password, telefon, 
					email, dokument, pesel, ulica, nrdomu, nrmieszkania, miasto, kod) 
						VALUES('$imie','$nazwisko','$login','$haslo_hash','$telefon','$email','$dokument', 
						'$pesel', '$ulica', '$nrdomu','$nrmieszkania','$miasto','$kod') ")){
					$_SESSION['udanarejestracja']=true;
					header('Location: witojcie.php');
					}
					else{
						throw new Exception($polaczenie->error);
					}
				
				}
				
				
				
				$polaczenie->close();
			}
				
				
			}
			catch(Exception $e)
			{
				echo "Błąd serwera. Sorry za utrudnionka";
			} 
				
				
			//koniec sprawdzania
			}
?>
	<!DOCTYPE HTML>
	<center>
	<link href="signin.css" rel="stylesheet">
	<div style="margin-top:1%">
	
	
<html lang="pl">

<head>
		<link href="style.php" rel="stylesheet">
		<meta charset="utf-8" />
		<title> Strona projektu PHP </title>
		<script src='https://www.google.com/recaptcha/api.js'></script>  <!-- odnośnik, umożliwiający póżniejsze przeprowadzenie weryfikacji captcha -->
</head>
<body>
	<div class="container-fluid" id="naglowek1">
    <center>
    <h2 style="font-weight: 100; font-size: 50px"><br>REJESTRACJA<br></h2>
        <br>
        </center>
    </div>
    <div class="container-fluid" id="sekcja3">    
		<form method="POST" class="form-signin"> <br>
	<h5> Login: </h5> <br/> <input type="text" name="login" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['e_login']))
		{
			echo  ($_SESSION['e_login']);
			unset($_SESSION['e_login']);
		}
	?>
	<?php
		if(isset($_SESSION['e_elogin']))
		{
			echo($_SESSION['e_elogin']);
			unset($_SESSION['e_elogin']);
		}
	?>
	<?php
	if(isset($_SESSION['e_login_ist']))
		{
			echo($_SESSION['e_login_ist']);
			unset($_SESSION['e_login_ist']);
		}
	?>
	<h5> Hasło: </h5> <br/> <input type="password" name="haslo" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['e_haslo']))
		{
			echo($_SESSION['e_haslo']);
			unset($_SESSION['e_haslo']);
		}
	?>
	<h5> Powtórz hasło: </h5> <br/> <input type="password" name="phaslo"class="form-control"> <br/> </br>
	<?php
		if(isset($_SESSION['e_phaslo']))
		{
			echo($_SESSION['e_phaslo']);
			unset($_SESSION['e_phaslo']);
		}
	?>
	<h5> E-mail: </h5> <br/> <input type="text" name="email" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['e_email']))
		{
			echo($_SESSION['e_email']);
			unset($_SESSION['e_email']);
		}
		?>
		<?php
		if(isset($_SESSION['e_email_ist']))
		{
			echo($_SESSION['e_email_ist']);
			unset($_SESSION['e_email_ist']);
		}
	?>
	<h5> Imię: </h5> <br/> <input type="text" name="imie" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['imie']))
		{
			echo  ($_SESSION['imie']);
			unset($_SESSION['imie']);
		}
		
	?>
	<h5> Nazwisko: </h5> <br/> <input type="text" name="nazwisko" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['nazwisko']))
		{
			echo  ($_SESSION['nazwisko']);
			unset($_SESSION['nazwisko']);
		}
		
	?>
	<h5> Pesel: </h5> <br/> <input type="text" name="pesel" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['pesel']))
		{
			echo  ($_SESSION['pesel']);
			unset($_SESSION['pesel']);
		}
	?>
	<h5> Numer dokumentu: </h5> <br/> <input type="text" name="dokument" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['dokument']))
		{
			echo($_SESSION['dokument']);
			unset($_SESSION['dokument']);
		}
	?>
    <h5> Telefon: </h5> <br/> <input type="text" name="telefon" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['telefon']))
		{
			echo  ($_SESSION['telefon']);
			unset($_SESSION['telefon']);
		}
		
	?>
		
	<h4>Adres: </h4> <br/> 
	<h5> Ulica: </h5> <br/> <input type="text" name="ulica" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['ulica']))
		{
			echo  ($_SESSION['ulica']);
			unset($_SESSION['ulica']);
		}
	?>
	<h5> Numer domu: </h5> <br/> <input type="text" name="nrdomu" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['nrdomu']))
		{
			echo  ($_SESSION['nrdomu']);
			unset($_SESSION['nrdomu']);
		}
	?>
	<h5> Numer mieszkania: </h5> <br/> <input type="text" name="nrmieszkania" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['nrmieszkania']))
		{
			echo  ($_SESSION['nrmieszkania']);
			unset($_SESSION['nrmieszkania']);
		}
	?>
	<h5> Miasto: </h5> <br/> <input type="text" name="miasto" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['miasto']))
		{
			echo  ($_SESSION['miasto']);
			unset($_SESSION['miasto']);
		}
	?>
	<h5> Kod pocztowy: </h5> <br/> <input type="text" name="kod" class="form-control"> <br/> <br/>
	<?php
		if(isset($_SESSION['kod']))
		{
			echo  ($_SESSION['kod']);
			unset($_SESSION['kod']);
		}
	?>
	<h5> <label> <!-- dodanie znacznika label, spowoduje, że checkbox zostanie zaznaczony, również dzięki kliknięciu na etykietę "Akceptuję regulamin!" -->
	<input type="checkbox" name="regulamin" class="check"> Akceptuję regulamin! 
	</label> </h5>
	<br/>
	<?php
		if(isset($_SESSION['e_regulamin']))
		{
			echo($_SESSION['e_regulamin']);
			unset($_SESSION['e_regulamin']);
		}
	?>
	<div class="g-recaptcha" data-sitekey="6LcZu_oUAAAAAF4w6zZ1FEKJtwqWnb9iLR2-6qho"></div> <!-- dodanie kodu witryny weryfikacji captcha -->
	<?php
		if(isset($_SESSION['e_captcha']))
		{
			echo($_SESSION['e_captcha']);
			unset($_SESSION['e_captcha']);
		}
	?> 
	
	<br/>
	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Zarejestruj sie" name="but1" > 
        
	</form>	
    
	<br> 
	Masz już konto? <a href="logowanie.php" style="color:white"> Zaloguj się! </a>
    </div>
	</body>
</html>


</center>
<?php include('footer.html'); ?>
