<?php

namespace App\Http\Livewire\Pages;

use App\Mail\ContactMail;
use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactPage extends Component
{
    public $name = '';
    public $email = '';
    public $content = '';
    public $message2 = '';

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'content'=>'required|min:6'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'content'=>'required|min:6'
        ]);
    }

    public function mount(){

    }

    public function sendMail() {
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'content'=>'required|min:6'
        ]);
        // $validatedData = $this->validate();

        Contact::create($validatedData);

        Mail::to('phanvan0322@gmail.com')->send(new ContactMail($this->name, $this->email, $this->content));
        $this->name = '';
        $this->email = '';
        $this->content = '';
        $this->message2 = "Thêm liên hệ thành công";
    }

    public function render()
    {
        return view('livewire.pages.contact-page',[
            
        ])->layout('layouts/home-layout', ['title' => 'Trang liên hệ']);
    }
}
