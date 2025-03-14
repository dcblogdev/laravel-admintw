## Laravel AdminTW

> **Note:** From version 5 AdminTW is a complete project rather than a package. If you are looking for the package version, please use version 4.

Laravel AdminTW is a **Laravel Livewire Starter Kit** and a **TALL stack admin theme**, designed for rapid development and ease of use.

![AdminTW](https://laraveladmintw.com/images/docsv5/settings-light.png)

AdminTW is built on top of **Laravel, Livewire, and Tailwind CSS**, offering a modern and efficient admin dashboard.

### **Features**
- **Two-Factor Authentication (2FA)**
- **Audit Trails**
- **System Settings**
- **Multiple Users Support**
- **Roles and Permissions Management**
- **Comprehensive Test Suite (Pest PHP)**
- **Light & Dark Mode Support** (based on user OS settings)
- **Tests**


## Installation

1. Clone the repository

```bash
git clone git@github.com:dcblogdev/laravel-admintw.git
```

Open the project folder

```bash
cd laravel-admintw
```

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Set database and emails settings inside `.env`

2. Run `composer install`
3. Run `npm install && npm run build`
4. run `php artisan key:generate`
5. run `php artisan storage:link`
6. Run `php artisan migrate --seed`
7. Run `php artisan serve`

Laravel AdminTW supports both light and dark mode based on the users OS.

Provided are blade and Laravel Livewire components for common layout / UI elements and a complete test suite (Pest PHP).

## Documentation

Complete docs at [laraveladmintw.com](https://laraveladmintw.com)

## Community

There is a Discord community. https://discord.gg/VYau8hgwrm For quick help, ask questions in the appropriate channel.

## Contributing

Contributions are welcome and will be fully credited.

## Pull Requests

- **Document any change in behaviour** - Make sure the `readme.md` and any other relevant documentation are kept up-to-date.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

## Security

If you discover any security related issues, please email dave@dcblog.dev email instead of using the issue tracker.

## License

Laravel AdminTW is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
