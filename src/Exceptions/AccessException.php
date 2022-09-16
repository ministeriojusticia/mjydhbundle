<?php

/**
  *     Clase que hereda de "MjydhException" y se utilizará si se presenta algun tipo de error de acceso a un sistema
  *  y/ó a información.
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


final class AccessException extends MjydhException
{
    public function __construct(string $message, ?string $title, ?mixed $data)
    {
        parent::__construct($message,  $title,  $data, parent::$ACCESS);
    }
}