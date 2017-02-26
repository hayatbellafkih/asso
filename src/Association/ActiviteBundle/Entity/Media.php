<?php

namespace Association\ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;

/**
 * Media
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Association\ActiviteBundle\Entity\MediaRepository")

 */
class Media {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    
    public $file;

    public function getUploadRootDir() {
//        return __dir__ . '//../../../../web/uploads';
        return  'C:\wamp_\www\web\uploads';
    }

    public function getAbsolutePath() {
        return null === $this->getUploadRootDir() . '/' . $this->path;
    }

    /**
     * @ORM\Prepersist()
     * @ORM\Preupdate()
     */
    public function preUpload() {
        $this->temFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        if (null !== $this->file) {
            $this->path = sha1(rand()) . '.' . $this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null !== $this->file) {
            $this->file->move($this->getUploadRootDir(), $this->path);
            unset($this->file);
            if ($this->oldFile != null)
                unlink($this->temFile);
        }
    }

    /**
     * @ORM\PreRemove()
     * 
     */
    public function preRemoveUpload() {
        $this->temFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     * 
     */
    public function removeUpload() {
        if (file_exists($this->temFile))
            unlink($this->temFile);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    public function getPth() {
        return $this->path;
    }

    public function getName() {
        return $this->name;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Media
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}
