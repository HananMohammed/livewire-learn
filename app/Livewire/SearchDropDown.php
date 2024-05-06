<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{
    public $search;

    public $searchResults = [];

    public function searchFilter()
    {
        $response = Http::get('https://itunes.apple.com/search/?term=' . $this->search . '&limit=10');
        $this->searchResults = $response->json()['results'] ?? [];
    }

    public function render()
    {
        return view('livewire.search-drop-down');
    }
}
