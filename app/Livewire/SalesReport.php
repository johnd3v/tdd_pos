<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Sale;
use Carbon\Carbon;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;

class SalesReport extends DataTableComponent
{

    protected $model = Sale::class;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function filters(): array{
        return [
            DateRangeFilter::make('Report Range')
            ->config([
                'allowInput' => false,   
                'altFormat' => 'F j, Y', 
                'ariaDateFormat' => 'F j, Y', 
                'dateFormat' => 'Y-m-d', 
                'earliestDate' => Carbon::now()->startOfYear(), 
                'latestDate' => Carbon::now(), // The latest acceptable date
                'placeholder' => 'Select Date Range For Report', 
                'locale' => 'en',
            ])
            ->setFilterPillValues([0 => 'minDate', 1 => 'maxDate']) 
            ->filter(function (Builder $builder, array $dateRange) {
                $builder
                    ->whereDate('created_at', '>=', $dateRange['minDate']) 
                    ->whereDate('created_at', '<=', $dateRange['maxDate']);
            }),
        ];

    }


    public function columns(): array
    {
        return [
            Column::make("Product name", "product_name")
                ->sortable()
                ->searchable()
                ->footer(fn() => 'Grand Total'),

            Column::make("Shelf code", "shelf_code")
                ->sortable(),

            Column::make("Renter", "renter")
                ->sortable()
                ->searchable(),

            Column::make("Price", "price")
                ->sortable()
                ->format(fn($value) => number_format($value, 2)),

            Column::make("Quantity", "quantity")
                ->sortable(),

            Column::make("Total")
                ->label(fn($row) => number_format($row->price * $row->quantity, 2))
                ->footer(fn($rows) => number_format($rows->sum(fn($sale) => $sale->price * $sale->quantity), 2)),
                
            Column::make("Created at", "created_at")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format('F j, Y')),
        ];
    }
}
