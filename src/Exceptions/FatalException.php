<?php

/**
  *     Clase que hereda de "MjydhException" y se empleará cuando se detete alguna incosistencia, error o valides con
  *  uno o varios datos.
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


final class FatalException extends MjydhException
{
    public function __construct(string $message, ?string $title, ?mixed $data)
    {
        parent::__construct($message,  $title,  $data, parent::$FATAL);
    }
}