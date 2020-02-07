<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioRepository")
 */
class Comentario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Publicacion", inversedBy="id_comentario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_publicacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getIdPublicacion(): ?Publicacion
    {
        return $this->id_publicacion;
    }

    public function setIdPublicacion(?Publicacion $id_publicacion): self
    {
        $this->id_publicacion = $id_publicacion;

        return $this;
    }
}
