<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $active = true;
    public $search;
    public $sortField;
    public $sortAsc = true;
    private $users;

    protected $queryString = [
        'search',
        'active',
        'sortAsc'
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function rendering()
    {
        if (filled($this->search)) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $this->users = User::where('active', $this->active)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'ASC' : "DESC");
            })
             ->paginate(10);

        return view('livewire.datatable', ['users' => $this->users]);
    }

//    public function paginationView()
//    {
//        return 'livewire.custom-pagination-links-view';
//    }
}
