<fieldset class="t_fieldset">
    <legend class="t_legend">Informacion del apiario</legend>
    
    <div class="t_grupo-input">
        <label class="t_label" for="status">Estado  
        <input class="t_input-checkbox" type="checkbox" name="status" id="status" wire:model.defer="status" :value="old('status')"></label>
        @error('status')<small class="label_error">{{$message}}</small>@enderror
    </div>
    <div class="grid md:grid-cols-1 gap-2">
        <div class="t_grupo-input">
            <label class="t_label" for="name">* Nombre</label>
            <input class="t_input" type="text" name="name" id="name" wire:model.defer="name" :value="old('name')" placeholder="Nombre" autofocus>
            @error('name')<small class="label_error">{{$message}}</small>@enderror
        </div>
        <div class="t_grupo-input">
            <label class="t_label" for="location">* Ubicacion</label>
            <input class="t_input" type="text" name="location" id="location" wire:model.defer="location" :value="old('location')" placeholder="Ubicacion">
            @error('location')<small class="label_error">{{$message}}</small>@enderror
        </div>
        <div class="t_grupo-input">
            <label class="t_label" for="hive">* Nro. Colmenas</label>
            <input class="t_input" type="text" name="hive" id="hive" wire:model.defer="hive" :value="old('hive')" placeholder="Colmenas">
            @error('hive')<small class="label_error">{{$message}}</small>@enderror
        </div>
        <div class="t_grupo-input">
            <label class="t_label" for="description">* Anotaciones</label>
            <textarea class="t_input-textarea" name="description" id="description" wire:model.defer="description" :value="old('description')" placeholder="Descripcion del apiario" cols="10" rows="5"></textarea>
            @error('description')<small class="label_error">{{$message}}</small>@enderror
        </div>

</fieldset>