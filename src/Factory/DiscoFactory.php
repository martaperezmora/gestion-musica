<?php

namespace App\Factory;

use App\Entity\Disco;
use App\Repository\DiscoRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Disco>
 *
 * @method        Disco|Proxy create(array|callable $attributes = [])
 * @method static Disco|Proxy createOne(array $attributes = [])
 * @method static Disco|Proxy find(object|array|mixed $criteria)
 * @method static Disco|Proxy findOrCreate(array $attributes)
 * @method static Disco|Proxy first(string $sortedField = 'id')
 * @method static Disco|Proxy last(string $sortedField = 'id')
 * @method static Disco|Proxy random(array $attributes = [])
 * @method static Disco|Proxy randomOrCreate(array $attributes = [])
 * @method static DiscoRepository|RepositoryProxy repository()
 * @method static Disco[]|Proxy[] all()
 * @method static Disco[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Disco[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Disco[]|Proxy[] findBy(array $attributes)
 * @method static Disco[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Disco[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class DiscoFactory extends ModelFactory
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
            'anioLanzamiento' => self::faker()->randomNumber(),
            'tipo' => self::faker()->text(10),
            'titulo' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Disco $disco): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Disco::class;
    }
}
