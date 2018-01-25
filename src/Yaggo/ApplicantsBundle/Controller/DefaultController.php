<?php

namespace Yaggo\ApplicantsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YaggoApplicantsBundle:Default:index.html.twig');
    }
}
