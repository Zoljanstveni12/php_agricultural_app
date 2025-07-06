<?php
class Upis extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
// METODE

// konstruktor nasledjuje od bazne klase Tabela

public function DaLiImaMestaZaUpis($IDMereParametar)
{
// incijalizacija promenljive za izlaz
$odgovor="NE";

// izdvajanje ogranicenja iz XML
$xml=simplexml_load_file("klase/Mere.xml") or die("Nije uspesno ucitavanje fajla sa ogranicenjem!");
$maxBrojUseva=$xml->MaxBrUseva;

// izdvajanje koliko trenutno imamo upisanih za taj smer u bazi podataka
$NazivTrazenogPolja="count(`ID`)";
$KriterijumFiltriranja="`IDMere`='".$IDMereParametar."'";
$KriterijumSortiranja="`ID`"; // nema potrebe da se sortira, ali ne menjamo baznu klasu
$trenutanBrojUseva=$this->DajVrednostJednogPoljaPrvogZapisa($NazivTrazenogPolja, $KriterijumFiltriranja, $KriterijumSortiranja); 

// uporedjivanje max i trenutno i odlucivanje
if ($trenutanBrojUseva<$maxBrojUseva)
{
$odgovor="DA";
}
else
{
$odgovor="NE";
}

//vracanje odgovora
return $odgovor;
}


}
?>