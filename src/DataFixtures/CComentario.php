<?php

namespace App\DataFixtures;

use App\Entity\Comentario;
use App\Entity\Publicacion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CComentario extends Fixture
{
    private $manager;

    private function crearPublicacion(
        $fecha,
        $contenido,
        $id_publicacion
    ){
        $repoCat = $this->manager->getRepository(Categoria::class);
        $p = new Comentario();

        $p->setFecha($fecha);
        $p->setContenido($contenido);
        $p->setIdPublicacion($id_publicacion);

        $this->manager->persist($p);

        $this->manager->flush();
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->crearPublicacion(
            new \DateTime("now"),
            "Que buena idea",
            9
        );

    }

}
