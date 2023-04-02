<!-- Create Modal -->
<div wire:ignore.self class="modal fade" id="addPlagueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregar</h5>
            <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        {{-- cargando --}}
        <div wire:loading class="spinner-border text-warning mx-auto my-10" role="status">
            <span class="visually-hidden"></span>
        </div>
    
        {{-- cargado --}}
        <div wire:loading.remove>
            <form wire:submit.prevent="storePlague">
                <div class="modal-body">
                    <fieldset class="t_fieldset">
                        <legend class="t_legend">Plaga</legend>
    
                        <div class="grid gap-2">
                            {{-- <div class="t_grupo-input">
                                <label class="t_label" for="status"> Estado</label>
                                <input checked class="t_input-checkbox" type="checkbox" name="status" wire:model.defer="status"  id="status">
                                @error('status')<small class="label_error">{{$message}}</small>@enderror
                            </div> --}}
                            <div class="t_grupo-input">
                                <label class="t_label" for="name">Nombre</label>
                                <input class="t_input" type="text" name="name"  wire:model.defer="name"  id="name">
                                @error('name')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                            <div class="t_grupo-input">
                                <label class="t_label" for="description">Descripcion</label>
                                <input class="t_input" type="text" name="description"  wire:model.defer="description"  id="description">
                                @error('description')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="t_btn-back w-auto" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="t_btn-snd w-auto">Guardar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    
    <!-- Edit Modal -->
    <div wire:ignore.self class="modal fade" id="updatePlagueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar Plaga</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            {{-- cargando --}}
            <div wire:loading class="spinner-border text-warning mx-auto my-10" role="status">
                <span class="visually-hidden"></span>
            </div>
        
            {{-- cargado --}}
            <div wire:loading.remove>
                <form wire:submit.prevent="updatePlague">
                    <div class="modal-body">
                        <fieldset class="t_fieldset">
                            <legend class="t_legend">Empresas</legend>
        
                                <div class="grid gap-2">
                                    <div class="t_grupo-input">
                                        <label class="t_label" for="status"> Estado</label>
                                        <input checked class="t_input-checkbox" type="checkbox" name="status" wire:model.defer="status"  id="status">
                                        @error('status')<small class="label_error">{{$message}}</small>@enderror
                                    </div>
                                    <div class="t_grupo-input">
                                        <label class="t_label" for="name">Nombre</label>
                                        <input class="t_input" type="text" name="name"  wire:model.defer="name"  id="name">
                                        @error('name')<small class="label_error">{{$message}}</small>@enderror
                                    </div>
                                    <div class="t_grupo-input">
                                        <label class="t_label" for="description">Descripcion</label>
                                        <input class="t_input" type="text" name="description"  wire:model.defer="description"  id="description">
                                        @error('description')<small class="label_error">{{$message}}</small>@enderror
                                    </div>
                                </div>

                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="t_btn-back w-auto" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="t_btn-snd w-auto">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="deletePlagueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Plaga</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
            {{-- cargando --}}
            <div wire:loading class="spinner-border text-warning mx-auto my-10" role="status">
                <span class="visually-hidden"></span>
            </div>
    
            {{-- cargado --}}
            <div wire:loading.remove>
                <form wire:submit.prevent="destroyPlague">
                    <div class="modal-body">
                        <p>Esta seguro de eliminar el registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="t_btn-back w-auto" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="t_btn-snd w-auto">Si. Eliminar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>