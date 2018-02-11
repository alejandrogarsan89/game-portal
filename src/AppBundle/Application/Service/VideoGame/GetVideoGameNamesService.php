<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 11/02/2018
 * Time: 0:46
 */

namespace AppBundle\Application\Service\VideoGame;


use AppBundle\Domain\Model\VideoGame\VideoGameQueryRepositoryInterface;

/**
 * Class GetVideoGameNamesService
 *
 * @package AppBundle\Application\Service\VideoGame
 */
class GetVideoGameNamesService
{
    /**
     * @var VideoGameQueryRepositoryInterface
     */
    private $videoGameQueryRepository;

    public function __construct(VideoGameQueryRepositoryInterface $videoGameQueryRepository)
    {
        $this->videoGameQueryRepository = $videoGameQueryRepository;
    }

    public function execute() : array
    {
        return $this->videoGameQueryRepository->getNames();
    }
}