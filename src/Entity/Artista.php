<?php

namespace App\Entity;

use App\Repository\ArtistaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ArtistaRepository::class)
 */
class Artista implements UserInterface
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
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $alias;

    /**
     * @ORM\Column(type="string")
     * @var string|null
     */
    private $clave;

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
    private $compositor;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $admin;

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
    public function isCompositor(): ?bool
    {
        return $this->compositor;
    }

    /**
     * @param bool $compositor
     * @return Artista
     */
    public function setCompositor(?bool $compositor): Artista
    {
        $this->compositor = $compositor;
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

    /**
     * @return string|null
     */
    public function getClave(): ?string
    {
        return $this->clave;
    }

    /**
     * @param string|null $clave
     * @return Artista
     */
    public function setClave(?string $clave): Artista
    {
        $this->clave = $clave;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     * @return Artista
     */
    public function setAdmin(bool $admin): Artista
    {
        $this->admin = $admin;
        return $this;
    }

    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();
    }

    public function getRoles()
    {
        $roles = ['ROLE_ARTISTA'];

        if ($this->isAdmin()) {
            $roles[] = 'ROLE_ADMIN';
        }
        if ($this->isCompositor()) {
            $roles[] = 'ROLE_COMPOSITOR';
        }
        return $roles;
    }

    public function getPassword()
    {
        return $this->getClave();
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->getAlias();
    }

    public function eraseCredentials()
    {
    }
}
