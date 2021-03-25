<?php

namespace App\View\Components;

use Illuminate\View\Component;

class expertSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $active;
    public function __construct($active)
    {
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $username = auth()->guard('expert')->user()->name;

        if (strlen($username) > 20) {
            $username =  substr($username,0,20) . '...'; 
        }

        $active = $this->active;

        return view('components.expert-sidebar', compact('username', 'active'));
    }

    public function menus() {
        return [
            [
                'label' => 'Class',
                'icon' => 'fab fa-discourse',
                'link' => 'expert.class',
            ],
        ];
    }

    public function isActive($label){
        return $label == $this->active;
    }
}