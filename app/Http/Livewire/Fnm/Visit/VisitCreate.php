<?php

namespace App\Http\Livewire\Fnm\Visit;

use App\Models\Fnm\Apiary;
use App\Models\Fnm\Campaign;
use App\Models\Fnm\Disease;
use App\Models\Fnm\Medicine;
use App\Models\Fnm\Plague;
use App\Models\Fnm\Relation\DiseaseVisit;
use App\Models\Fnm\Relation\MedicineVisit;
use App\Models\Fnm\Relation\PlagueVisit;
use App\Models\Fnm\TypeVisit;
use App\Models\Fnm\Visit;
use Livewire\Component;
use Illuminate\Support\Str;

class VisitCreate extends Component
{
    //variables
    public $visit_idm, $name, $slug, $date, $apiary_id, $campaign_id, $amount, $description, $remember, $status, $company_id, $user_id, $type_visit_id;
    public $disease, $diseaseQ, $plague, $plagueQ, $medicine, $medicineQ;
    public $visit;

    // validacion
    protected $rules = [
        'name' => ['string', 'max:50'],
        'slug' => [],
        'amount' => ['required', 'numeric', 'min:0'],
        'description' => ['string', 'max:255'],
        'remember' => ['string', 'max:255'],
        'date' => ['required', 'date'],
        'apiary_id' => ['required', 'numeric'],
        'campaign_id' => ['required', 'numeric'],
        'type_visit_id' => ['required', 'numeric'],
        'status' => ['nullable'],
        'disease' => ['nullable'],
        'diseaseQ.*' => ['numeric','min:0'],
        'plague' => ['nullable'],
        'plagueQ.*' => ['numeric','min:0'],
        'medicine' => ['nullable'],
        'medicineQ.*' => ['numeric','min:0'],
    ];

   // precargar datos
   public function mount()
   {
       $this->date = now()->format('Y-m-d');
       $this->status = true;
   }

    // funcion para crear
    public function visitCreate()
    {
        // validar formulario
        $datos = $this->validate();
        $datos['slug'] = Str::slug($datos['name']);
        $datos['status'] = '1';
        $datos['company_id'] = auth()->user()->company_id;
        $datos['user_id'] = auth()->user()->id;
        
        
        // crear la vacante
        $visit_crud = Visit::create($datos);
        
        // si tiene valor true recorre
        if($this->disease) {
            // separar id del true
            foreach($this->disease as $key => $enfermedad){
                $enfermedades = DiseaseVisit::create([
                    'visit_id' => $visit_crud->id,
                    'apiary_id' => $datos['apiary_id'],
                    'disease_id' => $key,//valor ID de enfermedad
                    'disease_quantity' => $this->diseaseQ[$key] ?? 0,
                    'company_id' => auth()->user()->company_id,
                    'user_id' => auth()->user()->id
                ]);
            }
        }
        if($this->plague) {
            // separar id del true
            foreach($this->plague as $key => $enfermedad){
                $plagas = PlagueVisit::create([
                    'visit_id' => $visit_crud->id,
                    'apiary_id' => $datos['apiary_id'],
                    'plague_id' => $key,//valor ID de enfermedad
                    'plague_quantity' => $this->plagueQ[$key] ?? 0,
                    'company_id' => auth()->user()->company_id,
                    'user_id' => auth()->user()->id
                ]);
            }
        }
        if($this->medicine) {
            // separar id del true
            foreach($this->medicine as $key => $enfermedad){
                $medicinas = MedicineVisit::create([
                    'visit_id' => $visit_crud->id,
                    'apiary_id' => $datos['apiary_id'],
                    'medicine_id' => $key,//valor ID de enfermedad
                    'medicine_quantity' => $this->medicineQ[$key] ?? 0,
                    'company_id' => auth()->user()->company_id,
                    'user_id' => auth()->user()->id
                ]);
            }
        }

        //crear mensaje
        session()->flash('mensaje-exito', 'creado correctamente');
        // redireccionar
        return redirect()->route('visitas.index');
    }

    public function render()
    {
        $type_visits = TypeVisit::all();
        $apiaries = Apiary::all();
        $campaigns = Campaign::all();
        $diseases = Disease::all();
        $plagues = Plague::all();
        $medicines = Medicine::all();
        return view('livewire.fnm.visit.visit-create', compact('apiaries', 'campaigns', 'type_visits', 'diseases', 'plagues', 'medicines'));
    }
}
