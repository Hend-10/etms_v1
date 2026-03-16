<?php

	
try
{

	 $bdd = new PDO('mysql:host=localhost;dbname=temphumid', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$emplacement = $_GET['emplacement'];
$id_cap= $_GET['id_cap'];
$zone_cap = $_GET['Zone'];
$tmp = $_GET['tmp'];
$hum= $_GET['hum'];


//humidity,tmperature,Hum2,tmp2,Hum3,tmp3,Hum4,tmp4,Hum5,tmp5, //:humidity,:tmperature, :Hum2,  :tmp2, :Hum3, :tmp3,:Hum4, :tmp4,:Hum5, :tmp5
$req = $bdd->prepare('INSERT INTO archive_bc(id_cap,tmp,hum,emplacement,zone_cap,date_enrg) VALUES(:id_cap,:tmp,:hum, :emplacement, :zone_cap, NOW())');
$req->execute(array(
	'id_cap' => $id_cap,
	'tmp' => $tmp,
	'hum' => $hum,
	'emplacement' => $emplacement,
	'zone_cap' => $zone_cap,
	));


echo 'Données enregistrées';
?>