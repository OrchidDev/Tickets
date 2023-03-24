<?php

namespace App\Http\Livewire\Support\Groups;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.support.groups.index')
            ->extends('layouts.app')
            ->section('content');
    }
}
