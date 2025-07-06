<?php
class DBMere extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
	public $IDMere;
	public $nazivMere;
	public $brojMere;

	
// METODE

// konstruktor

public function UcitajKolekcijuSvihMera()
{
$SQL = "select * from `Mere` ORDER BY IDMere ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
//return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

public function InkrementirajBrojMera($IDMere)
{
	
	$KriterijumFiltriranja="IDMere='".$IDMere."'";
	$StaraVrednostUkBrUseva=$this->DajVrednostJednogPoljaPrvogZapisa ('brojMere', $KriterijumFiltriranja, 'brojMere'); 
	
	// izracunavanje nove vrednosti
	$NovaVrednostUkBrUseva=$StaraVrednostUkBrUseva + 1;
	
	// izvrsavanje izmene
    $SQL = "UPDATE `".$this->NazivBazePodataka."`.`Mere` SET brojMere=".$NovaVrednostUkBrUseva." WHERE IDMere='".$IDMere."'";
	$greska= $this->IzvrsiAktivanSQLUpit($SQL);

	return $greska;
	
	}





// ostale metode 




}
?>