<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * charityhistory
 *
 * @ORM\Table(name="charityhistory")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\charityhistoryRepository")
 */
class charityhistory
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="charityname", type="string", length=255)
     */
    private $charityname;

    /**
     * @var string
     *
     * @ORM\Column(name="money", type="decimal", precision=2, scale=0)
     */
    private $money;


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
     * Set username
     *
     * @param string $username
     * @return charityhistory
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set charityname
     *
     * @param string $charityname
     * @return charityhistory
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
     * Set money
     *
     * @param string $money
     * @return charityhistory
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string 
     */
    public function getMoney()
    {
        return $this->money;
    }
}
