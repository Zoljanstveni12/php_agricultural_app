 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   



	

	   // preuzimanje vrednosti sa forme
	   $id=$_POST['StariId'];
	   $Naziv=$_POST['naziv'];
	   $Lokacija=$_POST['lokacija'];
	   $Tip=$_POST['tip'];
	   $Povrsina=$_POST['povrsina'];
	   $IDMere=$_POST['mere'];
   
	   
	  

	
	   // koristimo klasu za poziv procedure za konekciju
		require "klase/BaznaKonekcija.php";
		require "klase/BaznaTabela.php";
		$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
		$KonekcijaObject->connect();
		if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
		{	
			require "klase/DBUsevi.php";
			$UseviObject = new DBUsevi($KonekcijaObject, 'Usevi');
			$greska=$UseviObject->IzmeniUsev($id, $Naziv, $Lokacija, $Tip, $Povrsina, $IDMere);
		}
		else
		{
			echo "Nije uspostavljena konekcija ka bazi podataka!";
		}
		
    $KonekcijaObject->disconnect();
	   
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:useviLista.php');	
		
	  
      ?>

