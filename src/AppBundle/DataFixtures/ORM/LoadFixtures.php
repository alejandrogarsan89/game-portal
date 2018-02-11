<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Domain\Model\Entity\VideoGame;
use AppBundle\Domain\Model\VideoGame\VideoGameDescription;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LoadFixtures extends Fixture implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $game = new VideoGame(
                'Game ' . $i,
                VideoGameDescription::createFromValue(
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                      in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                       sunt in culpa qui officia deserunt mollit anim id est laborum. ' . $i
                )
            );
            $manager->persist($game);
        }
        $manager->flush();
    }
}