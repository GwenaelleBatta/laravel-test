<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectOrder extends Component
{
    public $options;
    public $sortOrder;

    public function mount()
    {
        $this->options  = ['Oldest','Newest'];
    }

    public function updatedByOrder(){
        $this->emit('updatedByOrder', $this->sortOrder);
    }

    public function render()
    {
        return view('livewire.select-order');
    }
}
