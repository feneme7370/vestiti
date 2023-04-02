<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-bold text-3xl">Listado</p>
        <button type="button" wire:click="closeModal" class="t_btn-snd w-auto" data-toggle="modal" data-target="#addPlagueModal">
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
                @forelse ($plagues as $plague)
                    <tr>
                        <td>
                            <p>{{$plague->id}}</p>
                            <p>{{$plague->status ? 'Activo' : 'No activo'}}</p>
                        </td>
                        <td>{{$plague->name}}</td>
                        <td>{{$plague->slug}}</td>
                        <td>{{$plague->description}}</td>
                        <td>
                            <button type="button" class="t_btn-dlt" data-toggle="modal" data-target="#deletePlagueModal" wire:click="deletePlague({{ $plague->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button type="button" class="t_btn-edt" data-toggle="modal" data-target="#updatePlagueModal" wire:click="editPlague({{ $plague->id }})">
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
            @include('livewire.fnm.config.plague.form-modal')
        </table>
    </div>
    
    {{$plagues->links()}}

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event =>{
                $('#addPlagueModal').modal('hide');
                $('#updatePlagueModal').modal('hide');
                $('#deletePlagueModal').modal('hide');
            })
        </script>
    @endpush
</div>
