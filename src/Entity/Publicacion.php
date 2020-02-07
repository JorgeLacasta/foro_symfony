<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PublicacionRepository")
 */
class Publicacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="publicacions", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentario", mappedBy="id_publicacion")
     */
    private $id_comentario;

    public function __construct()
    {
        $this->id_comentario = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection|Comentario[]
     */
    public function getIdComentario(): Collection
    {
        return $this->id_comentario;
    }

    public function addIdComentario(Comentario $idComentario): self
    {
        if (!$this->id_comentario->contains($idComentario)) {
            $this->id_comentario[] = $idComentario;
            $idComentario->setIdPublicacion($this);
        }

        return $this;
    }

    public function removeIdComentario(Comentario $idComentario): self
    {
        if ($this->id_comentario->contains($idComentario)) {
            $this->id_comentario->removeElement($idComentario);
            // set the owning side to null (unless already changed)
            if ($idComentario->getIdPublicacion() === $this) {
                $idComentario->setIdPublicacion(null);
            }
        }

        return $this;
    }

}
