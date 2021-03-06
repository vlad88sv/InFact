<?php

namespace Qualium\InFact\AmalgamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $securityContext = $this->container->get('security.context');
       
        if( $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED') ){
            return $this->render('QualiumInFactAmalgamaBundle:Default:index.autorizado.html.twig');
        } else {
            return $this->render('QualiumInFactAmalgamaBundle:Default:index.html.twig');
        }
        
    }
    
    public function inventarioIndexAction($operacion) {
        
        $this->session =  $this->get('session');
        
        $operacion_abierta = (string) $this->session->get('inventarioVirtual/operacion', $operacion);
              
        if ( $operacion_abierta !== $operacion ) {
            return $this->render('QualiumInFactAmalgamaBundle:Default:herramienta_inventario_negado.html.twig', ['operacion_abierta' => $operacion_abierta, 'operacion_deseada' => $operacion]);
        }
        
        return $this->render('QualiumInFactAmalgamaBundle:Default:herramienta_inventario.html.twig', ['operacion' => $operacion]);
    }
}
