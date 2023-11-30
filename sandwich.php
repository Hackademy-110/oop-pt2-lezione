<?php

abstract class Bread
{
    abstract public function breadType();
}

class WhiteBread extends Bread
{

    public function breadType()
    {
        echo "- Tipo di pane: pane bianco \n";
    }
}

class Baguette extends Bread
{
    public function breadType()
    {
        echo "- Tipo di pane: baguette \n";
    }
}

class NutBread extends Bread
{
    public function breadType()
    {
        echo "- Tipo di pane: pane alle noci \n";
    }
}

abstract class Protein
{
    abstract public function proteinType();
}

class Mortadella extends Protein
{
    public function proteinType()
    {
        echo "Proteina: Mortadella \n";
    }
}

class TunaTartare extends Protein
{
    public function proteinType()
    {
        echo "Proteina: Tartare di tonno \n";
    }
}

class Tofu extends Protein
{
    public function proteinType()
    {
        echo "Proteina: tofu di piselli \n";
    }
}
class Frittata extends Protein
{
    public function proteinType()
    {
        echo "Proteina: frittata \n";
    }
}
// $omelette = new Frittata();
abstract class Dressing
{
    abstract public function dressingType();
}

class YogurtDressing extends Dressing
{
    public function dressingType()
    {
        echo "- Salsa: salsa allo yogurt \n";
    }
}
class OWW extends Dressing
{
    public function dressingType()
    {
        echo "-Salsa: salsa old wild west \n";
    }
}

class OlivePate extends Dressing
{
    public function dressingType()
    {
        echo "-Salsa: patè di olive \n";
    }
}
//! DEPENDENCY INJECTION    - iniezione di dipendenze 
//! object composition
class Sandwich
{
    public $bread, $protein, $dressing;

    public function __construct(Bread $pane, Protein $proteina, Dressing $salsa) //type hinting
    {
        $this->bread = $pane;
        $this->protein = $proteina;
        $this->dressing = $salsa;
    }

    public function printBread()
    {
        // $pane = $this->bread;
        // $pane->breadType();
        //!FLUENT INTERFACE
        $this->bread->breadType();
    }
    public function printProtein()
    {
        $this->protein->proteinType();
    }

    public function printDressing()
    {
        $this->dressing->dressingType();
    }
}
$pane = new Baguette();
$tofu = new Tofu();
$pate = new OlivePate();

$panino = new Sandwich($pane, $tofu, $pate);
//echo " il mio panino è condito con $panino->dressing, ha il pane $panino->bread e ha dentro $panino->protein \n";var
// var_dump($panino);

$panino2 = new Sandwich(new NutBread(), new Mortadella(), new YogurtDressing());
// var_dump($panino2);
// $panino->dressingType();
$panino->printBread();
$panino2->printBread();
$panino->printDressing();
$pane2 = new NutBread();
$panino3 = new Sandwich($pane2, new Mortadella(), new YogurtDressing());
var_dump($panino2, $panino);
