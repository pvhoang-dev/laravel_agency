<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    public object $post;
    public string $languages;
    public object $company;

    public function __construct($post)
    {
        $this->post = $post;
        $this->languages = implode(', ', $post->languages->pluck('name')->toArray());
        $this->company = $post->company;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.post');
    }
}