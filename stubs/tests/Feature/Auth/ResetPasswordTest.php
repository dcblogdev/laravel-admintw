<?php

test('reset password link screen can be rendered', function () {
    $this->get(route('password.request'))->assertStatus(200);
});
