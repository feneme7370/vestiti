<?php

namespace App\Http\Livewire\Fnm\Config\Medicine;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Fnm\Medicine;
use Livewire\WithPagination;

class MedicineIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    // variables
    public $medicine_idm, $name, $slug, $status, $description;
    public $medicine_object;

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
    public function storeMedicine(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = '1';
        
        $medicine = Medicine::create($validateData);
        session()->flash('message', 'creado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function editMedicine($medicine_idm){
        $this->medicine_idm = $medicine_idm;
        $medicine = Medicine::findOrFail($this->medicine_idm);
        
        $this->name = $medicine->name;
        $this->slug = $medicine->slug;
        $this->description = $medicine->description;
        $this->status = $medicine->status;
    }

    // update a BD
    public function updateMedicine(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = $validateData['status'] ? '1' : '0';

        Medicine::findOrFail($this->medicine_idm)->update($validateData);

        session()->flash('message', 'actualizado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function deleteMedicine($medicine_idm){
        $this->medicine_idm = $medicine_idm;
    }
    
    // delete a BD
    public function destroyMedicine(){
        Medicine::findOrFail($this->medicine_idm)->delete();
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
        $medicines = Medicine::orderBy('id')->paginate('5');
        return view('livewire.fnm.config.medicine.medicine-index', compact('medicines'));
    }
}
