<?php

/**
  *     Clase que hereda de "MjydhException" y se utilizará cuando no se pueda obtener información o producir un dato.
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


final class NotFoundException extends MjydhException
{
    public function __construct(string $message, ?string $title, ?mixed $data)
    {
        parent::__construct($message,  $title,  $data, parent::$NOTFOUND);
    }
}