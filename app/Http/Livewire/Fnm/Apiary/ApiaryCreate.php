<?php

namespace App\Http\Livewire\Fnm\Apiary;

use Livewire\Component;
use App\Models\Fnm\Apiary;
use Illuminate\Support\Str;

class ApiaryCreate extends Component
{
    //variables
    public $apiary_idm, $name, $location, $hive, $description, $status, $company_id, $user_id;

    // validacion
    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'location' => ['required', 'string', 'max:50'],
        'hive' => ['required', 'numeric'],
        'description' => ['required', 'string', 'max:255'],
        'status' => [],
    ];

    // precargar datos
   public function mount()
   {
       $this->status = true;
   }

    // funcion para crear
    public function apiaryCreate()
    {
        // validar formulario
        $datos = $this->validate();
        $datos['slug'] = Str::slug($datos['name']);
        $datos['status'] = '1';
        $datos['company_id'] = auth()->user()->company_id;
        $datos['user_id'] = auth()->user()->id;

        // crear la vacante
        $apiario = Apiary::create($datos);

        //crear mensaje
        session()->flash('mensaje-exito', 'creado correctamente');
        // redireccionar
        return redirect()->route('apiarios.index');
    }

    public function render()
    {
        return view('livewire.fnm.apiary.apiary-create');
    }
}
