<?php

namespace App\Entity;

use App\Repository\DiscoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscoRepository::class)
 */
class Disco
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $titulo;

    /**
     * @ORM\Column(type="integer", length=4)
     * @var int
     */
    private $anioLanzamiento;

    /**
     * @ORM\Column(type="string", length=10)
     * @var string
     */
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity="Cancion", mappedBy="disco")
     * @var Cancion[]|Collection
     */
    private $canciones;

    /**
     * @ORM\ManyToOne(targetEntity="Banda", inversedBy="discos")
     * @var Banda
     */
    private $banda;


    public function __construct()
    {
        $this->canciones = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Disco
     */
    public function setId(?int $id): Disco
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     * @return Disco
     */
    public function setTitulo(?string $titulo): Disco
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnioLanzamiento(): ?int
    {
        return $this->anioLanzamiento;
    }

    /**
     * @param int $anioLanzamiento
     * @return Disco
     */
    public function setAnioLanzamiento(?int $anioLanzamiento): Disco
    {
        $this->anioLanzamiento = $anioLanzamiento;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return Disco
     */
    public function setTipo(?string $tipo): Disco
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return Cancion[]|ArrayCollection|Collection
     */
    public function getCanciones()
    {
        return $this->canciones;
    }

    /**
     * @param Cancion[]|ArrayCollection|Collection $canciones
     * @return Disco
     */
    public function setCanciones($canciones)
    {
        $this->canciones = $canciones;
        return $this;
    }

    /**
     * @return Banda
     */
    public function getBanda(): ?Banda
    {
        return $this->banda;
    }

    /**
     * @param Banda $banda
     * @return Disco
     */
    public function setBanda(?Banda $banda): Disco
    {
        $this->banda = $banda;
        return $this;
    }

    public function __toString()
    {
        return $this->getTitulo();
    }

}
