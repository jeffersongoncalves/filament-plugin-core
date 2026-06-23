<?php

namespace JeffersonGoncalves\FilamentPluginCore;

use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\View\View;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * Base package service provider for jeffersongoncalves Filament plugins.
 *
 * Adds a small helper for registering Filament render hooks from a
 * [hook => view] map, removing the repeated closure boilerplate that
 * every analytics/UI injector package used to copy-paste.
 */
abstract class BasePackageServiceProvider extends PackageServiceProvider
{
    /**
     * Register a set of render hooks from a [hook => view-name] map.
     *
     * @param  array<string, string>  $hooks
     */
    protected function registerRenderHooks(array $hooks): void
    {
        foreach ($hooks as $hook => $view) {
            FilamentView::registerRenderHook($hook, fn (): View => view($view));
        }
    }
}
