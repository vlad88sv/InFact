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
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxInventarioController extends Controller {
    
    private $session;
        
    private function inventarioVirtual_transaccion($data) {
        $this->session =  $this->get('session');
        
        // verifiquemos si ya esta, y entonces sumamos.
        $cantidadActual = $this->session->get('inventarioVirtual/inventario/'.$data['id'].'/transaccion/cantidad', 0);
        $data['transaccion']['cantidad'] = ( $cantidadActual + 1);
        
        $this->session->set('inventarioVirtual/inventario/'.$data['id'], $data);
        $this->session->set('inventarioVirtual/ultimaModificacion', $data['id']);
        $this->session->save();
    }
    
    private function inventarioVirtual_remover($id) {
        return $this->session->remove('inventarioVirtual/inventario/'.$id);
    }
    
    private function inventarioVirtual_deshidratar() {
        $this->session =  $this->get('session');
        return $this->session->remove('inventarioVirtual');
    }
    
    private function inventarioVirtual_hidratar() {
        $this->session =  $this->get('session');
        return $this->session->get('inventarioVirtual');
    }
    
    private function inventarioVirtual_persistir() {
        $this->session =  $this->get('session');
        
        
        
        // Finalmente eliminamos el inventario virtual
        $this->inventarioVirtual_deshidratar();
    }
    
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
        
        // Si no se encontró el registro
        if (!is_array($data)) {
            
            return new JsonResponse(array('error'=> 'noEncontrado', 'titulo' => '*ERROR*', 'descripcion' => 'No se encontró el ' . $metodoDescripcion .' '.$valor, 'resultado' => 'error'));
            
        }
        
        //Añadamoslo a nuestro inventario en sesion
        $this->inventarioVirtual_transaccion($data);

        // Si lo encontramos entonces rehidratamos todo el inventario
        return new JsonResponse($this->inventarioVirtual_hidratar());
        
    }
    
    public function eliminarInventarioVirtualAction() {
        $this->inventarioVirtual_deshidratar();
        return new JsonResponse(['resultado' => 'exito']);
    }

    public function cargarInventarioVirtualAction() {
        return new JsonResponse($this->inventarioVirtual_hidratar());
    }

    public function obtenerProductoPorCodigoBarraAction( $operacion, $codigoBarra ) {
        $this->session =  $this->get('session');
        $this->session->set('inventarioVirtual/operacion' , $operacion);
        
        return $this->obtenerProducto('codigoBarra','código de barra', $codigoBarra);
    }
    
    public function obtenerProductoPorIdAction( $id ) {
        return $this->obtenerProducto('id','id de articulo', $codigoBarra);
    }
    
    public function procesarInventarioVirtualAction() {
        $this->inventarioVirtual_persistir();
        return new JsonResponse(['resultado' => 'exito']);
    }
    
    public function cargarInventario($idInventario) {}
}
