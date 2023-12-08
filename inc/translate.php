<?php
/*
Module de traduction
---------------------
 - Gére un lexique de traduction
 - Renvoie une traduction à partir de la global "$lang"
 
*/
require_once("inc/localisation.php");

class Lexique {
    private $lexique = [];
    private $needSave = false;
    private $fileName = "";
    private $langs = [];

    public function __construct(string $fileName, array $langs)
    {
        if(file_exists($fileName)) {
            $json = file_get_contents($fileName);
            $this->lexique = json_decode($json,true);
        } else {
            $file = fopen($fileName, "w");
            fclose($file);
        }
        $this->fileName = $fileName;
        $this->langs    = $langs;
    }

    function submitKey(string $key ): void
    {
        if (!array_key_exists($key,$this->lexique)) {
            $this->needSave = true; 
            
            foreach($this->langs as $lang) {
                $this->lexique[$key][$lang] = $key;
            }
        }
    }

    function getLexiqueItem(string $key, string $lang)
    {
        $this->submitKey($key);
        return $this->lexique[$key][$lang];
    }

    function save(): void {
        if ($this->needSave) {
            $data = json_encode($this->lexique);
            file_put_contents($this->fileName, $data);
            $this->needSave = false;
            echo "fichier mis à jour";
        }
    }
    
}

$lexique = new Lexique('lexique.json', $langs);

$getLexiqueItem = function(string $key) use($lang): string {
    return $this->getLexiqueItem($key, $lang);
};
$save = function() {
    return $this->save();
};

$t = Closure::bind($getLexiqueItem, $lexique,'Lexique');
$t_save = Closure::bind($save, $lexique,'Lexique');

