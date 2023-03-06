<?php

namespace App\Factory;

use App\Entity\Artista;
use App\Repository\ArtistaRepository;
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
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'esCompositor' => self::faker()->boolean(),
            'fechaNacimiento' => self::faker()->dateTime(),
            'nombre' => self::faker()->text(255),
            'pais' => self::faker()->text(255),
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
