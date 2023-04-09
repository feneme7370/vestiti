<?php

namespace App\Http\Livewire\Fnm\Visit;

use Livewire\Component;
use App\Models\Fnm\Visit;
use App\Models\Fnm\Apiary;
use App\Models\Fnm\Disease;
use Illuminate\Support\Str;
use App\Models\Fnm\Campaign;
use App\Models\Fnm\Medicine;
use App\Models\Fnm\Plague;
use App\Models\Fnm\TypeVisit;
use App\Models\Fnm\Relation\PlagueVisit;
use App\Models\Fnm\Relation\DiseaseVisit;
use App\Models\Fnm\Relation\MedicineVisit;

class VisitEdit extends Component
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
    public function mount(Visit $visit)
    {
        $this->visit_idm = $visit->id;
        $this->name = $visit->name;
        $this->slug = $visit->slug;
        $this->date = $visit->date;
        $this->apiary_id = $visit->apiary_id;
        $this->campaign_id = $visit->campaign_id;
        $this->type_visit_id = $visit->type_visit_id;
        $this->amount = $visit->amount;
        $this->description = $visit->description;
        $this->remember = $visit->remember;
        $this->status = $visit->status;
    }

    // funcion para editar
    public function visitEdit()
    {
        // validar formulario
        $datos = $this->validate();
        $datos['slug'] = Str::slug($datos['name']);
        $datos['status'] = $datos['status'] ? '1' : '0';
        $datos['company_id'] = auth()->user()->company_id;
        $datos['user_id'] = auth()->user()->id;
        
        // encontrar dato a editar
        $visit_crud = Visit::find($this->visit_idm);
        
        // editar datos
        $visit_crud->update($datos);

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
        session()->flash('mensaje-exito', 'editado correctamente');

        // redireccionar
        return redirect()->route('visitas.index');
    }

    public function render()
    {
        $visit = Visit::find($this->visit_idm);
        $disease_visit = $visit->diseaseVisits->pluck('disease_id')->toArray();
        $diseases = Disease::whereNotIn('id', $disease_visit)->get();
        $plague_visit = $visit->plagueVisits->pluck('plague_id')->toArray();
        $plagues = Plague::whereNotIn('id', $plague_visit)->get();
        $medicine_visit = $visit->medicineVisits->pluck('medicine_id')->toArray();
        $medicines = Medicine::whereNotIn('id', $medicine_visit)->get();
        
        // dd($visit->diseaseVisits);
        $type_visits = TypeVisit::all();
        $apiaries = Apiary::all();
        $campaigns = Campaign::all();
        return view('livewire.fnm.visit.visit-edit', compact('apiaries', 'campaigns', 'type_visits', 'visit', 'diseases', 'plagues', 'medicines'));
    }
}
