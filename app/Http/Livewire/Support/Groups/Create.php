<?php

namespace App\Http\Livewire\Support\Groups;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.support.groups.create')
            ->extends('layouts.app')
            ->section('content');
    }
}
