<div>
    <div class="flex justify-between items-center mb-2">
        <p class="font-bold text-3xl">Listado</p>
        <a class="t_btn-snd w-auto" href="{{route('apiarios.create')}}"><i class="fa-regular fa-square-plus"></i> Agregar</a>
    </div>

    @if (session('message'))
        <p class="alert_success">{{session('message')}}</p>
    @endif

    <div class="overflow-x-scroll">
        <table class="t_table">
            <thead>
                <tr>
                    <th>ID / Status</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Colmenas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apiaries as $dato)
                    <tr>
                        <td>
                            <p>{{$dato->id}}</p>
                            <p>{{$dato->status ? 'Activo' : 'No activo'}}</p>
                        </td>
                        <td>{{$dato->name}}</td>
                        <td>{{$dato->location}}</td>
                        <td>{{$dato->hive}}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <a class="t_btn-edt" href="{{route('apiarios.edit', $dato->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button class="t_btn-dlt" wire:click="$emit('showAlert', {{ $dato->id }})"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$apiaries->links()}}
    </div>

    @push('scripts')
        <script>
            // escuchar desde controller livewire           
            Livewire.on('showAlert', apiaryId => {
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
                    Livewire.emit('apiaryDelete', apiaryId)

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
