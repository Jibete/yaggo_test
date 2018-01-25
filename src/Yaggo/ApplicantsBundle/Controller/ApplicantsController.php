<?php

namespace Yaggo\ApplicantsBundle\Controller;

use Yaggo\ApplicantsBundle\Entity\Applicants;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Applicant controller.
 *
 */
class ApplicantsController extends Controller
{
    /**
     * Lists all applicant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $applicants = $em->getRepository('YaggoApplicantsBundle:Applicants')->findAll();

        return $this->render('applicants/index.html.twig', array(
            'applicants' => $applicants,
        ));
    }

    /**
     * Creates a new applicant entity.
     *
     */
    public function newAction(Request $request)
    {
        $applicant = new Applicants();
        $form = $this->createForm('Yaggo\ApplicantsBundle\Form\ApplicantsType', $applicant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($applicant);
            $em->flush();

            return $this->redirectToRoute('applicants_show', array('aId' => $applicant->getAid()));
        }

        return $this->render('applicants/new.html.twig', array(
            'applicant' => $applicant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a applicant entity.
     *
     */
    public function showAction(Applicants $applicant)
    {
        $deleteForm = $this->createDeleteForm($applicant);

        return $this->render('applicants/show.html.twig', array(
            'applicant' => $applicant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing applicant entity.
     *
     */
    public function editAction(Request $request, Applicants $applicant)
    {
        $deleteForm = $this->createDeleteForm($applicant);
        $editForm = $this->createForm('Yaggo\ApplicantsBundle\Form\ApplicantsType', $applicant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('applicants_edit', array('aId' => $applicant->getAid()));
        }

        return $this->render('applicants/edit.html.twig', array(
            'applicant' => $applicant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a applicant entity.
     *
     */
    public function deleteAction(Request $request, Applicants $applicant)
    {
        $form = $this->createDeleteForm($applicant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($applicant);
            $em->flush();
        }

        return $this->redirectToRoute('applicants_index');
    }

    /**
     * Creates a form to delete a applicant entity.
     *
     * @param Applicants $applicant The applicant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Applicants $applicant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('applicants_delete', array('aId' => $applicant->getAid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
