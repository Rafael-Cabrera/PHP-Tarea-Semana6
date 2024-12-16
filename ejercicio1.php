<?php 
/*
Ejercicio 1:
Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y velocidad. La creación de los personajes dependerá del nivel del juego:
- En el nivel fácil se creará un personaje "Esqueleto".
- En el nivel difícil se creará un personaje "Zombi".
Debes aplicar el patrón de diseño Factory para la creación de los personajes.¨
*/

// Interfaz Personaje
interface Personaje {
    public function atacar();
    public function velocidad();
}

// Clase Esqueleto
class Esqueletito implements Personaje {
    public function atacar() {
        return "El Esqueleto ataca con una espada.";
    }

    public function velocidad() {
        return "El Esqueleto tiene una velocidad baja.";
    }
}

// Clase Zombi
class Zombito implements Personaje {
    public function atacar() {
        return "El Zombi muerde a su oponente.";
    }

    public function velocidad() {
        return "El Zombi tiene una velocidad moderada.";
    }
}

?>