<?php

namespace App\View\Components;

use Illuminate\View\Component;

class mainSidebar extends Component
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
        $active = $this->active;
        return view('components.main-sidebar', compact('active'));
    }

    public function menus(){
        return [
            [
                'label' => 'Account',
                'link' => 'member.account',
            ],
            [
                'label' => 'Achievement',
                'link' => 'member.achievement',
            ],
            [
                'label' => 'Course',
                'link' => 'member.getcourseall',
            ],
            [
                'label' => 'Order',
                'link' => 'member.getorder',
            ],
            [
                'label' => 'Logout',
                'link' => 'member.logout',
            ],
        ];
    }

    public function isActive($label){
        return $label == $this->active;
    }
}