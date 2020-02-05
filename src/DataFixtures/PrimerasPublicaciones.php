<?php

namespace App\DataFixtures;

use App\Entity\Publicacion;
use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures;

class PrimerasPublicaciones extends Fixture{

    private $manager;

    public function load(ObjectManager $manager){

        $p = new Publicacion();
        $repoCat = $manager->getRepository(Categoria::class);

        $c = $repoCat->findOneBy(
            ['nombre' => 'Cocina']
        );

        $p->setCategoria($c);
        $p->setTitulo("Receta para hacer un cocido");
        $p->setContenido("Cocido como el que hace la mama, rico rico");
        $p->setFecha(new \DateTime("now"));

        $manager->persist($p);

        $manager->flush();
    }
}
