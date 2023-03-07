<?php

namespace App\Entity;

use App\Repository\BandaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BandaRepository::class)
 */
class Banda
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
    private $nombre;

    /**
     * @ORM\Column(type="integer", length=4)
     * @var int
     */
    private $anioCreacion;

    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $pais;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $genero;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $activo;

    /**
     * @ORM\ManyToMany(targetEntity="Artista", inversedBy="bandas")
     * @var Artista[]|Collection
     */
    private $miembros;

    /**
     * @ORM\OneToMany(targetEntity="Disco", mappedBy="banda")
     * @var Disco[]|Collection
     */
    private $discos;


    public function __construct()
    {
        $this->miembros = new ArrayCollection();
        $this->discos = new ArrayCollection();
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
     * @return Banda
     */
    public function setId(?int $id): Banda
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Banda
     */
    public function setNombre(?string $nombre): Banda
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnioCreacion(): ?int
    {
        return $this->anioCreacion;
    }

    /**
     * @param int $anioCreacion
     * @return Banda
     */
    public function setAnioCreacion(?int $anioCreacion): Banda
    {
        $this->anioCreacion = $anioCreacion;
        return $this;
    }

    /**
     * @return string
     */
    public function getPais(): ?string
    {
        return $this->pais;
    }

    /**
     * @param string $pais
     * @return Banda
     */
    public function setPais(?string $pais): Banda
    {
        $this->pais = $pais;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenero(): ?string
    {
        return $this->genero;
    }

    /**
     * @param string $genero
     * @return Banda
     */
    public function setGenero(?string $genero): Banda
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    /**
     * @param bool $activo
     * @return Banda
     */
    public function setActivo(?bool $activo): Banda
    {
        $this->activo = $activo;
        return $this;
    }

    /**
     * @return Artista[]|ArrayCollection|Collection
     */
    public function getMiembros()
    {
        return $this->miembros;
    }

    /**
     * @param Artista[]|ArrayCollection|Collection $miembros
     * @return Banda
     */
    public function setMiembros($miembros)
    {
        $this->miembros = $miembros;
        return $this;
    }

    /**
     * @return Disco[]|ArrayCollection|Collection
     */
    public function getDiscos()
    {
        return $this->discos;
    }

    /**
     * @param Disco[]|ArrayCollection|Collection $discos
     * @return Banda
     */
    public function setDiscos($discos)
    {
        $this->discos = $discos;
        return $this;
    }

}
