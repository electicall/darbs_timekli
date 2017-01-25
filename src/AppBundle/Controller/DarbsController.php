<?php

namespace AppBundle\Controller;


use AppBundle\Entity\users;
use AppBundle\Entity\basket;
use AppBundle\Entity\charity;
use AppBundle\Entity\charityhistory;
use AppBundle\Entity\products;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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
        $register = new users;

        $form = $this->createFormBuilder($register)
            ->add('name', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('lastname', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('username', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('password', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('email', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('role', ChoiceType::class, array('choices' => array('standart' => 'standart','super' => 'super', 'admin'=>'admin'),'attr' =>array( 'class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label'=>'Pievienot', 'attr' =>array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
                //dati uz db

            $name = $form['name']->getData();
            $lastname = $form['lastname']->getData();
            $username = $form['username']->getData();
            $password = $form['password']->getData();
            $email = $form['email']->getData();
            $role = $form['role']->getData();
            $createdate = new\DateTime('now');

            $register->setName($name);
            $register->setLastname($lastname);
            $register->setUsername($username);
            $register->setPassword(md5($password));
            $register->setEmail($email);
            $register->setRole($role);
            $register->setCreatedate($createdate);

            $datab=$this->getDoctrine()->getManager();

            $datab->persist($register);
            $datab->flush();

            $this->addFlash(
                'notice',
                'Lietotājs pievienots'
                );
            return $this->redirectToRoute('index_woch');
        }

        return $this->render('woch/register.html.twig', array (
            'form' => $form->createView()
            ));
    }
}
