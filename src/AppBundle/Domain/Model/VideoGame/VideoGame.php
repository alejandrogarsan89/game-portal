<?php


namespace AppBundle\Domain\Model\VideoGame;

use AppBundle\Domain\Model\Company\Company;
use AppBundle\Domain\Model\Platform\Platform;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Infrastucture\Domain\Model\VideoGame\DoctrineVideoGameRepository")
 * @ORM\Table(name="videogame")
 */
class VideoGame
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
     * @ORM\Embedded(class="AppBundle\Domain\Model\VideoGame\VideoGameDescription", columnPrefix=false)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Domain\Model\Company\Company")
     * @ORM\JoinColumn(name="com_id", referencedColumnName="id")
     *
     * @var Company
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Domain\Model\Platform\Platform")
     * @ORM\JoinColumn(name="pla_id", referencedColumnName="id")
     *
     * @var Platform
     */
    private $platform;

    /**
     * VideoGame constructor.
     *
     * @param string $name
     * @param VideoGameDescription $description
     * @param Platform $platform
     * @param Company $company
     */
    public function __construct(string $name, VideoGameDescription $description, Platform $platform, Company $company)
    {
        $this->name = $name;
        $this->description = $description;
        $this->company = $company;
        $this->platform = $platform;
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
    public function getName() : string
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * @return Platform
     */
    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    /**
     * @param Platform $platform
     */
    public function setPlatform(Platform $platform): void
    {
        $this->platform = $platform;
    }
}