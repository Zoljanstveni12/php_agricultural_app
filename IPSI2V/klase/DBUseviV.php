<?php
class DBUsevi extends Tabela 
// rad sa pogledom
{

// METODE

// konstruktor

public function DajSvePodatkeOUsevima($filterParametar)
{
	if (isset($filterParametar))
	{
		// nad pogledom se moze dodati filter, jer se pogled koristi kao da je tabela
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodaciUseva` 
		where `Lokacija`='".$filterParametar."'";
	}
	else
	{
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodaciUseva`";
	}
	$this->UcitajSvePoUpitu($upit);
	// sada raspolazemo sa:
	//$this->Kolekcija 
	//$this->BrojZapisa
}


}
?>