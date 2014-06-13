<?php

namespace Qualium\InFact\AmalgamaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Qualium\InFact\AmalgamaBundle\Entity\InventarioDependencia;
use Qualium\InFact\AmalgamaBundle\Form\InventarioDependenciaType;

/**
 * InventarioDependencia controller.
 *
 */
class InventarioDependenciaController extends Controller
{

    /**
     * Lists all InventarioDependencia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('QualiumInFactAmalgamaBundle:InventarioDependencia')->findAll();

        return $this->render('QualiumInFactAmalgamaBundle:InventarioDependencia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new InventarioDependencia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new InventarioDependencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_inventario_dependencia_show', array('id' => $entity->getId())));
        }

        return $this->render('QualiumInFactAmalgamaBundle:InventarioDependencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a InventarioDependencia entity.
    *
    * @param InventarioDependencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(InventarioDependencia $entity)
    {
        $form = $this->createForm(new InventarioDependenciaType(), $entity, array(
            'action' => $this->generateUrl('admin_inventario_dependencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new InventarioDependencia entity.
     *
     */
    public function newAction()
    {
        $entity = new InventarioDependencia();
        $form   = $this->createCreateForm($entity);

        return $this->render('QualiumInFactAmalgamaBundle:InventarioDependencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a InventarioDependencia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QualiumInFactAmalgamaBundle:InventarioDependencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InventarioDependencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QualiumInFactAmalgamaBundle:InventarioDependencia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing InventarioDependencia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QualiumInFactAmalgamaBundle:InventarioDependencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InventarioDependencia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('QualiumInFactAmalgamaBundle:InventarioDependencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a InventarioDependencia entity.
    *
    * @param InventarioDependencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InventarioDependencia $entity)
    {
        $form = $this->createForm(new InventarioDependenciaType(), $entity, array(
            'action' => $this->generateUrl('admin_inventario_dependencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing InventarioDependencia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('QualiumInFactAmalgamaBundle:InventarioDependencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InventarioDependencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_inventario_dependencia_edit', array('id' => $id)));
        }

        return $this->render('QualiumInFactAmalgamaBundle:InventarioDependencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a InventarioDependencia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('QualiumInFactAmalgamaBundle:InventarioDependencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InventarioDependencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_inventario_dependencia'));
    }

    /**
     * Creates a form to delete a InventarioDependencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_inventario_dependencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
