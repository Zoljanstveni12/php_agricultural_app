<?php
class DBUsevi extends Tabela 

{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//

public $ID;
public $Naziv;
public $Lokacija;
public $Tip;
public $Povrsina;
public $IDMere;


// METODE

// konstruktor

public function DodajNovUsev()
{
	
	
		
	    $GreskarezultatPar1 = $this->IzvrsiAktivanSQLUpit ("SET @NazivParametar='".$this->Naziv."'");

		$GreskarezultatPar2 = $this->IzvrsiAktivanSQLUpit ("SET @LokacijaParametar='".$this->Lokacija."'");
		
		$GreskarezultatPar3 =  $this->IzvrsiAktivanSQLUpit ("SET @TipParametar='".$this->Tip."'");

		$GreskarezultatPar4 = $this->IzvrsiAktivanSQLUpit ("SET @PovrsinaParametar='".$this->Povrsina."'");

		$GreskarezultatPar5 =  $this->IzvrsiAktivanSQLUpit ("SET @IDMereParametar=$this->IDMere");

		

		

		
		
		$GreskarezultatCall = $this->IzvrsiAktivanSQLUpit ( "CALL `DodajUsev`( @IDMereParametar,@NazivParametar,LokacijaParametar, @TipParametar,@PovrsinaParametar);");
		
	
	$greska=$GreskarezultatPar1.$GreskarezultatPar2.$GreskarezultatPar3.$GreskarezultatPar4.$GreskarezultatPar5.$GreskarezultatCall;
	return $greska;
}


}


?>