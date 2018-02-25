<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Domain\Model\Company\Company;
use AppBundle\Domain\Model\Platform\Platform;
use AppBundle\Domain\Model\VideoGame\VideoGame;
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
        $companies = $this->loadCompanies($manager);
        $platforms = $this->loadPlatforms($manager, $companies);
        $this->loadVideoGames($manager, $platforms, $companies);

        $manager->flush();
    }

    private function loadCompanies(ObjectManager $manager)
    {
        $companies = [];

        for ($i = 0; $i < 10; $i++) {
            $company = new Company('Company ' . $i, new \DateTime());
            $companies[] = $company;
            $manager->persist($company);
        }

        return $companies;
    }

    private function loadPlatforms(ObjectManager $manager, $companies)
    {
        $platforms = [];

        for ($i = 0; $i < 10; $i++) {

            $key = array_rand($companies, 1);

            $platform = new Platform('Platform ' . $i, new \DateTime(), $companies[$key]);
            $platforms[] = $platform;
            $manager->persist($platform);
        }

        return $platforms;
    }

    private function loadVideoGames(ObjectManager $manager, $platforms, $companies)
    {
        for ($i = 0; $i < 20; $i++) {

            $keyPlatform = array_rand($platforms, 1);
            $keyCompany = array_rand($companies, 1);

            try {
                $game = new VideoGame(
                    'Game ' . $i,
                    VideoGameDescription::createFromValue(
                        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                          in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                           sunt in culpa qui officia deserunt mollit anim id est laborum. ' . $i
                    ),
                    $platforms[$keyPlatform],
                    $companies[$keyCompany]
                );
            } catch (\Exception $e) {
            }
            $manager->persist($game);
        }
    }
}