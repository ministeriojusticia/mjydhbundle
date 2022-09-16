<?php 

/**
  *     Clase de servicios para variables Globales TWIG
  *  
  *  @author Horacio Locatelli 
  *  @version 1.0.0
  *  @copyright 2022 Ministerio de Gobierno, Justicia y Derechos Humanos
  *  
  *  @access public
  */

namespace  MjydhBundle\Controller;

//use Twig\Environment;

use MJYDH\HttpClientBundle\Service\HttpClient;
use MJYDH\HttpClientBundle\Exception\HttpException;
use MJYDH\HttpClientBundle\Model\CatchExceptions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;



class mjdhService extends AbstractController
{
    private $ministerio=null;
    private $ministerio_corto=null;
    private $secretaria=null;
    private $version=null;
    private $sistema=null;
    private $description = null;
    private $urlMjdh;
    
    

    public function __construct(ContainerBagInterface $urlMjdh)
    {
        $this->urlMjdh = $urlMjdh;
        $this->buscoParametros();
        
    }

    public function buscoParametros(){

        $this->ministerio = $this->urlMjdh->get('app.ministerio');
        $this->ministerio_corto = $this->urlMjdh->get('app.ministerio.corto');
        $this->secretaria =  $this->urlMjdh->get('app.secretaria');
        $this->version = $this->urlMjdh->get('app.version');
        $this->nombre =$this->urlMjdh->get('app.nombre');
        
        try
            {

                $url=$this->urlMjdh->get('app.urlmjydh');
                $http = new HttpClient();
                $http->setHttpCodeResponses(array(200));
                $http->setCatchExceptions(array(502=> new CatchExceptions("Error 502", "titulo 502"), 
                                                0=> new CatchExceptions("Error 0")));
                $result = $http->Execute('GET', $url);  
                
                if(!empty($result)){
                    $value = json_decode($result->getBody());
                    //var_dump($value);
                    if(isset($value->ministerio)){ 
                        $this->ministerio = $value->ministerio;      
                        $this->ministerio_corto = $value->ministerio;                 
                        $this->version = $value->version;
                        $this->nombre = $value->nombre;
                        
                        
                    }
                    //var_dump($this->stafe);
                }        

            }
            catch (HttpException $ehttp){
                 // No necesito los errores 
                 
            }
    }

    public function getministerio(){
        return $this->ministerio;
    }
    public function getnombre(){
        return $this->nombre;
    }
    public function getsecretaria(){
        return $this->secretaria;
    }
    public function getversion(){
        return $this->version;
    }
    public function getsistema(){
        return $this->sistema;
    }
   
  
   
}