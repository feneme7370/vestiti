<?php

namespace App\Http\Controllers\Fnm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fnm\Relation\DiseaseVisit;
use App\Models\Fnm\Relation\MedicineVisit;
use App\Models\Fnm\Relation\PlagueVisit;
use App\Models\Fnm\Visit;

class VisitController extends Controller
{
    public function index()
    {
        return view('sistem.visit.index', [
            'title' => 'visitas'
        ]);
    }
    public function create()
    {
        return view('sistem.visit.create', [
            'title' => 'visita'
        ]);
    }
    public function edit(Visit $visita)
    {
        return view('sistem.visit.edit', [
            'title' => 'visita',
            'visit' => $visita
        ]);
    }
    public function show(Visit $visita)
    {
        return view('sistem.visit.show', [
            'title' => 'visita',
            'visit' => $visita
        ]);
    }
    // AJAX ENFERMEDADES
    public function updateDiseaseVisitQ(Request $request, $disease_visit_id)
    {
        $diseaseVisitData = Visit::findOrFail($request->visit_id)->diseaseVisits()->where('id', $disease_visit_id);
        $diseaseVisitData->update([
            'disease_quantity' => $request->diseaseQ
        ]);
        return response()->json(['message' => 'Datos actualizados']);
    }
    public function deleteDiseaseVisitQ($disease_visit_id)
    {
        $diseaseVisitData = DiseaseVisit::findOrFail($disease_visit_id);
        $diseaseVisitData->delete();
        return response()->json(['message' => 'Dato eliminado']);
    }
    // AJAX PLAGAS
    public function updatePlagueVisitQ(Request $request, $plague_visit_id)
    {
        $plagueVisitData = Visit::findOrFail($request->visit_id)->plagueVisits()->where('id', $plague_visit_id);
        $plagueVisitData->update([
            'plague_quantity' => $request->plagueQ
        ]);
        return response()->json(['message' => 'Datos actualizados']);
    }
    public function deletePlagueVisitQ($plague_visit_id)
    {
        $plagueVisitData = PlagueVisit::findOrFail($plague_visit_id);
        $plagueVisitData->delete();
        return response()->json(['message' => 'Dato eliminado']);
    }
    // AJAX MEDICINAS 
    public function updateMedicineVisitQ(Request $request, $medicine_visit_id)
    {
        $medicineVisitData = Visit::findOrFail($request->visit_id)->medicineVisits()->where('id', $medicine_visit_id);
        $medicineVisitData->update([
            'medicine_quantity' => $request->medicineQ
        ]);
        return response()->json(['message' => 'Datos actualizados']);
    }
    public function deleteMedicineVisitQ($medicine_visit_id)
    {
        $medicineVisitData = MedicineVisit::findOrFail($medicine_visit_id);
        $medicineVisitData->delete();
        return response()->json(['message' => 'Dato eliminado']);
    }
}
