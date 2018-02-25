<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 10/02/2018
 * Time: 19:42
 */

namespace AppBundle\Infrastucture\Domain\Model\VideoGame;

use AppBundle\Domain\Model\VideoGame\VideoGame;
use AppBundle\Domain\Model\VideoGame\VideoGameQueryRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineVideoGameQueryRepository implements VideoGameQueryRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    /**
     * Returns a videogame by id.
     *
     * @param int $videoGameId
     *
     * @return VideoGame
     */
    public function getNames(): array
    {
        $sql =
            "
              SELECT name 
              FROM videogame
            "
        ;

       return $this->entityManager->getConnection()->fetchAll(
           $sql
       );
    }

    public function getVideoGameData() : array
    {
        $sql =
            "
              SELECT id, name, description 
              FROM videogame
            "
        ;
        return $this->entityManager->getConnection()->fetchAll(
            $sql
        );
    }
}