<?php

namespace App\Livewire\Front;

use Livewire\Component;

use App\Models\Product\Product;
use App\Models\Product\Manufacturer;

class Index extends Component
{   
    public $manufacturer = null;
    public $stock = null;

    public function render()
    {   
        $manufacturer = $this->manufacturer;
        $stock = $this->stock;

        $manufacturers = Manufacturer::orderBy('name')->get();

        $items = Product::with(['manufacturer'])->when(!empty($manufacturer), function ($query) use ($manufacturer) {
            $query->where('manufacturer_id', $manufacturer);
        })->when(!empty($stock), function ($query) use ($stock) {
            if($stock == 1)
            {
                $query->where('stock', '<', 1);
            }
            if($stock == 2)
            {
                $query->where('stock', '>', 0);
            }
        })->orderBy('name')->get();

        return view('livewire.front.index')->with(['items' => $items, 'manufacturers' => $manufacturers]);
    }
}
