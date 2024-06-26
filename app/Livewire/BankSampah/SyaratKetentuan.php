<?php

namespace App\Livewire\BankSampah;

use Livewire\Component;

class SyaratKetentuan extends Component
{
    public $acceptedTerms = false;
    public $acceptedConditions = false;

    public function render()
    {

        return view('livewire.bank-sampah.syarat-ketentuan', 
    [
                'acceptedTerms' => $this->acceptedTerms,
                'acceptedConditions' => $this->acceptedConditions,
            ]
        );
    }
}
