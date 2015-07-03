<?php

namespace tabelaPhaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tabela
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="tabelaPhaBundle\Entity\TabelaRepository")
 */
class Tabela
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phaCode", type="string", length=255)
     */
    private $phaCode;

    /**
     * @var string
     *
     * @ORM\Column(name="phaName", type="string", length=255)
     */
    private $phaName;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set phaCode
     *
     * @param string $phaCode
     * @return Tabela
     */
    public function setPhaCode($phaCode)
    {
        $this->phaCode = $phaCode;

        return $this;
    }

    /**
     * Get phaCode
     *
     * @return string 
     */
    public function getPhaCode()
    {
        return $this->phaCode;
    }

    /**
     * Set phaName
     *
     * @param string $phaName
     * @return Tabela
     */
    public function setPhaName($phaName)
    {
        $this->phaName = $phaName;

        return $this;
    }

    /**
     * Get phaName
     *
     * @return string 
     */
    public function getPhaName()
    {
        return $this->phaName;
    }
}
