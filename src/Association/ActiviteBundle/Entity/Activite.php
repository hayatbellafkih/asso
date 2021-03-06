<?php

namespace Association\ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Association\ActiviteBundle\Entity\ActiviteRepository")
 */
class Activite {

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
     * @ORM\Column(name="libele", type="string", length=255)
     */
    private $libele;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=255)
     */
    private $heure;

    /**
     * @ORM\ManyToMany (targetEntity="Association\ActiviteBundle\Entity\Visiteur",cascade={"persist"})
     */
    private $visiteur;

    /**
     *
     * @var type 
     * @ORM\OneToOne(targetEntity="Association\ActiviteBundle\Entity\Media", cascade={"persist"})
     */
    private $fiche;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set libele
     *
     * @param string $libele
     * @return Activite
     */
    public function setLibele($libele) {
        $this->libele = $libele;

        return $this;
    }

    /**
     * Get libele
     *
     * @return string 
     */
    public function getLibele() {
        return $this->libele;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Activite
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
     * Set date
     *
     * @param \DateTime $date
     * @return Activite
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Activite
     */
    public function setLieu($lieu) {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu() {
        return $this->lieu;
    }

    /**
     * Set heure
     *
     * @param string $heure
     * @return Activite
     */
    public function setHeure($heure) {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return string 
     */
    public function getHeure() {
        return $this->heure;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->visiteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add visiteur
     *
     * @param \Association\ActiviteBundle\Entity\Visiteur $visiteur
     * @return Activite
     */
    public function addVisiteur(\Association\ActiviteBundle\Entity\Visiteur $visiteur) {
        $this->visiteur[] = $visiteur;

        return $this;
    }

    /**
     * Remove visiteur
     *
     * @param \Association\ActiviteBundle\Entity\Visiteur $visiteur
     */
    public function removeVisiteur(\Association\ActiviteBundle\Entity\Visiteur $visiteur) {
        $this->visiteur->removeElement($visiteur);
    }

    /**
     * Get visiteur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisiteur() {
        return $this->visiteur;
    }


    /**
     * Set fiche
     *
     * @param \Association\ActiviteBundle\Entity\Media $fiche
     * @return Activite
     */
    public function setFiche(\Association\ActiviteBundle\Entity\Media $fiche = null)
    {
        $this->fiche = $fiche;
    
        return $this;
    }

    /**
     * Get fiche
     *
     * @return \Association\ActiviteBundle\Entity\Media 
     */
    public function getFiche()
    {
        return $this->fiche;
    }
}