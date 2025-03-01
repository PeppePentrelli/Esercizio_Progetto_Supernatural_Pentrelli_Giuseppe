<?php

//  Classe Genitore 

abstract class Personaggio implements attacco{ 
    
use Presentati;

    // Attributi
    
    public $Nome;
    public $Razza;
    public $Equipaggiamento;
    public $PuntiSalute;
    public $PuntiAttacco;
    public $FrasePersonaggio;
    
    // Costruttore
    
    public function __construct($nome,$razza, Equipaggiamento $equipaggiamento,$punti_salute, $punti_attacco,$frase_personaggio) { 
        $this->Nome = $nome;
        $this->Razza = $razza;
        $this->Equipaggiamento = $equipaggiamento;
        $this->PuntiSalute = $punti_salute + $equipaggiamento->AumentoPuntiSalute;
        $this->PuntiAttacco = $punti_attacco + $equipaggiamento->AumentoPuntiAttacco;
        $this->FrasePersonaggio= $frase_personaggio;
        
        
    } 
    
}

// Fine Classe Genitore



// Classe Cacciatore

class Umano extends Personaggio { 
    
    // Tratti
    
    use Mangia;
    
    // Attributi Cacciatore
    public $Eta;
    public $Cognome;
    public $Veicolo;
    public $Lavoro;
    
    // Costruttore e Metodi Umano
    
    public function __construct($nome,$razza,Equipaggiamento $equipaggiamento,$punti_salute,$punti_attacco,$frase_personaggio,$eta,$cognome,Veicolo $veicolo,$lavoro) { 
        
        parent::__construct($nome,$razza, $equipaggiamento,$punti_salute,$punti_attacco,$frase_personaggio,$eta,$cognome,$veicolo,$lavoro);
        $this->Eta = $eta;
        $this->Cognome = $cognome;
        $this->Veicolo = $veicolo;
        $this->Lavoro = $lavoro;
    }
    
    public function attacco() { 
        echo "Ciao sono un Cacciatore,ti sto attaccando e ti decapito!!\n";
    }
    
}

//Fine Classe Cacciatore


// Classe Aneglo

class Angelo extends Personaggio { 
    


    // Attributi Angelo
    public $Grazia;
    public $Ali;
    
    // Costruttore e Metodi Angelo
    
    public function __construct($nome,$razza,Equipaggiamento $equipaggiamento,$punti_salute,$punti_attacco,$frase_personaggio,$grazia,$ali) { 
        
        parent::__construct($nome,$razza,$equipaggiamento,$punti_salute,$punti_attacco,$frase_personaggio,$grazia,$ali);
        $this->Grazia = $grazia;
        $this->Ali = $ali;
    }
    
    public function attacco() { 
        echo "Ciao sono un angelo,ti sto attaccando e ti faccio il culo!!\n";
    }
    
  
}

// Fine Classe Aneglo


// Classe Arcangelo

class Arcangelo extends Angelo { 
    
    // Attributi Angelo

    public $LegameContenitore;
    public $PotereDivino;
    public $AbilitaSpeciale;
    public $Autorita;
    
    // Costruttore e Metodi Arcangelo
    
    public function __construct($nome,$razza,Equipaggiamento $equipaggiamento,$punti_salute,$punti_attacco,$frase_personaggio,$grazia,$ali,$legame_contenitore, $potere_divino,$abilita_speciale,$autorita) { 
        
        parent::__construct($nome,$razza, $equipaggiamento,$punti_salute,$punti_attacco,$frase_personaggio,$grazia,$ali);
        $this->LegameContenitore = $legame_contenitore;
        $this->PotereDivino = $potere_divino;
        $this->AbilitaSpeciale = $abilita_speciale;
        $this->Autorita = $autorita;


       
    }
    
    public function attacco() { 
        echo "Ciao sono un Arcangelo,'Schiocco di dita'\n";
    }


    
}

// Fine Classe Arcangelo

// Classe Veicoli

class Veicolo { 

    // Attributi di base
 public $Nome;
    public $Marca; 
    public $Modello; 
    public $Anno; 
    public $VelocitaMassima;
    public $Carburante; 
    public $CapacitaCarburante;
    public $Condizioni; 
    public $Descrizione;
    public $Resistenza;
    public $CapacitaCarico;
    public $Attacco; 
    public $Difesa; 
    public $Modifiche; 
    public $Proprietario; 

    // Costruttore
    public function __construct(
       $nome, $marca, $modello, $anno, $velocitaMassima,$carburante,$capacitaCarburante,$condizioni,$descrizione,$resistenza = 100,$attacco = 0,$difesa = 0,$modifiche = [], $proprietario = null
    ) {
        $this->Nome = $nome;
        $this->Marca = $marca;
        $this->Modello = $modello;
        $this->Anno = $anno;
        $this->VelocitaMassima = $velocitaMassima;
        $this->Carburante = $carburante;
        $this->CapacitaCarburante = $capacitaCarburante;
        $this->Condizioni = $condizioni;
        $this->Descrizione = $descrizione;
        $this->Resistenza = $resistenza;
        $this->Attacco = $attacco;
        $this->Difesa = $difesa;
        $this->Modifiche = $modifiche;
        $this->Proprietario = $proprietario;
}
}
// Classe Equipaggiamento

class Equipaggiamento {
    
    // Attributi 
    public $NomeArma;    
    public $DescrizioneArma;
    Public $AumentoPuntiSalute;
    Public $AumentoPuntiAttacco;
    
    
    
    public function __construct($nome_arma,$descrizione_arma,$aumento_punti_salute,$aumento_punti_attacco) { 
        
        
        $this->NomeArma = $nome_arma;
        $this->DescrizioneArma = $descrizione_arma;
        $this->AumentoPuntiSalute = $aumento_punti_salute;
        $this->AumentoPuntiAttacco = $aumento_punti_attacco;
        
    }
    
}

class Testa extends Equipaggiamento { 

  

    public function __construct() {


parent::__construct($nome_arma,$descrizione_arma,$aumento_punti_salute,$aumento_punti_attacco);

    }

}

// Fine Classe Equipaggiamento

// Interfacce

interface Attacco{
    
    public function attacco();
}

trait Mangia { 
    
    public function mangia() { 
        
        $this->PuntiSalute += 100;
        
    }

}
    trait Presentati { 

        public function presentati() { 

            echo "$this->FrasePersonaggio";
    


    }
    
}

// Istanze
 
// Umani

$Impala = new Veicolo("Chevrolet","Impala",67,"185KM/H","Benzina","70Litri","Perfette condizioni","L'auto di famiglia dei Winchester, usata per cacciare creature soprannaturali. Non toccarla se non vuoi farti uccidere da Dean Winchester",200,0,50,["Sedili in pelle", "Autoradio", "Portabagagli spazioso anti-demone"],"Dean Winchester");

$Dean = New Umano('Dean',"Umano",new Equipaggiamento('Revolver Colt',"La revolver Colt e una pistola in grado di uccidere qualsiasi, cosa Cavaglieri dell'inferno inclusi,occhio pero: Hai pochi colpi ;)",0,5000),100,200,"Sono Dean Winchester. Sono un cacciatore. Questo è quello che faccio.\n",22,"Winchester",$Impala,'Cacciatore');
$Dean->mangia();
var_dump($Dean);
$Dean->attacco();

$Sam = new Umano('Sam','Umano',new Equipaggiamento('Pugnale demoiaco'," il pugnale demoniaco è un'arma essenziale nell'arsenale dei fratelli Winchester,in grado di ammazzare demoni comuni",0,500),200,100,"Sono Sam Winchester. Non ho paura di te!\n","18","Winchester",$Impala,'Cacciatore');
var_dump($Sam);

$Bobby= new Umano('Bobby','Umano',new Equipaggiamento("Fucile anti-spettri","Fucile canne mozze caricato a palletoni di sale",0,100),100,100,"IDIOTA!!",61,'Singer',new Veicolo("Chevrolet","Pickup",1970,"160KM/H","benzina",90,"usato","Il fidato pickup di Bobby, usato per trasportare attrezzatura da caccia e altri oggetti.",150,0,70,["Cassone rinforzato", "Gancio traino", "Attrezzi da caccia"], "Bobby Singer"),'Cacciatore,Mentore');
var_dump($Bobby);


// Fine Umani


// Angeli 
$Castiel =  new Angelo('Castiel','Angelo',new Equipaggiamento('Lama Angelica',"La Lama Angelica è una lama in grado di uccidere definitvamente sia Angeli che Demoni ma non funziona su arcangeli,e ovviamente puo uccidere gli umani",0,200),500,300," Sono Castiel un angelo del Signore!\n",500,false);
var_dump($Castiel);

// Fine Angeli


// Inizio Arcangeli 
$LamaArcangela= new Equipaggiamento ('Schicco di dita','ad un arcangelo basta schioccare le dita per distruggere qualsiasi persona',0,2000);

$Gabriele = new Arcangelo("Gabriele","Arcangelo",new Equipaggiamento('Lama Angelica',"La Lama Angelica è una lama in grado di uccidere definitvamente sia Angeli che Demoni ma non funziona su arcangeli,e ovviamente puo uccidere gli umani",0,200),2000,1000,"La vita è un gioco, e io sono il maestro dei trucchi.\n",2000,true,100,2000,"Manipolazione della realtà",0);
var_dump($Gabriele);

$Lucifero = new Arcangelo("Lucifero","Arcangelo",$LamaArcangela,4000,5000,"Everybody sing this song, doodah, doodah,Well everybody sing this song all the doodah day
All the doodah day, all the doodah day\n",5000,true,100,4000,"Potere della luce","Comanda su tutti i demoni incutendo terrore");
var_dump($Lucifero);

// fine Arcangeli 



// Metodi delle Istanze 

$Castiel->attacco();
$Castiel->presentati();

$Gabriele->presentati();
$Lucifero->presentati();

$Dean->presentati();
$Sam->presentati();
$Bobby->presentati();



?>