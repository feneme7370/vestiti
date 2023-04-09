<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-bold text-3xl">Listado</p>
        <a class="t_btn-snd w-auto" href="{{route('visitas.create')}}"><i class="fa-regular fa-square-plus"></i> Agregar</a>
    </div>

    @if (session('message'))
        <p class="alert_success">{{session('message')}}</p>
    @endif

    <div class="overflow-x-scroll">
        <table class="t_table">
            <thead>
                <tr>
                    <th>ID / Status</th>
                    <th>Fecha</th>
                    <th>Cosecha</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visits as $dato)
                    <tr>
                        <td>
                            <p>{{$dato->id}}</p>
                            <p>{{$dato->status ? 'Activo' : 'No activo'}}</p>
                        </td>
                        <td>
                            <p>{{$dato->date}}</p>
                            <p>Colmenas: {{$dato->amount}}</p>
                        </td>
                        <td>
                            <p>{{$dato->campaign->name}}</p>
                            <p>{{$dato->apiary->name}}</p>
                        </td>
                        <td>
                            <p>{{$dato->company->name}}</p>
                            <p>Creado: {{$dato->user->name}}</p>
                        </td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <a class="t_btn-edt" href="{{route('visitas.edit', $dato->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button class="t_btn-dlt" wire:click="$emit('showAlert', {{ $dato->id }})"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$visits->links()}}
    </div>

    @push('scripts')
        <script>
            // escuchar desde controller livewire           
            Livewire.on('showAlert', visitId => {
                Swal.fire({
                title: 'Eliminar registro?',
                text: "Esta accion no se puede revertir!",
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'

                }).then((result) => {
                if (result.isConfirmed) {
                    
                    // eliminar desde el servidor con emit
                    Livewire.emit('visitDelete', visitId)

                    Swal.fire(
                    'Eliminado con exito!',
                    'Eliminado correctamente.',
                    'success'
                    )
                }
                })
            })

        </script>
    @endpush
</div>
