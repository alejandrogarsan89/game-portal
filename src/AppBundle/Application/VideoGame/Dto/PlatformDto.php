<?php

namespace AppBundle\Application\VideoGame\Dto;

/**
 * Class PlatformDto
 *
 * @package AppBundle\Application\VideoGame\Dto
 */
class PlatformDto
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var string $releaseDate */
    private $releaseDate;

    /** @var CompanyDto $company */
    private $company;

    /**
     * PlatformDto constructor.
     *
     * @param int $id
     * @param string $name
     * @param string $releaseDate
     * @param CompanyDto $company
     */
    public function __construct(int $id, string $name, string $releaseDate, CompanyDto $company)
    {
        $this->id = $id;
        $this->name = $name;
        $this->releaseDate = $releaseDate;
        $this->company = $company;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return CompanyDto
     */
    public function getCompany(): CompanyDto
    {
        return $this->company;
    }

    /**
     * @param CompanyDto $company
     */
    public function setCompany(CompanyDto $company): void
    {
        $this->company = $company;
    }
}