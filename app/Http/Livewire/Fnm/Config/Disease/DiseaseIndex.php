<?php

namespace App\Http\Livewire\Fnm\Config\Disease;

use Livewire\Component;
use App\Models\Fnm\Disease;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class DiseaseIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    // variables
    public $disease_idm, $name, $slug, $status, $description;
    public $disease_object;

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
    public function storeDisease(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = '1';
        
        $disease = Disease::create($validateData);
        session()->flash('message', 'creado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function editDisease($disease_idm){
        $this->disease_idm = $disease_idm;
        $disease = Disease::findOrFail($this->disease_idm);
        
        $this->name = $disease->name;
        $this->slug = $disease->slug;
        $this->description = $disease->description;
        $this->status = $disease->status;
    }

    // update a BD
    public function updateDisease(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = $validateData['status'] ? '1' : '0';

        Disease::findOrFail($this->disease_idm)->update($validateData);

        session()->flash('message', 'actualizado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function deleteDisease($disease_idm){
        $this->disease_idm = $disease_idm;
    }
    
    // delete a BD
    public function destroyDisease(){
        Disease::findOrFail($this->disease_idm)->delete();
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
        $diseases = Disease::orderBy('id')->paginate('5');
        return view('livewire.fnm.config.disease.disease-index', compact('diseases'));
    }
}
