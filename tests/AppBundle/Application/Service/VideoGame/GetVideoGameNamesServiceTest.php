<?php

namespace tests\AppBundle\Application\Service\VideoGame;

use AppBundle\Application\Service\VideoGame\GetVideoGameNamesService;
use AppBundle\Domain\Model\VideoGame\VideoGameQueryRepositoryInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class GetVideoGameNamesServiceTest
 *
 * @package Tests\AppBundle\Application\Service\VideoGame
 */
final class GetVideoGameNamesServiceTest extends TestCase
{
    /** @var GetVideoGameNamesService $getVideoGameNameService */
    private $getVideoGameNameService;

    /** @var MockObject $VideoGameQueryRepository */
    private $VideoGameQueryRepository;

    /** @var array $videGameValues */
    private $videGameValues;

    /**
     * @throws \ReflectionException
     */
    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->videGameValues = [
            'tarara',
            'tururu'
        ];

        $this->VideoGameQueryRepository = self::createMock(VideoGameQueryRepositoryInterface::class);
        $this->VideoGameQueryRepository->method('getNames')
            ->willReturn($this->videGameValues);

        $this->getVideoGameNameService = new GetVideoGameNamesService($this->VideoGameQueryRepository);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function TestThatServiceReturnsExpectedData()
    {
        $resultData = $this->getVideoGameNameService->execute();

        self::assertEquals($this->videGameValues, $resultData);
    }
}
