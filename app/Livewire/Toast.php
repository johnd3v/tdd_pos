<?php

namespace App\Livewire;

use Livewire\Component;

class Toast extends Component
{

    public $visible = false;
    public $title;
    public $type;
    public $message;
    public $icon;
    public $iconColor;

    protected $listeners = ['showToast'];

    public function showToast($type, $title, $message)
    {
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;

        switch ($type) {
            case "success":
                $this->icon = "<svg class=\"w-5 h-5\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"currentColor\" viewBox=\"0 0 20 20\"> <path d=\"M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z\"/></svg>";
                $this->iconColor = "text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200";
                break;
            case "error":
                $this->icon = "<svg class=\"w-5 h-5\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"currentColor\" viewBox=\"0 0 20 20\"><path d=\"M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z\"/></svg>";
                $this->iconColor = "text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200";
                break;
        }

        $this->visible = true;

    }

    public function render()
    {
        return view('livewire.toast');
    }
}
