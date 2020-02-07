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

    private function crearPublicacion(
        $título,
        $contenido,
        $fecha,
        $nombreCategoria
    ){
        $repoCat = $this->manager->getRepository(Categoria::class);
        $p = new Publicacion();
        $c = $repoCat->findOneBy(
            ['nombre' => $nombreCategoria ]
        );

        $p->setCategoria($c);
        $p->setTitulo($título);
        $p->setContenido($contenido);
        $p->setFecha($fecha);

        $this->manager->persist($p);

        $this->manager->flush();
    }

    public function load(ObjectManager $manager) {
        $this->manager = $manager;

        $this->crearPublicacion(
            "Mi primera publicación",
            "Hola mundo de Symfony",
            new \DateTime("now"),
            "Programación"
        );

        $this->crearPublicacion(
            "Receta de cocido",
            "Cocido como el de la mama, rico rico",
            new \DateTime("now"),
            "Cocina"
        );

        $this->crearPublicacion(
            "El Barsa gana la liga de Cataluña",
            "El Barsa se impuso 12-0 al Tarragona",
            new \DateTime("now"),
            "Deportes"
        );
        $this->crearPublicacion(
            "Pelea en una liga de ajedrez",
            "La pelea empezó por una disputa sobre como se movia el caballo",
            new \DateTime("now"),
            "Ajedrez"
        );
    }
}
