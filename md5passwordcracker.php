<?php
class PasswordCracker{
    // empty Dictionary array
    public $dictionary = [];
    public $wordHashArray = array();

    function computeMd5Hash($word){
        return md5($word);
    }

    function searchMd5Hash($md5Hash){
        $i = 0;
        for($i; $i < count($this->dictionary); $i++){
            if($md5Hash == $this->computeMd5Hash($this->dictionary[$i])){
                print($md5Hash." matched with word: ".$this->dictionary[$i]."\n");
                return true;
            }

        }
        print("No matches for md5 hash: ".$md5Hash." found.");
    }

    function  addWordToDictionary($word){
        $md5HashString = $this->computeMd5Hash($word);
        $this->dictionary[] = $word;
        $wordHashArray = array($word=>$md5HashString);
    }

    function removeWordFromDictionary($word){
        $i = 0;
        for($i = 0; $i < count($this->dictionary); $i++){
            if($word == $this->dictionary[$i]){
                unset($this->dictionary[$i]);
                print("Word \"".$word."\" removed at index : ".$i."\n");
            }
        }
    }

    function searchDictionaryForWord($word){
        $i = 0;
        for($i; $i < count($this->dictionary); $i++){
            if($word == $this->dictionary[$i]){
                print($word." found at index: ".$i."\n");
                return true;
            }

        }
        print("No matches for word ".$word." found in dictionary.");
    }

    function printDictionary(){
        $i = 0;
        for($i = 0; $i < count($this->dictionary); $i++){
            print($this->dictionary[$i]."\n");
        }
    }
    function phpPrintR(){
        print_r($this->dictionary);
    }

    function importDictionary($inputfile){
        $singleline = fopen($inputfile, 'r');
//while not at the end of file
        while(!feof($singleline)){
            $wordtohash = fgets($singleline);
            $wordhash = $this->computeMd5Hash($wordtohash);
            $hashfile = fopen('rainbow.txt','a');
//writes the md5 hash of current word and closes file.
            fwrite($hashfile,"\n$wordhash");
            fclose($hashfile);
        }
        fclose($singleline);
    }

        function searchRainbowTable($md5in){
        $md5text = fopen('rainbow.txt','r');
        $plaintext = fopen('dictionary.txt','r');
        while (!feof($md5text)){
            $line = fgets($md5text);
            $line = str_replace('\n','',$line);
            if(strcmp($md5in,$line == 0)){
                while (!feof($plaintext)){
                    $plainHashed = fgets($plaintext);
                    $plainHashed = str_replace('\n','', $plainHashed);
                    if(strcmp(md5($plainHashed), $md5in) == 0){
                        print("Md5 hash match found for: ".$md5in);
                        print("Word: ".$plainHashed);
                        return true;
                    }
                }
            }
        }
        fclose($md5text);
        fclose($plaintext);
        print("Match not found");
        return false;
    }
}
?>