# Tests

All use cases should be tested to have as much code coverage as possible.

## Testing Approach
- Use Pest PHP for testing.
  - Test method should use `test()` 
  - use $this->get() etc. instead of get() and related functions.
- Organize tests to mirror the application structure.
- Use descriptive test names that explain what is being tested.
- Use factories and seeders for test data.
- Use database transactions for test isolation.

## Test Types
- Unit Tests: Test individual classes and methods in isolation.
- Feature Tests: Test the integration of multiple components.

## Test Coverage
- Aim for high test coverage, especially for critical paths.
- Test edge cases and error conditions.
- Test both happy and unhappy paths.
- Test authorization and validation.

## Component Testing
- Test each component in isolation.
- Test component state and actions.
- Use Livewire's testing utilities for component testing.
- Test edge cases and error conditions.
- Tests must use Pest style, not PHPUnit style.
- Tests don't need to run `RefreshDatabase`.
- Tests must use `beforeEach` when there are multiple tests that need the same setup.
- Don't use multiple $response variables when you can chain methods.
- Don't use local variables if not needed.
- use $this->getJson instead of getJson helpers same for PostJson, PatchJson and DeleteJson

Example:
```php
beforeEach(function () {
    $this->authenticate();
});

test('user can view their profile', function () {
    $this
      ->getJson(route('api.v1.users.profile'))
      ->assertOk();
});
```