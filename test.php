<?php
require_once ("md5passwordcracker.php");
$myCracker = new PasswordCracker();
$myCracker->importDictionary('dictionary.txt');
$myCracker->searchRainbowTable("477e139b479166867077d5651db44c9a");

?>




