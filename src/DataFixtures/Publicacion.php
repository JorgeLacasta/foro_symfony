<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Publicacion extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $titulos = ['que chulo', 'como mola', 'vaya KK'];
       $contenidos = ['es una buena idea porque....', 'que cosa mas chula me encanta...', 'esto es una mierda, vaya KK'];
       $fechas = ['02-02-2020', '01-02-2020', '30-01-2020'];



        for ($i = 0; $i < count($titulos); $i++ ){
            $publi = new Publicacion();
            $publi->setTitulo($titulos[$i]);
            $publi->setContenido($contenidos[$i]);
            $publi->setFecha($fechas[$i]);

            $manager->persist($publi);
        }

        $manager->flush();
    }
}
