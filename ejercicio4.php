<?php

/*
Ejercicio 4:
Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, como por consola, formato JSON y archivo TXT. Debes crear un programa donde se muestren todos estos tipos de salidas.

Paso 1: Crear la interfaz de la estrategia
Lo primero es definir una interfaz común para todas las estrategias, que debe tener un método imprimir($mensaje) que será implementado por cada clase de estrategia.
*/

interface EstrategiaSalida {
    public function imprimir($mensaje);
}

/*
Paso 2: Implementar las estrategias concretas
A continuación, creamos clases para cada tipo de salida que implementen la interfaz EstrategiaSalida.

EstrategiaConsola: Imprime el mensaje en la consola.
EstrategiaJSON: Imprime el mensaje en formato JSON.
EstrategiaTXT: Imprime el mensaje en un archivo de texto.
*/

class EstrategiaConsola implements EstrategiaSalida {
    public function imprimir($mensaje) {
        echo "Consola: " . $mensaje . PHP_EOL;
    }
}

class EstrategiaJSON implements EstrategiaSalida {
    public function imprimir($mensaje) {
        echo json_encode(["mensaje" => $mensaje]) . PHP_EOL;
    }
}

class EstrategiaTXT implements EstrategiaSalida {
    public function imprimir($mensaje) {
        file_put_contents('mensaje.txt', $mensaje . PHP_EOL, FILE_APPEND);
        echo "Mensaje guardado en archivo TXT." . PHP_EOL;
    }
}

/*
Paso 3: Crear el contexto
El contexto es el que utilizará una estrategia de salida. En este caso, creamos una clase ManejadorSalida que seleccionará y usará la estrategia adecuada.
*/

class ManejadorSalida {
    private $estrategia;

    // Establecer la estrategia
    public function setEstrategia(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    // Usar la estrategia para imprimir el mensaje
    public function imprimir($mensaje) {
        $this->estrategia->imprimir($mensaje);
    }
}

*/
Paso 4: Usar el patrón de diseño Strategy
Finalmente, en el script principal, instanciamos el contexto ManejadorSalida y le asignamos la estrategia deseada.
*/

// Incluir las clases anteriores (puedes incluirlas mediante include o require)

// Crear el manejador de salida
$manejador = new ManejadorSalida();

// Imprimir mensaje en consola
$manejador->setEstrategia(new EstrategiaConsola());
$manejador->imprimir("Este es un mensaje en consola.");

// Imprimir mensaje en formato JSON
$manejador->setEstrategia(new EstrategiaJSON());
$manejador->imprimir("Este es un mensaje en JSON.");

// Imprimir mensaje en archivo TXT
$manejador->setEstrategia(new EstrategiaTXT());
$manejador->imprimir("Este es un mensaje en archivo TXT.");

?>