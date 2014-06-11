<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author vladimir
 */

namespace Qualium\InFact\AmalgamaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AjaxController extends Controller{
       
    private function obtenerProducto( $metodo, $metodoDescripcion, $valor ) {
        
        $em = $this->getDoctrine()->getManager();
        
        
        
        switch ($metodo) {
            case 'codigoBarra':
                $query = $em->createQueryBuilder()->select('i')->from('QualiumInFactAmalgamaBundle:Inventario','i')->where('i.codigoBarra = :valor')->setParameter('valor', (string) $valor)->getQuery();
                break;
            case 'id':
            default:
                $query = $em->createQueryBuilder()->select('i')->from('QualiumInFactAmalgamaBundle:Inventario','i')->where('i.id = :valor')->setParameter('valor', (int) $valor)->getQuery();
                break;
        }
                                     
        $data = $query->getOneOrNullResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
        
        if (!is_array($data)) {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array('nombre' => '*ERROR*', 'descripcion' => 'No se encontró el ' . $metodoDescripcion .' '.$valor, 'resultado' => 'error'));
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse($data);
        
    }
    
    public function obtenerProductoPorCodigoBarraAction( $codigoBarra ) {
        return $this->obtenerProducto('codigoBarra','código de barra', $codigoBarra);
    }
    
    public function obtenerProductoPorIdAction( $id ) {
        return $this->obtenerProducto('id','id de articulo', $codigoBarra);
    }
}
