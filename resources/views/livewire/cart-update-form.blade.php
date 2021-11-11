<div>
    <button class="btn btn-primary btn-sm" {{ $isDisabled ? 'disabled' : '' }} data-type="minus" wire:click="minusItem">-</button>
    <input type="text" wire:model="quantity" disabled wire:change="updateCart">
    <button class="btn btn-success btn-sm" wire:click="plusItem">+</button> 
</div>
