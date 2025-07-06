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

public function DajKolekcijuSvihUseva()
{
$SQL = "select * from `Usevi` ORDER BY ID ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}






public function UcitajUsevPoIdUseva($idUseva)
{
$SQL = "select * from `Usevi` where `ID`='".$idUseva."'";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
// raspolazemo sa:
// $Kolekcija;
//  $BrojZapisa;
}

public function DodajNovUsev()
{
	$SQL = "INSERT INTO `Usevi` (Naziv, Lokacija, Tip, Povrsina, IDMere) VALUES ('$this->Naziv','$this->Lokacija','$this->Tip', '$this->Povrsina', $this->IDMere)";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}



public function ObrisiUsev($IDZaBrisanje)
{
	$SQL = "DELETE FROM `Usevi` WHERE ID='".$IDZaBrisanje."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// TO DO

public function IzmeniUsev($stariID, $Naziv, $Lokacija, $Tip, $Povrsina, $IDMere)
{
	$SQL = "UPDATE `Usevi` SET IDMere='$IDMere', Naziv='$Naziv', Lokacija='$Lokacija', Tip='$Tip', Povrsina='$Povrsina' WHERE ID = $stariID";

	$greska=$this->IzvrsiAktivanSQLUpit($SQL);


	
	return $greska;
}

// ostale metode 




}
?>