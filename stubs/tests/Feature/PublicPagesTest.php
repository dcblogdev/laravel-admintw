<?php

test('can see home page')->get('/')->assertOk();

test('is redirected when not authenticated')->get('app')->assertRedirect();
