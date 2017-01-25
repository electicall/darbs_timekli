<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * charity
 *
 * @ORM\Table(name="charity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\charityRepository")
 */
class charity
{
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
     * @ORM\Column(name="charityname", type="string", length=255)
     */
    private $charityname;

    /**
     * @var string
     *
     * @ORM\Column(name="charitydescription", type="text")
     */
    private $charitydescription;

    /**
     * @var string
     *
     * @ORM\Column(name="imagepath", type="string", length=255)
     */
    private $imagepath;


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
     * Set charityname
     *
     * @param string $charityname
     * @return charity
     */
    public function setCharityname($charityname)
    {
        $this->charityname = $charityname;

        return $this;
    }

    /**
     * Get charityname
     *
     * @return string 
     */
    public function getCharityname()
    {
        return $this->charityname;
    }

    /**
     * Set charitydescription
     *
     * @param string $charitydescription
     * @return charity
     */
    public function setCharitydescription($charitydescription)
    {
        $this->charitydescription = $charitydescription;

        return $this;
    }

    /**
     * Get charitydescription
     *
     * @return string 
     */
    public function getCharitydescription()
    {
        return $this->charitydescription;
    }

    /**
     * Set imagepath
     *
     * @param string $imagepath
     * @return charity
     */
    public function setImagepath($imagepath)
    {
        $this->imagepath = $imagepath;

        return $this;
    }

    /**
     * Get imagepath
     *
     * @return string 
     */
    public function getImagepath()
    {
        return $this->imagepath;
    }
}
