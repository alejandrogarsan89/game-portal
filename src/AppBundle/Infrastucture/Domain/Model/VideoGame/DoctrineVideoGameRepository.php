<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 10/02/2018
 * Time: 19:42
 */

namespace AppBundle\Infrastucture\Domain\Model\VideoGame;


use AppBundle\Domain\Model\VideoGame\VideoGame;
use AppBundle\Domain\Model\VideoGame\VideoGameRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class DoctrineVideoGameRepository extends EntityRepository implements VideoGameRepositoryInterface
{

    /**
     * Returns a videogame by id.
     *
     * @param int $videoGameId
     *
     * @return VideoGame
     */
    function getById(int $videoGameId): VideoGame
    {
        return $this->find($videoGameId);
    }
}