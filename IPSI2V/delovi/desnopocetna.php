
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">

<tr>
<td style="width:5%;">
</td>

<td>
<font face="Trebuchet MS" color="darkblue" size="4px">
<b>SPISAK USEVA</br> </font>
<form action="" method="GET">
Lokacija: <input type="text" name="filter" />
<input type="submit" name="filtriraj" value="FILTRIRAJ" />
<input type="submit" name="svi" value="SVI" />

</form>


</td>

<td style="width:5%;">
</td>
</tr>


<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<font face="Trebuchet MS" color="darkblue" size="4px">

<?php
// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

if ($UseviViewObject->BrojZapisa==0)
	{
		echo "NEMA ZAPISA U TABELI!";
	}
else
	{
	echo "UKUPAN BROJ ZAPISA:".$UseviViewObject->BrojZapisa;
		// ------------ zaglavlje ----------------
		echo "<table style=\"width:100%; padding:0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\"  bgcolor=\"#D8E7F4\">";
		echo "<tr>";
		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ID</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">NAZIV</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">LOKACIJA</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">TIP</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">POVRSINA</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">AGROTEHNICKA MERA</font><br/>";
		echo "</td>";
		echo "</tr>";

		for ($RBZapisa = 0; $RBZapisa < $UseviViewObject->BrojZapisa; $RBZapisa++) 
		{
							
		// CITANJE VREDNOSTI IZ MEMORIJSKE KOLEKCIJE $RESULT I DODELJIVANJE PROMENLJIVIM
		$ID=$UseviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($UseviViewObject->Kolekcija, $RBZapisa, 0);//mysql_result($result,$row,"REGISTARSKIBROJ");
		$Naziv=$UseviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($UseviViewObject->Kolekcija, $RBZapisa, 1);
		$Lokacija=$UseviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($UseviViewObject->Kolekcija, $RBZapisa, 2);
		$Tip=$UseviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($UseviViewObject->Kolekcija, $RBZapisa, 3);
		$Povrsina=$UseviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($UseviViewObject->Kolekcija, $RBZapisa, 4);
		$nazivMere=$UseviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($UseviViewObject->Kolekcija, $RBZapisa, 5);
		

		// CRTANJE REDA TABELE SA PODACIMA
		echo "<tr>";
		echo "<td>";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$ID</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Naziv</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Lokacija</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Tip</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Povrsina</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$nazivMere</font><br/>";
		echo "</td>";
		echo "</tr>";

		}  //za for 
		echo "</table>";
		echo "<br/>";
		echo "<br/>";
	}
$KonekcijaObject->disconnect();
?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    