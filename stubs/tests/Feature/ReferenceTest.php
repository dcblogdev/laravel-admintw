<?php

/*test('can see reference', function () {
    $this->authenticate('developer');

    $this->get(route('admin.developer.reference'))->assertOk();
});*/

test('cannot see reference as a user', function () {
    $this->authenticate('user');

    $this->get(route('admin.developer.reference'))->assertRedirect();
});