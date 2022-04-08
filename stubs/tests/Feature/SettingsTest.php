<?php

test('can see sent emails page', function () {
    $this->authenticate();
    $this->get(route('admin.settings.sent-emails'))->assertOk();
});
