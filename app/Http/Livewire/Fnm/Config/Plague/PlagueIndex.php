<?php

namespace App\Http\Livewire\Fnm\Config\Plague;

use Livewire\Component;
use App\Models\Fnm\Plague;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class PlagueIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    // variables
    public $plague_idm, $name, $slug, $status, $description;
    public $plague_object;

    // validacion
    public function rules(){
        return [
            'name' => ['required', 'string'],
            'slug' => [],
            'description' => ['required', 'string'],
            'status' => ['nullable'],
        ];
    }

    // limpiar inputs
    public function resetInput(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->description = NULL;
        $this->status = NULL;
    }

    // store a BD
    public function storePlague(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = '1';
        $validateData['user_id'] = auth()->user()->id;
        $validateData['company_id'] = auth()->user()->id;
        
        $plague = Plague::create($validateData);
        session()->flash('message', 'creado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function editPlague($plague_idm){
        $this->plague_idm = $plague_idm;
        $plague = Plague::findOrFail($this->plague_idm);
        
        $this->name = $plague->name;
        $this->slug = $plague->slug;
        $this->description = $plague->description;
        $this->status = $plague->status;
    }

    // update a BD
    public function updatePlague(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = $validateData['status'] ? '1' : '0';
        $validateData['user_id'] = auth()->user()->id;
        $validateData['company_id'] = auth()->user()->id;

        Plague::findOrFail($this->plague_idm)->update($validateData);

        session()->flash('message', 'actualizado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function deletePlague($plague_idm){
        $this->plague_idm = $plague_idm;
    }
    
    // delete a BD
    public function destroyPlague(){
        Plague::findOrFail($this->plague_idm)->delete();
        session()->flash('message', 'eliminado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // al cerrar modal
    public function closeModal(){
        $this->resetInput();
    }
    // al abrir modal
    public function openModal(){
        $this->resetInput();
    }

    public function render()
    {
        $plagues = Plague::orderBy('id')->paginate('5');
        return view('livewire.fnm.config.plague.plague-index', compact('plagues'));
    }
}
