<?php

namespace App\Http\Livewire\Fnm\Apiary;

use Livewire\Component;
use App\Models\Fnm\Apiary;
use Illuminate\Support\Str;

class ApiaryEdit extends Component
{
    //variables
    public $apiary_idm, $name, $location, $hive, $description, $status, $company_id, $user_id;
    public $apiary;

    // validacion
    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'location' => ['required', 'string', 'max:50'],
        'hive' => ['required', 'numeric'],
        'description' => ['required', 'string', 'max:255'],
        'status' => [],
    ];

    // precargar datos
    public function mount(Apiary $apiary)
    {
        $this->apiary_idm = $apiary->id;
        $this->name = $apiary->name;
        $this->location = $apiary->location;
        $this->hive = $apiary->hive;
        $this->description = $apiary->description;
        $this->status = $apiary->status;
    }

    // funcion para editar
    public function apiaryEdit()
    {
        // validar formulario
        $datos = $this->validate();
        $datos['slug'] = Str::slug($datos['name']);
        $datos['status'] = $datos['status'] ? '1' : '0';
        $datos['company_id'] = auth()->user()->company_id;
        $datos['user_id'] = auth()->user()->id;
        
        // encontrar dato a editar
        $editar = Apiary::find($this->apiary_idm);
        
        // editar datos
        $editar->update($datos);

        //crear mensaje
        session()->flash('mensaje-exito', 'editado correctamente');

        // redireccionar
        return redirect()->route('apiarios.index');
    }

    public function render()
    {
        return view('livewire.fnm.apiary.apiary-edit');
    }
}
