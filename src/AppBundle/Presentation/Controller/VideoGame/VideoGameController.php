<?php

namespace AppBundle\Presentation\Controller\VideoGame;

use AppBundle\Application\VideoGame\Service\ShowVideoGameDataService;
use AppBundle\Domain\Model\VideoGame\VideoGameQueryRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class VideoGameController extends Controller
{

    /**
     * @var ShowVideoGameDataService $showVideoGameDataService
     */
    private $showVideoGameDataService;

    /**
     * VideoGameController constructor.
     *
     * @param ShowVideoGameDataService $showVideoGameDataService
     */
    public function __construct
    (
        ShowVideoGameDataService $showVideoGameDataService
    )
    {
        $this->showVideoGameDataService = $showVideoGameDataService;
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $videoGameData = $this->showVideoGameDataService->execute();

        return $this->render('default/index.html.twig', [
            'videoGames' => $videoGameData,
        ]);
    }

}