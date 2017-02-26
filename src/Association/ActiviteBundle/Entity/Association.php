<?php

namespace Association\ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Association
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Association\ActiviteBundle\Entity\AssociationRepository")
 */
class Association
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
     * @ORM\Column(name="path_logo", type="string", length=255)
     */
    private $pathLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="local", type="string", length=255)
     */
    private $local;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_un", type="string", length=255)
     */
    private $telUn;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_deux", type="string", length=255)
     */
    private $telDeux;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_trois", type="string", length=255)
     */
    private $telTrois;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=20)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=20)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="email_un", type="string", length=255)
     */
    private $emailUn;

    /**
     * @var string
     *
     * @ORM\Column(name="email_deux", type="string", length=255)
     */
    private $emailDeux;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twiter", type="string", length=255)
     */
    private $twiter;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=255)
     */
    private $youtube;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     */
    private $dateCreation;


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
     * Set pathLogo
     *
     * @param string $pathLogo
     * @return Association
     */
    public function setPathLogo($pathLogo)
    {
        $this->pathLogo = $pathLogo;
    
        return $this;
    }

    /**
     * Get pathLogo
     *
     * @return string 
     */
    public function getPathLogo()
    {
        return $this->pathLogo;
    }

    /**
     * Set local
     *
     * @param string $local
     * @return Association
     */
    public function setLocal($local)
    {
        $this->local = $local;
    
        return $this;
    }

    /**
     * Get local
     *
     * @return string 
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Association
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telUn
     *
     * @param string $telUn
     * @return Association
     */
    public function setTelUn($telUn)
    {
        $this->telUn = $telUn;
    
        return $this;
    }

    /**
     * Get telUn
     *
     * @return string 
     */
    public function getTelUn()
    {
        return $this->telUn;
    }

    /**
     * Set telDeux
     *
     * @param string $telDeux
     * @return Association
     */
    public function setTelDeux($telDeux)
    {
        $this->telDeux = $telDeux;
    
        return $this;
    }

    /**
     * Get telDeux
     *
     * @return string 
     */
    public function getTelDeux()
    {
        return $this->telDeux;
    }

    /**
     * Set telTrois
     *
     * @param string $telTrois
     * @return Association
     */
    public function setTelTrois($telTrois)
    {
        $this->telTrois = $telTrois;
    
        return $this;
    }

    /**
     * Get telTrois
     *
     * @return string 
     */
    public function getTelTrois()
    {
        return $this->telTrois;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Association
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    
        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Association
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return Association
     */
    public function setSite($site)
    {
        $this->site = $site;
    
        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Association
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set emailUn
     *
     * @param string $emailUn
     * @return Association
     */
    public function setEmailUn($emailUn)
    {
        $this->emailUn = $emailUn;
    
        return $this;
    }

    /**
     * Get emailUn
     *
     * @return string 
     */
    public function getEmailUn()
    {
        return $this->emailUn;
    }

    /**
     * Set emailDeux
     *
     * @param string $emailDeux
     * @return Association
     */
    public function setEmailDeux($emailDeux)
    {
        $this->emailDeux = $emailDeux;
    
        return $this;
    }

    /**
     * Get emailDeux
     *
     * @return string 
     */
    public function getEmailDeux()
    {
        return $this->emailDeux;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Association
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    
        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twiter
     *
     * @param string $twiter
     * @return Association
     */
    public function setTwiter($twiter)
    {
        $this->twiter = $twiter;
    
        return $this;
    }

    /**
     * Get twiter
     *
     * @return string 
     */
    public function getTwiter()
    {
        return $this->twiter;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     * @return Association
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;
    
        return $this;
    }

    /**
     * Get youtube
     *
     * @return string 
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Association
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Association
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
}
