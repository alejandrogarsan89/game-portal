<?php

namespace AppBundle\Domain\Model\VideoGame;


use AppBundle\Domain\Model\Entity\VideoGame;

interface VideoGameRepositoryInterface
{
    /**
     * Returns a videogame by id.
     *
     * @param int $videoGameId
     *
     * @return VideoGame
     */
    function getById(int $videoGameId) : VideoGame;

}