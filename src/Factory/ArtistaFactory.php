<?php

namespace App\Factory;

use App\Entity\Artista;
use App\Repository\ArtistaRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Artista>
 *
 * @method        Artista|Proxy create(array|callable $attributes = [])
 * @method static Artista|Proxy createOne(array $attributes = [])
 * @method static Artista|Proxy find(object|array|mixed $criteria)
 * @method static Artista|Proxy findOrCreate(array $attributes)
 * @method static Artista|Proxy first(string $sortedField = 'id')
 * @method static Artista|Proxy last(string $sortedField = 'id')
 * @method static Artista|Proxy random(array $attributes = [])
 * @method static Artista|Proxy randomOrCreate(array $attributes = [])
 * @method static ArtistaRepository|RepositoryProxy repository()
 * @method static Artista[]|Proxy[] all()
 * @method static Artista[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Artista[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Artista[]|Proxy[] findBy(array $attributes)
 * @method static Artista[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Artista[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ArtistaFactory extends ModelFactory
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        parent::__construct();

        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'compositor' => self::faker()->boolean(30),
            'fechaNacimiento' => self::faker()->dateTimeBetween('-50 years', '-18 years'),
            'nombre' => self::faker()->firstName(),
            'apellidos' => self::faker()->lastName() . ' ' . self::faker()->lastName(),
            'pais' => self::faker()->country(),
            'alias' => self::faker()->unique()->word(),
            'clave' => $this->userPasswordEncoder->encodePassword(new Artista(), '1234'),
            'admin' => false
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Artista $artista): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Artista::class;
    }
}
