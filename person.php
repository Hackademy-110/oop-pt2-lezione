<?php

//! TRAIT - TRATTO - permette di riutilizzare codice (estraneo) in classi diverse tra loro indipendenti
//PER ASSEGNARE UN TRAIT A UNA CLASSE KEYWORD USE + NOME TRAIT

trait JetPack
{
    public function fly()
    {
        echo "Ciao mamma, sto volando \n";
    }
}

//! CLASSE ASTRATTA - è un MODELLO per definire altre classi, in cui imposto delle IMPOSTAZIONI a livello generale che saranno utilizzate dalle classi figlie.
//keyword absract
// non  si possono instanziare oggetti di una classe astratta
abstract class Person
{
    use JetPack;

    public $name, $surname, $age;
    // public $surname;
    // public $age;
    // protected $id;

    public function __construct($nome, $cognome, $eta)
    {
        $this->name = $nome;
        $this->surname = $cognome;
        $this->age = $eta;
        // $this->id = $id;
    }

    // classi astratte hanno  METODI ASTRATTI
    abstract public function info(); //dichiarate ma non documentate, senza body - RENDIAMO OBBLIGATORIO QUESTO COMPORTAMENTO
}

class Student extends Person
{

    public $faveSubject;

    public function __construct($nome, $cognome, $eta, $materia)
    {
        parent::__construct($nome, $cognome, $eta);
        $this->faveSubject = $materia;
    }
    public function info()
    {
        echo "Nome: $this->name, Cognome: $this->surname, Età: $this->age, Materia Preferita: $this->faveSubject \n";
    }
}


class Teacher extends Person
{

    public $subject;

    public function __construct($nome, $cognome, $eta, $materia)
    {
        parent::__construct($nome, $cognome, $eta,);
        $this->subject = $materia;
    }
    public function info()
    {
        echo "Nome: $this->name, Cognome: $this->surname, Età: $this->age, Materia Insegnata: $this->subject \n";
    }
}

class Dog
{
    use JetPack;
}

$teacher = new Teacher('Mattia', 2, 3, 4);
$student = new Student('Mattia', 'Laiolo', 19, 'informatica');
$student->info();
$teacher->info();
$student->fly();
$teacher->fly();
