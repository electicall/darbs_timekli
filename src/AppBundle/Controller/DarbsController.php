<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DarbsController extends Controller
{
    /**
     * @Route("/woch", name="index_woch")
     */
    public function indexAction(Request $request)
    {
        return $this->render('woch/index.html.twig');
    }

    /**
     * @Route("/woch/preces", name="preces_woch")
     */
    public function precesAction(Request $request)
    {
        return $this->render('woch/preces.html.twig');
    }

    /**
     * @Route("/woch/ziedojumi", name="ziedojumi_woch")
     */
    public function ziedojumiAction(Request $request)
    {
        $ziedojumi=$this->getDoctrine()
            ->getRepository('AppBundle:charity')
            ->findAll();

        return $this->render('woch/ziedojumi.html.twig', array(
                'ziedojumi' => $ziedojumi
            ));
    }
     /**
     * @Route("/woch/ziedo/{id}", name="register_woch")
     */
    public function ziedoAction($id, Request $request)
    {
        return $this->render('woch/ziedo.html.twig');
    }
    /**
     * @Route("/woch/admin", name="admin_woch")
     */
    public function adminAction(Request $request)
    {
        return $this->render('woch/admin.html.twig');
    }
    /**
     * @Route("/woch/login", name="login_woch")
     */
    public function loginAction(Request $request)
    {
        return $this->render('woch/login.html.twig');
    }
    /**
     * @Route("/woch/register", name="register_woch")
     */
    public function registerAction(Request $request)
    {
        return $this->render('woch/register.html.twig');
    }
}
