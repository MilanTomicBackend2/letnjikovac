<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Message;
use AppBundle\Entity\Event;
use AppBundle\Entity\Gallery;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;






class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction() {
        return $this->render('front/index.html.twig');
    }

    /**
     * @Route("/onama", name="onama")
     */
    public function aboutAction() {
        return $this->render('front/onama.html.twig');
    }

    /**
     * @Route("/dogadjaji", name="dogadjaji")
     */
    public function eventAction() {
        
        $em        = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Event::class)->findAll();
        return $this->render('front/dogadjaji.html.twig', array(
                    'event' => $event
                        ));
    }

    /**
     * @Route("/galerija", name="galerija")
     */
    public function galleryAction() {
         $em        = $this->getDoctrine()->getManager();
        $gallery = $em->getRepository(Gallery::class)->findAll();
        return $this->render('front/galerija.html.twig', array(
                    'gallery' => $gallery
                        ));
    }

     /**
     * Creates a new message entity.
     *
     * @Route("/kontakt", name="kontakt")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $message = new Message();
        $form = $this->createForm('AppBundle\Form\MessageType', $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('kontakt', array('id' => $message->getId()));
        }

        return $this->render('front/kontakt.html.twig', array(
            'message' => $message,
            'form' => $form->createView(),
        ));
    }

}
