<?php
session_start ();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: logowanie.php');
	exit();
}
?>
<?php include('top.html'); ?>
<html>
<div class="container-fluid" id="haslo2">
        <div class="row">
            <div class="col-md-12">
			<a name="modele"></a>
                <center>
                <P> </P>
                <p>REZERWACJA</p>
                <p> </p>
                    </center>
            </div>  
      </div>    
    </div>
<center>
<div class="container-fluid" id="sekcja3">    
<form action="" method="POST"  class="form-signin">

    <h5> Wybierz model: </h5>  
	<select name="nazwa" class="form-control">
	<option> </option>
		<option>Downhill: Lapierre Overvolt HT 900i</option>
		<option>Downhill: Lapierre OVERVOLT HT 7.5</option>
		<option>Downhill: Lapierre OVERVOLT HT 9.5</option>
		<option>Downhill: XDURO AllMtn 3.0</option>
		<option>Downhill: XDURO NDURO 5.0</option>
		<option>Downhill: XDURO NDURO 8.0</option>
		<option>Górski: Ghost Teru PT B5.7+</option>
		<option>Górski: Ghost Lanao 6 27,5+</option>
		<option>Górski: Ghost Teru PT B3.9</option>
		<option>Górski: Haibike SDURO Hardnine 1.5</option>
		<option>Górski: Hardtail Hyb Teru B2.9 AL</option>
		<option>Górski: ZESTY AM FIT 4.0</option>
		<option>Miejski: Electra Townie Commute GO!</option>
		<option>Miejski: Lapierre Overvolt Urban 4.4</option>
		<option>Miejski: Lapierre Overvolt Cross 400 W 500Wh</option>
		<option>Miejski: Ghost Hybride Square Trekking B1.8 AL</option>
		<option>Miejski: Ghost Hybride Square Trekking B2.8 AL U</option>
		<option>Miejski: XDURO Adventr 6.0</option>
		
		</select> 
	<br> <br>
	
    <h5> Wybierz typ wypożyczenia: </h5> 
	<select name="typ" class="form-control">
	<option> </option>
		<option>Na godziny</option>
		<option>Na dni</option>
		</select> 
	<br> <br>
	
	<h5> Wybierz długość wypożyczenia: </h5>  
         <select name="dlugosc" class="form-control">
		<option>1</option>
		 <option> </option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
		<option>7</option>
		</select> 
	<br> <br>
	<h5> Podaj datę początkową rezerwacji<br>[dd/mm/rrrr]: </h5> <input type="text" name="data_rozpoczecia" class="form-control"> <br> <br>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Rezerwuj rower</button>
	
	<div style="margin-top:1%">
	 <div class="checkbox mb-3">
	</div>
 	<div style="margin-bottom:1%">
</div>
</form>
    </div>
</center>
</html>
<?php include('footer.html'); ?>