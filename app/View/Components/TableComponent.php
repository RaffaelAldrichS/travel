<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    public $columns;
    public $data;
    public $routePrefix;
    public $hasImageColumn;

    public function __construct($columns, $data, $routePrefix, $hasImageColumn = false)
    {
        $this->columns = $columns;
        $this->data = $data;
        $this->routePrefix = $routePrefix;
        $this->hasImageColumn = $hasImageColumn;
        // dd($data);
    }

    public function render(): View|Closure|string
    {
        return view('components.table-component', [
            'columns' => $this->columns,

            'data' => $this->data,

            'routePrefix' => $this->routePrefix,

            'hasImageColumn' => $this->hasImageColumn,
        ]);
    }
}
