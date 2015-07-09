<?php

namespace tabelaPhaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use tabelaPhaBundle\Entity\Tabela;
use tabelaPhaBundle\Form\TabelaType;

/**
 * Tabela controller.
 *
 */
class TabelaController extends Controller
{

    /**
     * Lists all Tabela entities.
     *
     */
    public function indexAction($letra)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('tabelaPhaBundle:Tabela')->findByLetra($letra);

        return $this->render('tabelaPhaBundle:Tabela:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Tabela entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tabela();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tabelaPha_show', array('id' => $entity->getId())));
        }

        return $this->render('tabelaPhaBundle:Tabela:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tabela entity.
     *
     * @param Tabela $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tabela $entity)
    {
        $form = $this->createForm(new TabelaType(), $entity, array(
            'action' => $this->generateUrl('tabelaPha_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tabela entity.
     *
     */
    public function newAction()
    {
        $entity = new Tabela();
        $form   = $this->createCreateForm($entity);

        return $this->render('tabelaPhaBundle:Tabela:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tabela entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tabelaPhaBundle:Tabela')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tabela entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('tabelaPhaBundle:Tabela:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tabela entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tabelaPhaBundle:Tabela')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tabela entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('tabelaPhaBundle:Tabela:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tabela entity.
    *
    * @param Tabela $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tabela $entity)
    {
        $form = $this->createForm(new TabelaType(), $entity, array(
            'action' => $this->generateUrl('tabelaPha_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tabela entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('tabelaPhaBundle:Tabela')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tabela entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tabelaPha_edit', array('id' => $id)));
        }

        return $this->render('tabelaPhaBundle:Tabela:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tabela entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('tabelaPhaBundle:Tabela')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tabela entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tabelaPha'));
    }

    /**
     * Creates a form to delete a Tabela entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tabelaPha_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
