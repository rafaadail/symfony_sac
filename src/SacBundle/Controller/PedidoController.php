<?php
namespace SacBundle\Controller;

use SacBundle\Entity\Pedido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;


class PedidoController extends Controller
{


    /**
     * @Route("/pedido",name="pedido_index")
     */
    public function clienteIndex()
    {
        return $this->render('SacBundle:Pedido:pedido.html.twig');

    }

    /**
     * @Route("/pedido/list", name="pedido_list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pedidos = $em->getRepository('SacBundle\Entity\Pedido')
            ->findAll();

        return $this->render('SacBundle:Pedido:search.html.twig',[
            'pedidos' =>  $pedidos
        ]);
    }


}