<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-bold text-3xl">Listado</p>
        <button type="button" wire:click="closeModal" class="t_btn-snd w-auto" data-toggle="modal" data-target="#addCampaignModal">
            <i class="fa-regular fa-square-plus"></i> Agregar
        </button>
    </div>

    @if (session('message'))
        <p class="alert_success">{{session('message')}}</p>
    @endif
    
    <div class="overflow-x-scroll">
        <table class="t_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($campaigns as $campaign)
                    <tr>
                        <td>
                            <p>{{$campaign->id}}</p>
                            <p>{{$campaign->status ? 'Activo' : 'No activo'}}</p>
                        </td>
                        <td>{{$campaign->name}}</td>
                        <td>{{$campaign->slug}}</td>
                        <td>{{$campaign->description}}</td>
                        <td>
                            <button type="button" class="t_btn-dlt" data-toggle="modal" data-target="#deleteCampaignModal" wire:click="deleteCampaign({{ $campaign->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button type="button" class="t_btn-edt" data-toggle="modal" data-target="#updateCampaignModal" wire:click="editCampaign({{ $campaign->id }})">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <p class="text-center p-2 text-xl text-gray-800 bg-green-200 rounded">No hay registros</p>
                        </td>
                    </tr>
                @endforelse
    
            </tbody>
            @include('livewire.fnm.config.campaign.form-modal')
        </table>
    </div>
    
    {{$campaigns->links()}}

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event =>{
                $('#addCampaignModal').modal('hide');
                $('#updateCampaignModal').modal('hide');
                $('#deleteCampaignModal').modal('hide');
            })
        </script>
    @endpush
</div>
