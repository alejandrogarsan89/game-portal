<?php

namespace AppBundle\Application\VideoGame\Assembler;

use AppBundle\Application\VideoGame\Dto\CompanyDto;
use AppBundle\Application\VideoGame\Dto\PlatformDto;
use AppBundle\Application\VideoGame\Dto\VideoGameDto;
use AppBundle\Domain\Model\VideoGame\VideoGame;

/**
 * Class VideoGameDtoAssembler
 *
 * @package AppBundle\Application\VideoGame\Assembler
 */
class VideoGameDtoAssembler
{
    /**
     * Assembles video game dto.
     *
     * @param VideoGame $videoGame
     * @return VideoGameDto
     */
    public function assemble(VideoGame $videoGame) : VideoGameDto
    {
        return new VideoGameDto(
            $videoGame->getId(),
            $videoGame->getTitle(),
            $videoGame->getDescription(),
            new CompanyDto(
                $videoGame->getCompany()->getId(),
                $videoGame->getCompany()->getName(),
                $videoGame->getCompany()->getFoundationDate()
            ),
            new PlatformDto(
                $videoGame->getPlatform()->getId(),
                $videoGame->getPlatform()->getName(),
                $videoGame->getPlatform()->getReleaseDate(),
                new CompanyDto(
                    $videoGame->getPlatform()->getCompany()->getId(),
                    $videoGame->getPlatform()->getCompany()->getName(),
                    $videoGame->getPlatform()->getCompany()->getFoundationDate()
                )
            )
        );
    }
}