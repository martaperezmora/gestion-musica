<?php

namespace App\Entity;

use App\Repository\CancionRepository;
use Doctrine\DBAL\Types\TimeImmutableType;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CancionRepository::class)
 */
class Cancion
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
     * @ORM\Column(type="string", length=5)
     * @var string
     */
    private $duracion;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string|null
     */
    private $letra;

    /**
     * @ORM\ManyToOne(targetEntity="Disco", inversedBy="canciones")
     * @var Disco
     */
    private $disco;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Cancion
     */
    public function setId(?int $id): Cancion
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
     * @return Cancion
     */
    public function setTitulo(?string $titulo): Cancion
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDuracion(): ?string
    {
        return $this->duracion;
    }

    /**
     * @param string $duracion
     * @return Cancion
     */
    public function setDuracion(?string $duracion): Cancion
    {
        $this->duracion = $duracion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLetra(): ?string
    {
        return $this->letra;
    }

    /**
     * @param string|null $letra
     * @return Cancion
     */
    public function setLetra(?string $letra): Cancion
    {
        $this->letra = $letra;
        return $this;
    }

    /**
     * @return Disco
     */
    public function getDisco(): ?Disco
    {
        return $this->disco;
    }

    /**
     * @param Disco $disco
     * @return Cancion
     */
    public function setDisco(?Disco $disco): Cancion
    {
        $this->disco = $disco;
        return $this;
    }

}
