<?php
declare(strict_types = 1);

namespace AppBundle\Domain\Model\VideoGame;

use AppBundle\Domain\Model\Company\Company;
use AppBundle\Domain\Model\Platform\Platform;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class VideoGame
 *
 * @package AppBundle\Domain\Model\VideoGame
 *
 * @ORM\Entity(repositoryClass="AppBundle\Infrastucture\Domain\Model\VideoGame\DoctrineVideoGameRepository")
 * @ORM\Table(name="videogame")
 */
class VideoGame
{
    /**
     * @var integer $id Id.
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $title Title.
     *
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var VideoGameDescription $description VideoGame description.
     *
     * @ORM\Embedded(class="AppBundle\Domain\Model\VideoGame\VideoGameDescription", columnPrefix=false)
     */
    private $description;

    /**
     * @var Company $company Compnay.
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Domain\Model\Company\Company")
     * @ORM\JoinColumn(name="com_id", referencedColumnName="id")
     *
     * @var Company
     */
    private $company;

    /**
     * @var Platform $platform Platform.
     *
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
    public function __construct(string $title, VideoGameDescription $description, Platform $platform, Company $company)
    {
        $this->title = $title;
        $this->description = $description;
        $this->company = $company;
        $this->platform = $platform;
    }

    /**
     * Returns id.
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Returns title
     *
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * Sets videogame description.
     *
     * @param $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * Gets videogame Description.
     *
     * @return VideoGameDescription
     */
    public function getDescription() : VideoGameDescription
    {
        return $this->description;
    }

    /**
     * Sets VideGame description
     *
     * @param VideoGameDescription $description
     */
    public function setDescription(VideoGameDescription $description): void
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
     * Sets company
     *
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * Returns platform.
     *
     * @return Platform
     */
    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    /**
     * Sets platform.
     *
     * @param Platform $platform
     */
    public function setPlatform(Platform $platform): void
    {
        $this->platform = $platform;
    }
}