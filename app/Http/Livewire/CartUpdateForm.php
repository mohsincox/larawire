<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartUpdateForm extends Component
{
    public $cartItem = [];

    public $quantity = 0;

    public function mount($cartItem)
    {
        $this->cartItem = $cartItem;

        $this->quantity = $cartItem['quantity'];
    }

    public function minusItem()
    {
        // dd('test');
        $this->quantity = $this->quantity - 1;
        \Cart::update($this->cartItem['id'],[
            'quantity' => array(
                'relative' => false,
                'value' => $this->quantity
            )
        ]);

        $this->emit('cartUpdated');
    }

    public function plusItem()
    {
        $this->quantity = $this->quantity + 1;
        \Cart::update($this->cartItem['id'],[
            'quantity' => array(
                'relative' => false,
                'value' => $this->quantity
            )
        ]);
        $this->emit('cartUpdated');
    }

    public function updateCart()
    {
        \Cart::update($this->cartItem['id'],[
            'quantity' => array(
                'relative' => false,
                'value' => $this->quantity
            )
        ]);
        $this->emit('cartUpdated');
    }

    public $isDisabled = false;

    public function render()
    {
        if ($this->quantity <= 1) {
            $this->isDisabled = true;
        }else{
            $this->isDisabled = false;
        }
        return view('livewire.cart-update-form');
    }
}
