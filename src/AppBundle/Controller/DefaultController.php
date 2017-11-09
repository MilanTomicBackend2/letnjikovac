<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Message;
use AppBundle\Form\MessageType;


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
        return $this->render('front/dogadjaji.html.twig');
    }

    /**
     * @Route("/galerija", name="galerija")
     */
    public function galleryAction() {
        return $this->render('front/galerija.html.twig');
    }

    /**
     * @Route("/kontakt", name="kontakt")
     */
    public function contactAction(Request $request) {


        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        

        if ($request->isMethod(Request::METHOD_POST)) {

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $message = $form->getData();
                $em   = $this->getDoctrine()->getManager();
                $em->persist($message); 
                $em->flush();
            }
  
            return $this->redirectToRoute('kontakt');
        }

        return $this->render('front/kontakt.html.twig'
                        , array(
                    'form' => $form->createView()
                        )
        );
    }

}
