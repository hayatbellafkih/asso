<?php

namespace Association\ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * options
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Association\ActiviteBundle\Entity\optionsRepository")
 */
class options
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
     * @ORM\Column(name="typesreunion", type="text")
     */
    private $typesreunion;

    /**
     * @var string
     *
     * @ORM\Column(name="nomOption", type="string", length=255)
     */
    private $nomOption;

    /**
     * @var string
     *
     * @ORM\Column(name="valeurOption", type="text")
     */
    private $valeurOption;


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
     * Set typesreunion
     *
     * @param string $typesreunion
     * @return options
     */
    public function setTypesreunion($typesreunion)
    {
        $this->typesreunion = $typesreunion;
    
        return $this;
    }

    /**
     * Get typesreunion
     *
     * @return string 
     */
    public function getTypesreunion()
    {
        return $this->typesreunion;
    }

    /**
     * Set nomOption
     *
     * @param string $nomOption
     * @return options
     */
    public function setNomOption($nomOption)
    {
        $this->nomOption = $nomOption;
    
        return $this;
    }

    /**
     * Get nomOption
     *
     * @return string 
     */
    public function getNomOption()
    {
        return $this->nomOption;
    }

    /**
     * Set valeurOption
     *
     * @param string $valeurOption
     * @return options
     */
    public function setValeurOption($valeurOption)
    {
        $this->valeurOption = $valeurOption;
    
        return $this;
    }

    /**
     * Get valeurOption
     *
     * @return string 
     */
    public function getValeurOption()
    {
        return $this->valeurOption;
    }
}
