<?php

namespace App\Factory;

use App\Entity\Banda;
use App\Repository\BandaRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Banda>
 *
 * @method        Banda|Proxy create(array|callable $attributes = [])
 * @method static Banda|Proxy createOne(array $attributes = [])
 * @method static Banda|Proxy find(object|array|mixed $criteria)
 * @method static Banda|Proxy findOrCreate(array $attributes)
 * @method static Banda|Proxy first(string $sortedField = 'id')
 * @method static Banda|Proxy last(string $sortedField = 'id')
 * @method static Banda|Proxy random(array $attributes = [])
 * @method static Banda|Proxy randomOrCreate(array $attributes = [])
 * @method static BandaRepository|RepositoryProxy repository()
 * @method static Banda[]|Proxy[] all()
 * @method static Banda[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Banda[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Banda[]|Proxy[] findBy(array $attributes)
 * @method static Banda[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Banda[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class BandaFactory extends ModelFactory
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
            'activo' => self::faker()->boolean(),
            'anioCreacion' => self::faker()->randomNumber(),
            'genero' => self::faker()->text(),
            'nombre' => self::faker()->text(255),
            'pais' => self::faker()->text(50),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Banda $banda): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Banda::class;
    }
}
