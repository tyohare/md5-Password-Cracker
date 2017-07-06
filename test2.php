<?php
require_once('md5passwordcracker.php');
$firstobj = new PasswordCracker;

$firstobj->addWordToDictionary("Hello");
//$firstobj->addWordToDictionary("Goodbye");
//$firstobj->searchMd5Hash("8b1a9953c4611296a827abf8c47804d7");
//$firstobj->searchDictionaryForWord("test123");
//$firstobj->printDictionary();
//$firstobj->removeWordFromDictionary("goodbye");
//$firstobj->phpPrintR();

?>
