# Module

## Module Structure
- Each module should be self-contained with its own:
  - app
      - Controllers
      - Models
      - Providers
  - config
  - database
  - resources
      - views
  - routes
  - tests
- Follow the standard Laravel directory structure within each module.
- Use namespaces that reflect the module structure (e.g., `Modules\Admin\Controllers`).

## Module Communication
- Use events and listeners for inter-module communication.
- Use service providers for registering module components.
- Use interfaces and dependency injection for loose coupling between modules.

## Module Development
- Create new modules using the module generator command.
- Keep modules focused on a specific domain or feature set.
- Document module dependencies and requirements.

## Commands and Schedules

- Commands should be registered in the module's service provider, note commands should be imported with the `use` statement instead of using FQCNs

```php
use Modules\Contacts\Console\ImportCommand;

public function register()
{
    $this->commands([
        ImportCommand::class,
    ]);
}
```
  
Commands can be scheduled from the module service provider:
```php
protected function registerCommandSchedules(): void
  {
      $this->app->booted(function () {
          $schedule = $this->app->make(Schedule::class);

          $schedule->command(ImportCommand::class)->everyMinute();
      });
  }
```
  
## Seeders
In seeders create CRUD permissions and specify the module like:
```php
Permission::firstOrCreate(['name' => 'view_users', 'label' => 'View Users', 'module' => 'Users']);
Permission::firstOrCreate(['name' => 'view_users_profiles', 'label' => 'View Users Profiles', 'module' => 'Users']);
Permission::firstOrCreate(['name' => 'view_users_activity', 'label' => 'View Users Activity', 'module' => 'Users']);
Permission::firstOrCreate(['name' => 'add_users', 'label' => 'Add Users', 'module' => 'Users']);
Permission::firstOrCreate(['name' => 'edit_users', 'label' => 'Edit Users', 'module' => 'Users']);
Permission::firstOrCreate(['name' => 'edit_own_account', 'label' => 'Edit Own Account', 'module' => 'Users']);
Permission::firstOrCreate(['name' => 'delete_users', 'label' => 'Delete Users', 'module' => 'Users']);
```
