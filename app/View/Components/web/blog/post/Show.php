<?php

namespace App\View\Components\web\blog\post;

use Illuminate\View\Component;

class Show extends Component
{
    /**
     * Create a new component instance.
     */

    public $post;

    public function __construct($post)
    {
        // dd($post);

        $this->post = $post;
    }

    public function changeTitle()
    {
        $this->post->name = "Nuevo nombre desde el componente";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.web.blog.post.show');
    }
}
