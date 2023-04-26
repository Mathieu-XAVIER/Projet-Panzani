<?php

namespace App\DataFixtures;

use App\Entity\Chef;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChefFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nomChefsRandom = [
            'Dubois',
    'Martin',
    'Durand',
    'Lefèvre',
    'Leroy',
    'Roussel',
    'Lambert',
    'Moreau',
    'Fournier',
    'Girard',
        ];

        $prenomChefsRandom = [
            'John',
            'Mary',
            'Bob',
            'Alice',
            'Tom',
            'Lisa',
            'Mike',
            'Emily',
            'David',
            'Sarah'
        ];


        for($i = 3; $i <= 10; $i++) {
            $chef = new Chef();

            $chef->setPrix(mt_rand(10, 100));

            $chef->setNom($nomChefsRandom[mt_rand(0, 9)]);

            $chef->setPrenom($prenomChefsRandom[mt_rand(0, 9)]);

            $manager->persist($chef);

        }



        $manager->flush();
    }
}
