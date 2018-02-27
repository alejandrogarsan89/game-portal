<?php

namespace AppBundle\Application\VideoGame\Dto;

/**
 * Class CompanyDto
 *
 * @package AppBundle\Application\VideoGame\Dto
 */
class CompanyDto
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var string $foundationDate */
    private $foundationDate;

    public function __construct(int $id, string $name, string $foundationDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->foundationDate = $foundationDate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFoundationDate(): string
    {
        return $this->foundationDate;
    }

    /**
     * @param string $foundationDate
     */
    public function setFoundationDate(string $foundationDate): void
    {
        $this->foundationDate = $foundationDate;
    }
}