<?php

namespace App\Livewire;

use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required|min:5',
    ];


    public function submitForm()
    {
        $contact = $this->validate();
        Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));
        $this->successMessage = 'We received your message successfully and will get back to you shortly!';
         session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');

        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }


    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }

}
