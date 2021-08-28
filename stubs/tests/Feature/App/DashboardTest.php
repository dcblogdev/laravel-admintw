<?php

test('can see dashboard when authenticated', function() {
    $this->authenticate();
    $this->get(route('app'))->assertOk();
});

test('is redirected when not authenticated', function(){
    $this->get(route('app'))->assertRedirect();
});
