<p align="center"><img src="https://laraveladmintw.com/images/v3/admintw.png"></p>

## Laravel AdminTW

Laravel AdminTW is a TALL admin theme.

Includes:
- 2FA
- Audit Trails
- System Settings
- Multiple Users
- Roles and Permissions
- Tests

Laravel AdminTW supports both light and dark mode based on the users OS.

Provided are blade and Laravel Livewire components for common layout / UI elements and a complete test suite (Pest PHP).

- [Install](#install)
- [Documentation](#documentation)

## Install

Install a fresh copy of Laravel then use require this package with composer:

```bash
composer require dcblogdev/laravel-admintw
```
Then install using the command:

```bash
php artisan admintw:install
```

Run composer

```bash
composer update
```

>Ensure you've updated .env before migrating.

Migrate and seed the database

```
php artisan db:build
```

Link Storage to public

```
php artisan storage:link
```

To compile your assets:

```bash
npm install && npm run dev
```

Run the tests by running PestPHP

```bash
vendor/bin/pest
```

## Documentation

Complete docs at [laraveladmintw.com](https://laraveladmintw.com)

## Contributing

Contributions are welcome and will be fully credited.

## Pull Requests

- **Document any change in behaviour** - Make sure the `readme.md` and any other relevant documentation are kept up-to-date.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

## Security

If you discover any security related issues, please email dave@dcblog.dev email instead of using the issue tracker.

## License

Laravel AdminTW is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
