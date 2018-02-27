<?php

namespace AppBundle\Application\VideoGame\Dto;

/**
 * Class VideoGameDto
 *
 * @package AppBundle\Application\VideoGame\Dto
 */
class VideoGameDto
{

    /** @var int $id */
    private $id;

    /** @var string $title */
    private $title;

    /** @var string $description */
    private $description;

    /** @var CompanyDto $company */
    private $company;

    /** @var PlatformDto $platform */
    private $platform;

    /**
     * VideoGameDto constructor.
     *
     * @param int $id
     * @param string $title
     * @param string $description
     * @param CompanyDto $company
     * @param PlatformDto $platform
     */
    public function __construct(int $id, string $title, string $description, CompanyDto $company, PlatformDto $platform)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->company = $company;
        $this->platform = $platform;
    }

    public function getAttayCopy() : array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'company' => $this->getCompany()->getName(),
            'platform' => $this->getPlatform()->getName()
        ];
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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

    /**
     * @return PlatformDto
     */
    public function getPlatform(): PlatformDto
    {
        return $this->platform;
    }

    /**
     * @param PlatformDto $platform
     */
    public function setPlatform(PlatformDto $platform): void
    {
        $this->platform = $platform;
    }
}