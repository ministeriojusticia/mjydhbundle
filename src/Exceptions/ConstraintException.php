<?php

/**
  *     Clase que hereda de "MjydhException" y se deberá utilizar cuando se produzca un error de restricción, ya sea
  *  al momento de crear una instancia, consulta a la BD, etc.
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


final class ConstraintException extends MjydhException
{
    public function __construct(string $message, ?string $title, ?mixed $data)
    {
        parent::__construct($message,  $title,  $data, parent::$CONSTRAINT);
    }
}