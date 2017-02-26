<?php

namespace Association\ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reunion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Association\ActiviteBundle\Entity\ReunionRepository")
 */
class Reunion {

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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=5)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="programme", type="text")
     */
    private $programme;

    /**
     * @var string
     *
     * @ORM\Column(name="urlPvReunion", type="string", length=255)
     */
    private $urlPvReunion;

    /**
     *
     * @var type 
     * @ORM\OneToOne(targetEntity="Association\ActiviteBundle\Entity\Media", cascade={"persist"})
     */
    private $pv;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Reunion
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Reunion
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set dater
     *
     * @param \DateTime $dater
     * @return Reunion
     */
    public function setDater($dater) {
        $this->dater = $dater;

        return $this;
    }

    /**
     * Get dater
     *
     * @return \DateTime 
     */
    public function getDater() {
        return $this->dater;
    }

    /**
     * Set heure
     *
     * @param string $heure
     * @return Reunion
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
     * Set programme
     *
     * @param string $programme
     * @return Reunion
     */
    public function setProgramme($programme) {
        $this->programme = $programme;

        return $this;
    }

    /**
     * Get programme
     *
     * @return string 
     */
    public function getProgramme() {
        return $this->programme;
    }

    /**
     * Set urlPvReunion
     *
     * @param string $urlPvReunion
     * @return Reunion
     */
    public function setUrlPvReunion($urlPvReunion) {
        $this->urlPvReunion = $urlPvReunion;

        return $this;
    }

    /**
     * Get urlPvReunion
     *
     * @return string 
     */
    public function getUrlPvReunion() {
        return $this->urlPvReunion;
    }


    /**
     * Set pv
     *
     * @param \Association\ActiviteBundle\Entity\Media $pvFile
     * @return Reunion
     */
    public function setPv(\Association\ActiviteBundle\Entity\Media $pvFile = null)
    {
        $this->pv = $pvFile;
    
        return $this;
    }

    /**
     * Get pv
     *
     * @return \Association\ActiviteBundle\Entity\Media 
     */
    public function getPv()
    {
        return $this->pv;
    }
}