<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Card extends Component
{
    public $title, $count, $icon;

    public function __construct($title, $count = 0, $icon = '')
    {
        $this->title = $title;
        $this->count = $count;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.dashboard.card');
    }
}
