<?php

namespace JeffersonGoncalves\FilamentPluginCore\Concerns;

/**
 * Shared factory helpers for Filament plugins.
 *
 * Provides the canonical make()/get() pair used across every
 * jeffersongoncalves Filament plugin so each plugin only has to
 * declare its own id and behaviour.
 */
trait InteractsWithPlugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
