<?php

namespace JeffersonGoncalves\FilamentPluginCore;

use Filament\Contracts\Plugin;
use Filament\Panel;
use JeffersonGoncalves\FilamentPluginCore\Concerns\InteractsWithPlugin;

/**
 * Base implementation of the Filament Plugin contract.
 *
 * Subclasses only need to implement getId(); register()/boot() default
 * to no-ops and can be overridden when the plugin registers resources,
 * pages or widgets.
 */
abstract class BasePlugin implements Plugin
{
    use InteractsWithPlugin;

    abstract public function getId(): string;

    public function register(Panel $panel): void {}

    public function boot(Panel $panel): void {}
}
