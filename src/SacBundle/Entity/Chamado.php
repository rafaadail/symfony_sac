<?php

namespace SacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chamados
 * @ORM\Table(name="chamado")
 * @ORM\Entity(repositoryClass="SacBundle\Repository\ChamadoRepository")
  */
class Chamado
{


     // @ORM\ManyToOne(targetEntity="Cliente", inversedBy="chamados")

    protected $cliente;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pedido", type="integer", nullable=true)
     */
    private $idPedido;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=60, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="string", length=255)
     */
    private $observacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=true)
     */
    private $dataCriacao;


    /**
     * @var string
     * @ORM\Column(name="nome_cliente", type="string", length=60, nullable=true)
     */
    private $nomeCliente;

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     * @return Chamado
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    /**
     * @param string $nome_cliente
     * @return Chamado
     */
    public function setNomeCliente($nomeCliente)
    {
        $this->nomeCliente= $nomeCliente;
        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Set idPedido
     *
     * @param integer $idPedido
     *
     * @return Chamado
     */
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

        return $this;
    }

    /**
     * Get idPedido
     *
     * @return int
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Chamado
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Chamado
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     *
     * @return Chamado
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     *
     * @return Chamado
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Get dataCriacao
     *
     * @return \DateTime
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }
}

