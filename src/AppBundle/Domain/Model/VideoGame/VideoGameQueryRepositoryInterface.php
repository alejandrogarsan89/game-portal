<?php

namespace AppBundle\Domain\Model\VideoGame;


use AppBundle\Domain\Model\VideoGame\VideoGame;

interface VideoGameQueryRepositoryInterface
{
    /**
     * Returns a videogame by id.
     *
     * @param int $videoGameId
     *
     * @return VideoGame
     */
    public function getNames() : array;

    public function getVideoGameData() : array;

}