<?php

namespace App\Entity;

use App\Repository\ArtistaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtistaRepository::class)
 */
class Artista
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string|null
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string|null
     */
    private $alias;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $fechaNacimiento;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $pais;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $esCompositor;

    /**
     * @ORM\ManyToMany(targetEntity="Banda", mappedBy="miembros")
     * @var Banda[]|Collection
     */
    private $bandas;

    public function __construct()
    {
        $this->bandas = new ArrayCollection();
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
     * @return Artista
     */
    public function setId(?int $id): Artista
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
     * @return Artista
     */
    public function setNombre(?string $nombre): Artista
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    /**
     * @param string|null $apellidos
     * @return Artista
     */
    public function setApellidos(?string $apellidos): Artista
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param string|null $alias
     * @return Artista
     */
    public function setAlias(?string $alias): Artista
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento(): ?\DateTime
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param \DateTime $fechaNacimiento
     * @return Artista
     */
    public function setFechaNacimiento(?\DateTime $fechaNacimiento): Artista
    {
        $this->fechaNacimiento = $fechaNacimiento;
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
     * @return Artista
     */
    public function setPais(?string $pais): Artista
    {
        $this->pais = $pais;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEsCompositor(): ?bool
    {
        return $this->esCompositor;
    }

    /**
     * @param bool $esCompositor
     * @return Artista
     */
    public function setEsCompositor(?bool $esCompositor): Artista
    {
        $this->esCompositor = $esCompositor;
        return $this;
    }

    /**
     * @return Banda[]|ArrayCollection|Collection
     */
    public function getBandas()
    {
        return $this->bandas;
    }

    /**
     * @param Banda[]|ArrayCollection|Collection $bandas
     * @return Artista
     */
    public function setBandas($bandas)
    {
        $this->bandas = $bandas;
        return $this;
    }

}
