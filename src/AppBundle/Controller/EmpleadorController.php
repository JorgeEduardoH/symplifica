<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Empleador;
use AppBundle\Form\EmpleadorType;

/**
 * Empleador controller.
 *
 * @Route("/empleador")
 */
class EmpleadorController extends Controller
{
    /**
     * Lists all Empleador entities.
     *
     * @Route("/", name="empleador_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empleadors = $em->getRepository('AppBundle:Empleador')->findAll();

        return $this->render('empleador/index.html.twig', array(
            'empleadors' => $empleadors,
        ));
    }

    /**
     * Creates a new Empleador entity.
     *
     * @Route("/new", name="empleador_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $empleador = new Empleador();
        $form = $this->createForm('AppBundle\Form\EmpleadorType', $empleador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleador);
            $em->flush();

            return $this->redirectToRoute('empleador_show', array('id' => $empleador->getId()));
        }

        return $this->render('empleador/new.html.twig', array(
            'empleador' => $empleador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Empleador entity.
     *
     * @Route("/{id}", name="empleador_show")
     * @Method("GET")
     */
    public function showAction(Empleador $empleador)
    {
        $deleteForm = $this->createDeleteForm($empleador);

        return $this->render('empleador/show.html.twig', array(
            'empleador' => $empleador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Empleador entity.
     *
     * @Route("/{id}/edit", name="empleador_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Empleador $empleador)
    {
        $deleteForm = $this->createDeleteForm($empleador);
        $editForm = $this->createForm('AppBundle\Form\EmpleadorType', $empleador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleador);
            $em->flush();

            return $this->redirectToRoute('empleador_edit', array('id' => $empleador->getId()));
        }

        return $this->render('empleador/edit.html.twig', array(
            'empleador' => $empleador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Empleador entity.
     *
     * @Route("/{id}", name="empleador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Empleador $empleador)
    {
        $form = $this->createDeleteForm($empleador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empleador);
            $em->flush();
        }

        return $this->redirectToRoute('empleador_index');
    }

    /**
     * Creates a form to delete a Empleador entity.
     *
     * @param Empleador $empleador The Empleador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Empleador $empleador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleador_delete', array('id' => $empleador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
