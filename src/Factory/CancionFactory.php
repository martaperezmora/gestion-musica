<?php

namespace App\Factory;

use App\Entity\Cancion;
use App\Repository\CancionRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Cancion>
 *
 * @method        Cancion|Proxy create(array|callable $attributes = [])
 * @method static Cancion|Proxy createOne(array $attributes = [])
 * @method static Cancion|Proxy find(object|array|mixed $criteria)
 * @method static Cancion|Proxy findOrCreate(array $attributes)
 * @method static Cancion|Proxy first(string $sortedField = 'id')
 * @method static Cancion|Proxy last(string $sortedField = 'id')
 * @method static Cancion|Proxy random(array $attributes = [])
 * @method static Cancion|Proxy randomOrCreate(array $attributes = [])
 * @method static CancionRepository|RepositoryProxy repository()
 * @method static Cancion[]|Proxy[] all()
 * @method static Cancion[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Cancion[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Cancion[]|Proxy[] findBy(array $attributes)
 * @method static Cancion[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Cancion[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CancionFactory extends ModelFactory
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
            'duracion' => null, // TODO add TIME type manually
            'titulo' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Cancion $cancion): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Cancion::class;
    }
}
