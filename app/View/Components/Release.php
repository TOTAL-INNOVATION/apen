<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Release extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $url,
        public ?Carbon $published_at,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.release');
    }
}
