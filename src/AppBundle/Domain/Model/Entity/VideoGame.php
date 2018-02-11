<?php


namespace AppBundle\Domain\Model\Entity;

use AppBundle\Domain\Model\VideoGame\VideoGameDescription;
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
     * VideoGame constructor.
     *
     * @param string $name
     */
    public function __construct(string $name, VideoGameDescription $description)
    {
        $this->name = $name;
        $this->description = $description;

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
}