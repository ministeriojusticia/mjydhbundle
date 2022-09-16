# Ministerio de Justicia y Derecho Humanos.

## Configuración del bundle

config\packages\twig.yaml

```
twig:
    paths:
        '%kernel.project_dir%/vendor/mjydh/MjydhBundle/src/Resources/views': MjydhBundle
```

## Repositorio 

https://git.santafe.gov.ar/mjydh/mjydhbundle

    
## Instalación del paquete, por ahora la instalación se realiza manualmente.

1 - Descargar el proyecto desde https://git.santafe.gov.ar/mjydh/mjydhbundle <br>
2 - crear la carpeta mjydh dentro de vendor (sino existe) y colocar el paquete descargado dentro de la carpeta **mjydh**. <br>
3 - agregar en el autoload / psr-4 del composer.json del proyecto la referencia al paquete 

```json
"autoload": {
        "psr-4": {
        "MJYDH\\MJYDHBundle\\": "vendor/mjydh/mjydh/MjydhBundle"
    },
},
```

4 - ejecutar <br>
```bash
composer dump-autoload -o
```

En caso de no poder ejecutar el dump-autoload (como sucede en adminformel y formularioelectronico), se debe agregar en \vendor\composer\autoload_psr4.php la siguiente linea
```php
'MJYDH\\MJYDHBundle\\' => array($vendorDir . '/mjydh/MjydhBundle'),
```

5 - Symfony < 3.4 Agregar en el AppKernel.php<br>

```php
new MJYDH\MjydhBundle\MjydhBundle(),
```
5 - Symfony > 4 Agregar en el config/bundles.php<br>

```php
MJYDH\MjydhBundle\MjydhBundle::class=>['all'=>true]
```

## Como implementarlo

```php
use Exception;


/**
  *  Clase general de la cual heredan las restantes.
  */
use MJYDH\MjydhBundle\Exceptions\MjydhException;


/**
  *  Clases heredadas.
  */
use MJYDH\MjydhBundle\Exceptions\AccessException;       //    Se utilizará para capturar errores de accesos.

use MJYDH\MjydhBundle\Exceptions\ConstraintException;   //    Empleada para atrapar las violaciones de restricción.

use MJYDH\MjydhBundle\Exceptions\ValidException;        //    Destinada a las validaciones de datos.

use MJYDH\MjydhBundle\Exceptions\FatalException;        //    Se debe usar para los errores irrecuperables.

use MJYDH\MjydhBundle\Exceptions\NotFoundException;     //    Se aplica cuando no puede obtener o producir la información
                                                        // requerida.

try
{
    ...

    /* Aca va un código muy importante */
    
    ...
}
}
catch (AccessException $ae)
    { /* Se hace algo con la información del error */ }
catch (ConstraintException $ce)
    { /* Se hace algo con la información del error */ }
catch (ValidException $ve)
    { /* Se hace algo con la información del error */ }
catch (FatalException $fe)
    { /* Se hace algo con la información del error */ }
catch (NotFoundException $ne)
    { /* Se hace algo con la información del error */ }
catch (MjydhException $me)
{
    /* Se emplea en el caso de que no sea necesario detectar el tipo de las excepciones anteriores */

    $ejemplo = array($me->getTitle(),
                     $me->getMessage(),
                     $me->getCode(),
                     $me->getData());
    
    return $ejemplo;
}
catch (Exception $e)
    { /* No se pudo capturar con ninguna de las anteriores */ }

```
