<?php

namespace App\Http\Livewire\Fnm\Config\Campaign;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Fnm\Campaign;
use Livewire\WithPagination;

class CampaignIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    // variables
    public $campaign_idm, $name, $slug, $status, $description;
    public $campaign_object;

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
    public function storeCampaign(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = '1';
        $validateData['user_id'] = auth()->user()->id;
        $validateData['company_id'] = auth()->user()->id;
        
        $campaign = Campaign::create($validateData);
        session()->flash('message', 'creado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function editCampaign($campaign_idm){
        $this->campaign_idm = $campaign_idm;
        $campaign = Campaign::findOrFail($this->campaign_idm);
        
        $this->name = $campaign->name;
        $this->slug = $campaign->slug;
        $this->description = $campaign->description;
        $this->status = $campaign->status;
    }

    // update a BD
    public function updateCampaign(){
        $validateData = $this->validate();
        $validateData['slug'] = Str::slug($validateData['name']);
        $validateData['status'] = $validateData['status'] ? '1' : '0';
        $validateData['user_id'] = auth()->user()->id;
        $validateData['company_id'] = auth()->user()->id;

        Campaign::findOrFail($this->campaign_idm)->update($validateData);

        session()->flash('message', 'actualizado correctamente');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // traer info a traves del ID
    public function deleteCampaign($campaign_idm){
        $this->campaign_idm = $campaign_idm;
    }
    
    // delete a BD
    public function destroyCampaign(){
        Campaign::findOrFail($this->campaign_idm)->delete();
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
        $campaigns = Campaign::orderBy('id')->paginate('5');
        return view('livewire.fnm.config.campaign.campaign-index', compact('campaigns'));
    }
}
