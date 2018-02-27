<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 11/02/2018
 * Time: 0:46
 */

namespace AppBundle\Application\VideoGame\Service;


use AppBundle\Domain\Model\VideoGame\VideoGameQueryRepositoryInterface;

/**
 * Class GetVideoGameNamesService
 *
 * @package AppBundle\Application\VideoGame\Service
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