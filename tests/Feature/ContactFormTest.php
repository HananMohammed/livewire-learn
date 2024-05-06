<?php

use App\Livewire\ContactForm;
use Livewire\Livewire;

test('contact form', function () {
    $response = $this->get('/contact')
        ->assertSeeLivewire('contact-form');

    
    $response->assertStatus(200);
});


test('contact form submit', function () {
    Livewire::test(ContactForm::class)
    ->set('name', 'John')
    ->set('email', 'a@a.com')
    ->set('phone', '123456')
    ->set('message', 'Hello')
    ->call('submitForm')
    ->assertStatus(200);

});
