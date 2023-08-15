<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    public string $title;
    public string $languages;

    public function __construct($post)
    {
        $this->title = $post->job_title;
        $this->languages = implode(', ', $post->languages->pluck('name')->toArray());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.post');
    }
}