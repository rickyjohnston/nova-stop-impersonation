# Stop Impersonation for Laravel Nova
Laravel Nova provides an easy way for you to start impersonating a User in your application. Unfortunately, the only way to stop impersonating and return to your account is via Nova. If the User you're impersonating doesn't have access to Nova, then you need to sign out and reauthenticate.

We can make this easier!

This package contains a Blade component that can be added to any Laravel application to add a quick way to switch back to your User from your application frontend - no need to sign out _or_ return to Nova.

![Package in action](/demo/demo.gif)

## Installation

Install using Composer:

```bash
composer require rickyj/nova-stop-impersonation
```

## Basic usage

This package registers a Blade component that can be added to your application's layout file:

```blade
<x-stop-impersonation />
```

## Credits

* [Ricky Johnston](https://www.github.com/rickyjohnston)

## License
The MIT License (MIT). Please see License File for more information.
