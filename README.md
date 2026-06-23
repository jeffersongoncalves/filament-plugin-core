# Filament Plugin Core

Shared base classes for the [jeffersongoncalves](https://github.com/jeffersongoncalves) family of Filament plugins. It removes the skeleton boilerplate every plugin used to copy-paste.

## Compatibility

| Branch | Filament | Install                                              |
|--------|----------|-----------------------------------------------------|
| `1.x`  | v3       | `composer require jeffersongoncalves/filament-plugin-core:^1.0` |
| `2.x`  | v4       | `composer require jeffersongoncalves/filament-plugin-core:^2.0` |
| `3.x`  | v5       | `composer require jeffersongoncalves/filament-plugin-core:^3.0` |

## What it provides

- `BasePlugin` — implements `Filament\Contracts\Plugin` with the canonical `make()`/`get()` factory pair and no-op `register()`/`boot()`. Subclasses only declare `getId()`.
- `Concerns\InteractsWithPlugin` — the `make()`/`get()` pair as a standalone trait for plugins that cannot extend `BasePlugin`.
- `BasePackageServiceProvider` — extends Spatie's `PackageServiceProvider` and adds `registerRenderHooks([$hook => $view])` to collapse render-hook closures.

## Usage

```php
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;

class MyPlugin extends BasePlugin
{
    public function getId(): string
    {
        return 'my-plugin';
    }
}
```

```php
use Filament\View\PanelsRenderHook;
use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class MyServiceProvider extends BasePackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('my-plugin')->hasTranslations();
    }

    public function packageRegistered(): void
    {
        $this->registerRenderHooks([
            PanelsRenderHook::HEAD_START => 'my-plugin::script',
        ]);
    }
}
```

## License

The MIT License (MIT). See [LICENSE.md](LICENSE.md).
