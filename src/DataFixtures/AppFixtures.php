<?php

namespace App\DataFixtures;

use App\Factory\ArtistaFactory;
use App\Factory\BandaFactory;
use App\Factory\CancionFactory;
use App\Factory\DiscoFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        ArtistaFactory::createOne([
            'nombre' => 'Juan',
            'apellidos' => 'Moreno Herrera',
            'alias' => 'admin',
            'fechaNacimiento' => new \DateTime(),
            'pais' => 'España',
            'compositor' => false,
            'admin' => true
        ]);

        ArtistaFactory::createMany(12);

        BandaFactory::createMany(4, function (){
            return [
                'miembros' => ArtistaFactory::randomRange(3,5),
            ];
        });

        DiscoFactory::createMany(30, function (){
            return[
                'banda' => BandaFactory::random()
            ];
        });

        CancionFactory::createMany(120, function (){
           return[
             'disco' => DiscoFactory::random()
           ];
        });

        $manager->flush();
    }
}
