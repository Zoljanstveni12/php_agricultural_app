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
	   
	   
	      // -------------------------------------
	
	   
		  

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
		// provera poslovne logike
		require "klase/Upis.php";
		$UnosObject = new Upis($KonekcijaObject, 'Usevi');
		$dozvoljenUpis=$UnosObject->DaLiImaMestaZaUpis($IDMere);
			
		if ($dozvoljenUpis=="DA")
			{

				require "klase/BaznaTransakcija.php";
				$TransakcijaObject = new Transakcija($KonekcijaObject);
				$TransakcijaObject->ZapocniTransakciju();
				

	require('klase/DBUsevi.php');
	$UseviObject = new DBUsevi($KonekcijaObject, 'Usevi');
	$UseviObject->Naziv=$Naziv;
	$UseviObject->Lokacija=$Lokacija;
	$UseviObject->Tip=$Tip;
	$UseviObject->Povrsina=$Povrsina;
	$UseviObject->IDMere=$IDMere;
	$UtvrdjenaGreska=$UseviObject->DodajNovUsev();


	

	require "klase/DBMere.php";
		$MereObject = new DBMere($KonekcijaObject, 'Mere');
		$greska2=$MereObject->InkrementirajBrojMera($IDMere);

		$UtvrdjenaGreska=$greska1.$greska2;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);


}
else
{
	$UtvrdjenaGreska="Ne mozete uneti jos 1 usev za ovu meru.";
	

}

} // od if db selected

// ZATVARANJE KONEKCIJE KA DBMS
$KonekcijaObject->disconnect();

	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska!=null) {
	echo "Greska: $UtvrdjenaGreska";	
     }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:useviLista.php');	
	 }
		
	  
      ?>

