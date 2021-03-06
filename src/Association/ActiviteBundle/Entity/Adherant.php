<?php

namespace Association\ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adherant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Association\ActiviteBundle\Entity\AdherantRepository")
 */
class Adherant {

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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255,nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,nullable=true)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=255,nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAdhesion", type="date")
     */
    private $dateAdhesion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExpiration", type="date")
     */
    private $dateExpiration;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=50,nullable=true)
     */
    private $sexe;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Adherant
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Adherant
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Set dateAdhesion
     *
     * @param \DateTime $dateAdhesion
     * @return Adherant
     */
    public function setDateAdhesion($dateAdhesion) {
        $this->dateAdhesion = $dateAdhesion;

        return $this;
    }

    /**
     * Get dateAdhesion
     *
     * @return \DateTime 
     */
    public function getDateAdhesion() {
        return $this->dateAdhesion;
    }

    /**
     * Set dateExpiration
     *
     * @param \DateTime $dateExpiration
     * @return Adherant
     */
    public function setDateExpiration($dateExpiration) {
        $this->dateExpiration = $dateExpiration;

        return $this;
    }

    /**
     * Get dateExpiration
     *
     * @return \DateTime 
     */
    public function getDateExpiration() {
        return $this->dateExpiration;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Adherant
     */
    public function setSexe($sexe) {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe() {
        return $this->sexe;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Adherant
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }


    /**
     * Set profil
     *
     * @param string $profil
     * @return Adherant
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    
        return $this;
    }

    /**
     * Get profil
     *
     * @return string 
     */
    public function getProfil()
    {
        return $this->profil;
    }
}