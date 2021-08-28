<?php

test('can see edit user page', function(){
    $this->authenticate();
    $this->get(route('app.users.edit'))->assertOk();
});

test('is redirected when not authenticated', function(){
    $this->get(route('app.users.edit'))->assertRedirect();
});
