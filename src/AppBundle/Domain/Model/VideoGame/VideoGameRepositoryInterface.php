<?php

namespace AppBundle\Domain\Model\VideoGame;


use AppBundle\Domain\Model\VideoGame\VideoGame;

interface VideoGameRepositoryInterface
{
    /**
     * Returns a videogame by id.
     *
     * @param int $videoGameId
     *
     * @return VideoGame
     */
    public function getById(int $videoGameId) : VideoGame;

    /**
     * Returns all video games
     *
     * @return array
     */
    public function findAll() : array;

}