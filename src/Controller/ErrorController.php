<?php
namespace  MjydhBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Bundle\Bundle;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ErrorController extends AbstractController
{
    //Codifico los Errores
    Private  $codError=['400'=>'Requerimiento Equivocado',
                        '401'=>'Usuario NO Autorizado',
                        '403'=>'Acceso NO Permitido',
                        '404'=>'Página NO Encontrada',
                        '500'=>'Error de Servidor',
                        '503'=>'El Servidor NO está Disponible'
                        ];


    public function index(HttpExceptionInterface $exception): Response
    {       
        
        if(isset($this->codError[$exception->getStatusCode()])){

            $mensaje = $this->codError[$exception->getStatusCode()];
        }else{
            $mensaje = $exception->getMessage();
        }
        
        return $this->render('error/error.html.twig',
                                ['errorNum'=>$exception->getStatusCode(),
                                 'mensaje'=>$mensaje]);
    }
}
