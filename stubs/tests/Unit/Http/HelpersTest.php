<?php

test('can does return false for user role with no permissions set', function () {
    $this->authenticate('user');
    expect(can('view_dashboard'))->toBeFalse;
});

test('can does return true for admin', function () {
    $this->authenticate();
    expect(can('view_dashboard'))->toBeTrue();
});

test('cannot does return false for user role with no permissions set', function () {
    $this->authenticate('user');
    expect(cannot('view_dashboard'))->toBeTrue;
});

test('cannot does return true for admin', function () {
    $this->authenticate();
    expect(cannot('view_dashboard'))->toBeFalse();
});

test('hasRole return true when role exists on user', function () {
    $this->authenticate();
    expect(hasRole('user'))->toBeFalse();
});

test('abort_if_cannot runs exception', function () {
    $this->authenticate('user');
    abort_if_cannot('view_dashboard');
})->throws(Exception::class);

test('add_user_log adds data', function () {
    $this->authenticate();
    add_user_log([
        'title' => 'some action',
    ]);

    $this->assertDatabaseHas('audit_trails', ['title' => 'some action']);
});

test('create_avatar returns string', function () {
    expect(create_avatar('demo', 'demo.png', '/'))->toBeString();
});

test('can calculate vat', function () {
    expect(vat(100, '120.00'))->toBe('2.20');
});

test('can calculate size in readable format', function () {
    expect(size_readable(1024))->toBe('1kB');
});

test('can look inside multi-array', function () {
    $items = [
        [
            'first' => 1,
            'two' => [
                'third' => 3,
            ],
        ],
    ];
    expect(in_array_r(3, $items))->toBeTrue();
});

test('can look inside multi-array for none matches', function () {
    $items = [
        [
            'first' => 1,
            'two' => [
                'third' => 3,
            ],
        ],
    ];
    expect(in_array_r('hey', $items))->toBeFalse();
});

test('storage_exists returns false for none existing file', function () {
    expect(storage_exists('somefile.png'))->toBe(false);
});

test('storage_url returns string', function () {
    expect(storage_url('somefile.png'))->toBeString();
});
