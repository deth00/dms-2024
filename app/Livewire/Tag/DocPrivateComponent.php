<?php

namespace App\Livewire\Tag;

use Livewire\Component;
use App\Models\Docit;

class DocPrivateComponent extends Component
{
    public $data = [], $count = 0;
    public $search, $dataQ = 15, $dateS, $dateE;

    public function render()
    {
        return view('livewire.tag.doc-private-component');
    }
}
