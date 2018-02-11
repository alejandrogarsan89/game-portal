<?php


namespace AppBundle\Domain\Model\VideoGame;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class VideoGameDescription
 *
 * @ORM\Embeddable
 *
 * @package AppBundle\Domain\Model\VideoGame
 */
final class VideoGameDescription
{
    /**
     * @var int
     */
    public static $MAX_LENGTH = 1000;

    /** @ORM\Column(type="text", name="description") */
    private $value;

    /**
     * VideoGameDescription constructor.
     *
     * @param string $value
     *
     * @throws \Exception
     */
    private function __construct(string $value)
    {
        if (strlen($value) > self::$MAX_LENGTH) {
            throw new \Exception('');
        }

        $this->value = $value;
    }

    /**
     * @param string $value
     *
     * @return VideoGameDescription
     *
     * @throws \Exception
     */
    public static function createFromValue(string $value)
    {
        return new self($value);
    }

    public function getValue() : string
    {
        return $this->value;
    }

    public function equals(VideoGameDescription $videoGameDescription)
    {
        return $this->getValue() === $videoGameDescription->getValue();
    }
}