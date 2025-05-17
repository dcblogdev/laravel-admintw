<?php

declare(strict_types=1);

test('renders correct textarea without extra spaces', function () {
    test()->withViewErrors([])
        ->blade('<x-form.textarea name="about" id="about">Hello</x-form.textarea>')
        ->assertSeeInOrder([
            '<textarea',
            "name='about'",
            "id='about'",
            '>Hello</textarea>',
        ], false);
});
