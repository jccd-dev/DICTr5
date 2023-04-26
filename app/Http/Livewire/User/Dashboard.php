<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    public $cardModal;
    public string $testing;
    public $dataValue = ["region" => 'Region V (Bicol Region)', 'province' => 'Camarines Sur', 'municipality' => 'Iriga City', 'barangay' => "Niño Jesus"];
    public function render()
    {
        return view('livewire.user.dashboard')->layout('layouts.layout');
    }
}
