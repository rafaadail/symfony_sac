<?php

namespace SacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cliente
 * @ORM\Entity(repositoryClass="SacBundle\Repository\ClienteRepository")
 * @ORM\Table(name="cliente")
 */
class Cliente
{


    // @ORM\OneToMany(targetEntity="Chamado", mappedBy="cliente")
    //protected $chamados;

  /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="date", nullable=true)
     */
    private $dataCriacao;

    /*
    public function __construct()
    {
        $this->chamados = new ArrayCollection();
    }
    */

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
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
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
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     *
     * @return Cliente
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

