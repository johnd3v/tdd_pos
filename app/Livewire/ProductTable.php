<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
class ProductTable extends DataTableComponent
{


    protected $model = Product::class;
    public function configure(): void
    {
        $this->setPrimaryKey('id'); 
        $this->setColumnSelectStatus(false); 
       
    }

    public function columns(): array
    {
        return [
            Column::make('Image', 'image')
            ->format(function ($value, $row) {
                return $value
                    ? '<img src="' . asset('storage/' . $value) . '" width="50" height="50" class="rounded">'
                    : 'No Image';
            })->html(),
            Column::make('Name', 'name')->sortable()->searchable(),
            Column::make('Type', 'type')->sortable()->searchable(),
            Column::make('Shelf Code', 'shelf_code')->sortable()->searchable(),
            Column::make('Price', 'price')->sortable()->searchable(),
        ];
    }
}
