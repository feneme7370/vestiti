<?php

namespace App\Http\Livewire\Fnm\Visit;

use App\Models\Fnm\Visit;
use Livewire\Component;
use Livewire\WithPagination;

class VisitIndex extends Component
{
    use WithPagination;
    // escuchar por eliminacion
    protected $listeners = ['visitDelete'];

    // ejecutar eliminacion al ser llamada
    public function visitDelete(Visit $dato)
    {
        $dato->delete();
    }
    
    public function render()
    {
        $visits = Visit::where('company_id', auth()->user()->company_id)->paginate('10');
        return view('livewire.fnm.visit.visit-index', compact('visits'));
    }
}
