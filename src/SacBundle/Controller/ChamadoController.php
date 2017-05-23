<?php

namespace SacBundle\Controller;

use SacBundle\Entity\Chamado;
use SacBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class ChamadoController extends Controller
{

    /**
     * @Route("/chamado/view/{id}", name="chamado_visualizar")
     */
    public function viewAction($id){

        $em = $this->getDoctrine()->getManager();
        $chamado = $em->getRepository('SacBundle\Entity\Chamado')->find($id);

        return $this->render('SacBundle:Chamado:view.html.twig',[
            'chamado' => $chamado
        ]);

    }



    /**
     * @Route("/chamado", name="chamado_index")
     */
    public function oldchamadoIndex(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $idPedido = isset($_REQUEST['idPedido']) ? $_REQUEST['idPedido'] : '' ;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';

        if($idPedido or $email){
            if($idPedido && empty($email)) {
                $parameters = array(
                    'idPedido' => $idPedido

                );
                $dql = "SELECT ch FROM SacBundle:Chamado ch WHERE ch.idPedido = $idPedido";

            }elseif(empty($idPedido) && $email){

                $dql = "SELECT ch FROM SacBundle:Chamado ch WHERE ch.email = '{$email}'";

            }else{

                $dql = "SELECT ch FROM SacBundle:Chamado ch WHERE (ch.idPedido = $idPedido  OR ch.email = '{$email}'";
            }

            $query = $em->createQuery($dql)->getResult();

        } else{
            $dql = "SELECT ch FROM SacBundle:Chamado ch";
            $query = $em->createQuery($dql);
        }


        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );

        return $this->render('SacBundle:Chamado:chamado.html.twig',[
            'chamados' =>  $result
        ]);
    }

    /**
     * @Route("chamado/update/{id}", name="chamado_update")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $chamado = $em->getRepository('SacBundle\Entity\Chamado')->find($id);

        if(!$chamado){
            throw $this->createNotFoundException('Chamado não localizado!');
        }
        $chamado->setTitulo('Teste update param');

        $em->flush();

        return $this->redirectToRoute('chamado_index');
    }

    /**
     * @Route("chamado/delete/{id}", name="chamado_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $chamado = $em->getRepository('SacBundle\Entity\Chamado')->find($id);

        if(!$chamado){
            $this->addFlash('error','Chamado não localizado!');
        }

        $em->remove($chamado);
        $em->flush();

        $this->addFlash('notice','Cliente Excluído!');

        return $this->redirectToRoute('chamado_index');

    }

    /**
     * @Route("chamado/create", name="chamado_create")
     */
    public function createAction(Request $request)
    {

        $chamado = new Chamado();

        $form = $this->createFormBuilder($chamado)
            ->add('titulo', TextType::class, array('label' => 'Titulo','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('nome_cliente', TextType::class, array('label' => 'Nome Cliente','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('email', EmailType::class, array('label' => 'E-mail','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('id_pedido', IntegerType::class, array('label' => 'Pedido','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('observacao',TextareaType::class, array('label' => 'Observação','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label' => 'Cadastrar Chamado','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $id_pedido      = $form['id_pedido']->getData();
            $titulo         = $form['titulo']->getData();
            $observacao     = $form['observacao']->getData();
            $email          = $form['email']->getData();
            $nome_cliente   = $form['nome_cliente']->getData();

            $pedido = $this->getDoctrine()->getManager()->getRepository('SacBundle\Entity\Pedido')->find($id_pedido);

            if(!$pedido){
                $this->addFlash('error','Pedido não localizado!!');

            } else {

                $cliente = $this->getDoctrine()->getManager()->getRepository('SacBundle\Entity\Cliente')->findOneBy(array('email' => $email));

                if(!$cliente){

                    $cliente = new Cliente();

                    $cliente->setEmail($email);
                    $cliente->setDataCriacao(new \DateTime('now'));

                    $em = $this->getDoctrine()->getManager();

                    $em->persist($cliente);
                    $em->flush();

                    $this->addFlash('notice','Cliente Cadastrado!');

                }

                $chamado->setIdPedido($id_pedido);
                $chamado->setTitulo($titulo);
                $chamado->setObservacao($observacao);
                $chamado->setEmail($email);
                $chamado->setNomeCliente($nome_cliente);
                $chamado->setDataCriacao( new \DateTime('now'));

                $em = $this->getDoctrine()->getManager();
                $em->persist($chamado);
                $em->flush();

                $this->addFlash('notice','Chamado Cadastrado!');

                return $this->redirectToRoute('chamado_index');

            }

        }

        return $this->render('SacBundle:Chamado:form.html.twig', array(
            'form' => $form->createView(),
        ));


    }

}
