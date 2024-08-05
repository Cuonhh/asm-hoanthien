<?php

namespace App\View\Components\site;

use App\Models\Additional_info;
use Illuminate\View\Component;

class footer2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $logo;
    public $address;
    public $phone;
    public $email;
    public function __construct()
    {
        $this->logo = Additional_info::where('title', 'logo')->value('content');
        $this->address = Additional_info::where('title', 'address')->value('content');
        $this->phone = Additional_info::where('title', 'phone')->value('content');
        $this->email = Additional_info::where('title', 'email')->value('content');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.footer2');
    }
}
