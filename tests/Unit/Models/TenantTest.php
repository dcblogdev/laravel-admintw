<?php

use App\Models\Tenant;
use Database\Factories\TenantFactory;

test('has tenant factory', function () {
    $tenantFactory = Tenant::factory();
    expect($tenantFactory)->toBeInstanceOf(TenantFactory::class);
});
