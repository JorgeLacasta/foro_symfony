<?php

namespace App\Controller;

use App\Entity\Publicacion;
use App\Repository\PublicacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicacionController extends AbstractController
{
    /**
     * @Route("/ultimas", name="ultimas-publicaciones")
     */
    public function index(PublicacionRepository $pr)    //desde los controles pasan datos de ORM
    {
        //Preguntar a los modelos
        $publicaciones = $pr->findAll();


        //Pintar en vista
        return $this->render('publicacion/index.html.twig', [
            'listado_publicaciones' => $publicaciones,
        ]);

    }

    /**
     * @Route("/detalle/publicacion/{id}", name="publicacion-detalle")
     */

    /*
    public function detalle($id, PublicacionRepository $pr){

        $publicacion = $pr->find($id);

        if( $publicacion == null){
            throw $this->createNotFoundException('Ojo te has equivocado');      //exception por si no existe el id que te pasan
        }

        //Pintar en vista
        return $this->render('publicacion/detalle.html.twig', [
            'publicacion' => $publicacion
        ]);
    }
    */

    //Esta forma es mas potente, solo le pasas el Objeto publicacion y él ya hace todo
    public function detalle(Publicacion $publicacion){

        //Pintar en vista
        return $this->render('publicacion/detalle.html.twig', [
            'publicacion' => $publicacion
        ]);
    }

}
