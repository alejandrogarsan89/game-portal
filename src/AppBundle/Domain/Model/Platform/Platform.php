<?php

namespace AppBundle\Domain\Model\Platform;

use AppBundle\Domain\Model\Company\Company;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Infrastucture\Domain\Model\Platform\DoctrinePlatformRepository")
 * @ORM\Table(name="platform")
 */
class Platform
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $releaseDate;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Domain\Model\Company\Company")
     * @ORM\JoinColumn(name="com_id", referencedColumnName="id")
     *
     * @var Company
     */
    private $company;

    public function __construct(string $name, \DateTime $foundationDate, Company $company)
    {
        $this->name = $name;
        $this->releaseDate = $foundationDate;
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }


}