<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MallCart extends Component
{
    public $cartItems = [];

    protected $listeners = ['cartUpdated' => 'onCartUpdated'];

    public function mount()
    {
        $this->cartItems = \Cart::getContent()->toArray();
    }

    public function onCartUpdated()
    {
        $this->mount();
    }
    public function render()
    {
        return view('livewire.mall-cart');
    }
}
