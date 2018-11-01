<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    
    public function indexAction() {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * Homepage
     * 
     * There is no access condition to this page/ Il n'y a aucune condition d'accès à cette page
     */
    public function homepageAction() {
        return $this->render('default/homepage.html.twig');
    }
    
    /**
     * login_ok/login_success
     * 
     * 
     */
    public function showInfoPersonAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->homepageTableArray();
        return $this->render('default/login_success.html.twig', ['controller_name' => 'DefaultController',
                    'interventions' => $interventions]);
      
    }
}
