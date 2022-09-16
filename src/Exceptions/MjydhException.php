<?php

/**
  *     Clase que centraliza las excepciones que posiblemente se presentarán en MJYDH.
  *  
  *  @author    Gustavo Campos  <gcampos@santafe.gov.ar>
  *  @author    Gustavo Sánchez <sanchezg@santafe.gov.ar>
  *  
  *  @package   MjydhException
  *  @version   1.0.0
  *  @access    public
  *  
  *  @copyright 2022 Ministerio de Gobierno, Justicia y Derechos Humanos.
  */

namespace MjydhBundle\Exceptions;

use Exception;


class MjydhException extends Exception
{
    /**
      *  Listado de valores (constantes) que se emplearán para la asignación de código personalizado de excepción.
      */
    public static $FATAL      = 40000;  // Errores fatales.
    public static $VALID      = 50000;  // Errores de validación.
    public static $ACCESS     = 60000;  // Errores de acceso.
    public static $NOTFOUND   = 70000;  // Errores donde no se encuentra dato.
    public static $CONSTRAINT = 80000;  // Errores al intentar crear instancias.

    /**
      *  @var   string      Titulo que identificará el problema.
      */
    protected $title = null;

    /**
      *  @var   mixed       Conjunto de datos podrían ayudar a detectar el problema, si se establece.
      */
    protected $data = null;


    public function __construct(string $message, ?string $title, ?mixed $data, int $code = 0)
    {
        parent::__construct($message, $code);

        $this->title = $title;
        $this->data = $data;
    }

    public function __destruct()
    {
        $this->title = null;
        $this->data = null;
    }


    public function __toString(): string
        { return __CLASS__ . ": [{$this->code}]: {$this->message} \n"; }


    public function getTitle(): string
        { return $this->title; }


    public function getData(): mixed
        { return $this->data; }
}