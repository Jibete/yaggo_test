<?php

namespace Yaggo\ApplicantsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Applicants
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="applicants")
 * @ORM\Entity
 */
class Applicants
{
    /**
     * @var integer
     *
     * @ORM\Column(name="a_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aId;

    /**
     * @var string
     *
     * @ORM\Column(name="a_firstname", type="string", length=255, nullable=false)
     * @Assert\NotNull()
     */
    private $aFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="a_lastname", type="string", length=255, nullable=false)
     * @Assert\NotNull()
     */
    private $aLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="a_email", type="string", length=255, nullable=false)
     * @Assert\NotNull()
     */
    private $aEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="a_phone", type="string", length=255, nullable=true)
     */
    private $aPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="a_img_url", type="string", length=255, nullable=true)
     */
    private $aImgUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="a_updated_at", type="datetime", nullable=true)
     */
    private $aUpdatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="a_created_at", type="datetime", nullable=true)
     */
    private $aCreatedAt;
    
    
    /**
     * Triggered on insert
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->aCreatedAt = new \DateTime("now");
    }

    /**
     * Triggered on update
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->aUpdatedAt = new \DateTime("now");
    }

    /**
     * Get aId
     *
     * @return integer
     */
    public function getAId()
    {
        return $this->aId;
    }

    /**
     * Set aFirstname
     *
     * @param string $aFirstname
     *
     * @return Applicants
     */
    public function setAFirstname($aFirstname)
    {
        $this->aFirstname = $aFirstname;

        return $this;
    }

    /**
     * Get aFirstname
     *
     * @return string
     */
    public function getAFirstname()
    {
        return $this->aFirstname;
    }

    /**
     * Set aLastname
     *
     * @param string $aLastname
     *
     * @return Applicants
     */
    public function setALastname($aLastname)
    {
        $this->aLastname = $aLastname;

        return $this;
    }

    /**
     * Get aLastname
     *
     * @return string
     */
    public function getALastname()
    {
        return $this->aLastname;
    }

    /**
     * Set aEmail
     *
     * @param string $aEmail
     *
     * @return Applicants
     */
    public function setAEmail($aEmail)
    {
        $this->aEmail = $aEmail;

        return $this;
    }

    /**
     * Get aEmail
     *
     * @return string
     */
    public function getAEmail()
    {
        return $this->aEmail;
    }

    /**
     * Set aPhone
     *
     * @param string $aPhone
     *
     * @return Applicants
     */
    public function setAPhone($aPhone)
    {
        $this->aPhone = $aPhone;

        return $this;
    }

    /**
     * Get aPhone
     *
     * @return string
     */
    public function getAPhone()
    {
        return $this->aPhone;
    }

    /**
     * Set aImgUrl
     *
     * @param string $aImgUrl
     *
     * @return Applicants
     */
    public function setAImgUrl($aImgUrl)
    {
        $this->aImgUrl = $aImgUrl;

        return $this;
    }

    /**
     * Get aImgUrl
     *
     * @return string
     */
    public function getAImgUrl()
    {
        return $this->aImgUrl;
    }

    /**
     * Set aUpdatedAt
     *
     * @param \DateTime $aUpdatedAt
     *
     * @return Applicants
     */
    public function setAUpdatedAt($aUpdatedAt)
    {
        $this->aUpdatedAt = $aUpdatedAt;

        return $this;
    }

    /**
     * Get aUpdatedAt
     *
     * @return \DateTime
     */
    public function getAUpdatedAt()
    {
        return $this->aUpdatedAt;
    }

    /**
     * Set aCreatedAt
     *
     * @param \DateTime $aCreatedAt
     *
     * @return Applicants
     */
    public function setACreatedAt($aCreatedAt)
    {
        $this->aCreatedAt = $aCreatedAt;

        return $this;
    }

    /**
     * Get aCreatedAt
     *
     * @return \DateTime
     */
    public function getACreatedAt()
    {
        return $this->aCreatedAt;
    }
}
