<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $active = true;
    private $users;

    public function render()
    {
        $this->users = User::where('active', $this->active)->paginate(10);
//        dump($this->active);
        return view('livewire.datatable', ['users' => $this->users]);
    }

//    public function paginationView()
//    {
//        return 'livewire.custom-pagination-links-view';
//    }
}
