<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PollingExample extends Component
{
    public $revenue;

    public function mount()
    {
        $this->getRevenue();
    }

    public function getRevenue()
    {
        $this->revenue = DB::table('orders')->sum('price');
    }

    public function render()
    {
        return view('livewire.polling-example');
    }
}
