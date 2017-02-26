<?php

namespace Association\ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Association\ActiviteBundle\Entity\Fournisseur;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Charge
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Association\ActiviteBundle\Entity\ChargeRepository")
 */
class Charge {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOperation", type="date")
     */
    private $dateOperation;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float")
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * @var float
     *
     * @ORM\Column(name="resteAPayer", type="float")
     */
    private $resteAPayer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLimiteRestAPayer", type="date")
     */
    private $dateLimiteRestAPayer;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Association\ActiviteBundle\Entity\Fournisseur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $fournisseur;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dateOperation
     *
     * @param \DateTime $dateOperation
     * @return Charge
     */
    public function setDateOperation($dateOperation) {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    /**
     * Get dateOperation
     *
     * @return \DateTime 
     */
    public function getDateOperation() {
        return $this->dateOperation;
    }

    /**
     * Set valeur
     *
     * @param float $valeur
     * @return Charge
     */
    public function setValeur($valeur) {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return float 
     */
    public function getValeur() {
        return $this->valeur;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Charge
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Charge
     */
    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire() {
        return $this->commentaire;
    }

    /**
     * Set resteAPayer
     *
     * @param float $resteAPayer
     * @return Charge
     */
    public function setResteAPayer($resteAPayer) {
        $this->resteAPayer = $resteAPayer;

        return $this;
    }

    /**
     * Get resteAPayer
     *
     * @return float 
     */
    public function getResteAPayer() {
        return $this->resteAPayer;
    }

    /**
     * Set dateLimiteRestAPayer
     *
     * @param \DateTime $dateLimiteRestAPayer
     * @return Charge
     */
    public function setDateLimiteRestAPayer($dateLimiteRestAPayer) {
        $this->dateLimiteRestAPayer = $dateLimiteRestAPayer;

        return $this;
    }

    /**
     * Get dateLimiteRestAPayer
     *
     * @return \DateTime 
     */
    public function getDateLimiteRestAPayer() {
        return $this->dateLimiteRestAPayer;
    }

    public function setFournisseur(Fournisseur $fournisseur) {
        $this->fournisseur = $fournisseur;
    }

    public function getFournisseur() {
       return  $this->fournisseur ;
    }

}
