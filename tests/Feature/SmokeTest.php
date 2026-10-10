<?php

it('loads every class it ships', function (string $class) {
    expect(class_exists($class) || interface_exists($class) || trait_exists($class))->toBeTrue();
})->with([
    ['JeffersonGoncalves\\FilamentPluginCore\\BasePackageServiceProvider'],
    ['JeffersonGoncalves\\FilamentPluginCore\\BasePlugin'],
    ['JeffersonGoncalves\\FilamentPluginCore\\Concerns\\InteractsWithPlugin'],
]);
