<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 11/02/2018
 * Time: 21:38
 */

namespace AppBundle\Application\VideoGame\Service;

use AppBundle\Domain\Model\VideoGame\VideoGameDescription;
use AppBundle\Domain\Model\VideoGame\VideoGameQueryRepositoryInterface;

class ShowVideoGameDataService
{
    /**
     * @var VideoGameQueryRepositoryInterface
     */
    private $videoGameQueryRepository;

    public function __construct(VideoGameQueryRepositoryInterface $videoGameQueryRepository)
    {
        $this->videoGameQueryRepository = $videoGameQueryRepository;
    }

    /**
     * Returns video game data
     *
     * @return array
     */
    public function execute() : array
    {
        $videoGameData = [];

        foreach ($this->videoGameQueryRepository->getVideoGameData() as $videoGame) {
            $videoGameData[] = [
                'id' => $videoGame['id'],
                'name' => $videoGame['title'],
                'description' =>$videoGame['description'],
            ];
        }

       return $videoGameData;
    }
}