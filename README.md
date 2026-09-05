<div class="filament-hidden">

![Filament Plugin Core](https://raw.githubusercontent.com/jeffersongoncalves/filament-plugin-core/1.x/art/jeffersongoncalves-filament-plugin-core.png)

</div>

# Filament Plugin Core

[![Buy Me A Coffee](https://img.shields.io/badge/Buy%20Me%20A%20Coffee-support-FFDD00?style=flat-square&logo=buy-me-a-coffee&logoColor=black)](https://buymeacoffee.com/jeffersongoncalves)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-plugin-core.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-plugin-core)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-plugin-core/fix-php-code-style-issues.yml?branch=1.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-plugin-core/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A1.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-plugin-core.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-plugin-core)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-plugin-core.svg?style=flat-square)](LICENSE.md)

Shared base classes for the [jeffersongoncalves](https://github.com/jeffersongoncalves) family of Filament plugins. It removes the skeleton boilerplate every plugin used to copy-paste: the `Plugin` contract implementation, the Spatie `PackageServiceProvider` wiring, and Filament render-hook registration.

## Version Compatibility

| Branch | Filament | PHP | Laravel |
|--------|----------|-----|---------|
| 1.x | 3.x | ^8.2 | ^11.0 |
| 2.x | 4.x | ^8.2 | ^11.0 |
| 3.x | 5.x | ^8.2 | ^11.0 |

## Requirements

- PHP 8.2 or higher
- Laravel 11.0 or higher
- Filament 3.x (1.x branch)

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-plugin-core:"^1.0"
```

## What it provides

- **`BasePlugin`** — implements `Filament\Contracts\Plugin` with the canonical `make()`/`get()` factory pair and no-op `register()`/`boot()`. Subclasses only declare `getId()`.
- **`Concerns\InteractsWithPlugin`** — the `make()`/`get()` pair as a standalone trait, for plugins that cannot extend `BasePlugin`.
- **`BasePackageServiceProvider`** — extends Spatie's `PackageServiceProvider` and adds `registerRenderHooks([$hook => $view])` to collapse render-hook closures.

## Usage

### Plugin

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

### Service Provider

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

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
