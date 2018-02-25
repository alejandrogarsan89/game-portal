<?php

namespace AppBundle\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Infrastucture\Domain\Model\Company\DoctrineCompanyRepository")
 * @ORM\Table(name="company")
 */
class Company
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
    private $foundationDate;

    public function __construct(string $name, \DateTime $foundationDate)
    {
        $this->name = $name;
        $this->foundationDate = $foundationDate;
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
    public function getFoundationDate()
    {
        return $this->foundationDate;
    }

    /**
     * @param mixed $foundationDate
     */
    public function setFoundationDate($foundationDate): void
    {
        $this->foundationDate = $foundationDate;
    }


}