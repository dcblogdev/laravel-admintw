<?php

use App\Http\Livewire\Admin\SentEmails\SentEmails;
use App\Models\SentEmail;

use function Pest\Livewire\livewire;

test('can see sent emails_page', function () {
    $this->authenticate();
    $this->get(route('admin.settings.sent-emails'))->assertOk();
});

test('is redirected when not authenticated', function () {
    $this->get(route('admin.settings.sent-emails'))->assertRedirect();
});

test('can search sent emails', function () {
    $this->authenticate();
    $to = 'd.carr@theonepoint.co.uk';
    SentEmail::factory()->create(['to' => $to]);

    livewire(SentEmails::class)
        ->set('to', $to)
        ->assertSet('to', $to);
});

/** @test **/
test('cannot export unspecified format', function () {
    $this->authenticate();
    SentEmail::factory()->create();

    $response = livewire(SentEmails::class)
        ->call('export', 'png', now())
        ->assertStatus(200);

    expect($response->payload['effects'])->not->toContain('download');
});
