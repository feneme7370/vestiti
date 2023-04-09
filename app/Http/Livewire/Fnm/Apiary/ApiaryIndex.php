<?php

namespace App\Http\Livewire\Fnm\Apiary;

use App\Models\Fnm\Apiary;
use Livewire\Component;
use Livewire\WithPagination;

class ApiaryIndex extends Component
{
    use WithPagination;
    // escuchar por eliminacion
    protected $listeners = ['apiaryDelete'];

    // ejecutar eliminacion al ser llamada
    public function apiaryDelete(Apiary $dato)
    {
        $dato->delete();
    }
    
    public function render()
    {
        $apiaries = Apiary::where('company_id', auth()->user()->company_id)->paginate('10');
        return view('livewire.fnm.apiary.apiary-index', compact('apiaries'));
    }
}
