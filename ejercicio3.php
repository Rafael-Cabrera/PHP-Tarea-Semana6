<?php
/*
Ejercicio 3:
Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.
Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator.
*/

// Paso 1: Clase base Personaje (Componente)
abstract class Personaje {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    abstract public function atacar();
    public function getNombre() {
        return $this->nombre;
    }
}

// Paso 2: Clases concretas de personajes (Componentes)
class Guerrerito extends Personaje {
    public function atacar() {
        return $this->nombre . " ataca con su fuerza bruta.";
    }
}

class Arquerito extends Personaje {
    public function atacar() {
        return $this->nombre . " ataca con su arco y flechas.";
    }
}

// Paso 3: Decorador (Clase base de Decorador)
abstract class ArmaDecorator extends Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        parent::__construct($personaje->getNombre());
        $this->personaje = $personaje;
    }

    abstract public function atacar();
}

// Paso 4: Decoradores concretos (Armas)
class Espadita extends ArmaDecorator {
    public function atacar() {
        return $this->personaje->atacar() . " ¡Usando una Espadita!";
    }
}

class Hachita extends ArmaDecorator {
    public function atacar() {
        return $this->personaje->atacar() . " ¡Con un Hachita poderosa!";
    }
}

class Arquito extends ArmaDecorator {
    public function atacar() {
        return $this->personaje->atacar() . " ¡Con un Arquito de gran alcance!";
    }
}

// Paso 5: Crear los personajes y decorarlos con armas
$Guerrerito = new Guerrerito("Conan");
$GuerreritoConEspadita = new Espadita($Guerrerito);
$GuerreritoConHachita = new Hachita($Guerrerito);

$Arquerito = new Arquerito("Legolas");
$ArqueritoConArquito = new Arquito($Arquerito);

// Paso 6: Mostrar los ataques
echo $Guerrerito->atacar() . "<br>"; // Guerrerito sin arma
echo $GuerreritoConEspadita->atacar() . "<br>"; // Guerrerito con Espadita
echo $GuerreritoConHachita->atacar() . "<br>"; // Guerrerito con Hachita

echo $Arquerito->atacar() . "<br>"; // Arquerito sin arma
echo $ArqueritoConArquito->atacar() . "<br>"; // Arquerito con Arquito

?>