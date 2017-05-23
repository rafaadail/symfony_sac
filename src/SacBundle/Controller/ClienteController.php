<?php
namespace SacBundle\Controller;

use SacBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;



class ClienteController extends Controller
{

    /**
     * @Route("/cliente",name="cliente_index")
     */
    public function clienteIndex(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT a FROM SacBundle:Cliente a";

        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );


        return $this->render('SacBundle:Cliente:cliente.html.twig',[
            'clientes' =>  $result
        ]);

    }



    /**
     * @Route("cliente/create", name="cliente_create")
     */
    public function createAction(Request $request)
    {

        $cliente = new Cliente();

        $form = $this->createFormBuilder($cliente)
            ->add('email', TextType::class,array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label' => 'Cadastrar Cliente','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $email = $form['email']->getData();

            $cliente->setEmail($email);
            $cliente->setDataCriacao(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            $this->addFlash('notice','Cliente Cadastrado!');

            return $this->redirectToRoute('cliente_index');

        }

        return $this->render('SacBundle:Cliente:form.html.twig', array(
            'form' => $form->createView(),
        ));

    }

}