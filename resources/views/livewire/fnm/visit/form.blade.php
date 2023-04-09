@if ($errors->any())
@foreach ($errors->all() as $message)
    <div>
        <p class="text-left my-1 p-1 font-bold text-sm text-gray-800 bg-red-200 border-l-4 border-red-800 rounded">{{$message}}</p>
        {{-- <livewire:helper.mostrar-alerta :message="$message" /> --}}
    </div>
@endforeach
@endif

<div class="col-12">
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-dates-tab" data-toggle="pill"
                    href="#custom-tabs-three-dates" role="tab" aria-controls="custom-tabs-three-dates"
                    aria-selected="true">Datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-dates2-tab" data-toggle="pill"
                    href="#custom-tabs-three-dates2" role="tab" aria-controls="custom-tabs-three-dates2"
                    aria-selected="false">Relaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-diseases-tab" data-toggle="pill"
                        href="#custom-tabs-three-diseases" role="tab" aria-controls="custom-tabs-three-diseases"
                        aria-selected="false">Enfermedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-plagues-tab" data-toggle="pill"
                        href="#custom-tabs-three-plagues" role="tab" aria-controls="custom-tabs-three-plagues"
                        aria-selected="false">Plagas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-medicines-tab" data-toggle="pill"
                        href="#custom-tabs-three-medicines" role="tab" aria-controls="custom-tabs-three-medicines"
                        aria-selected="false">Medicinas</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-three-dates" role="tabpanel"
                    aria-labelledby="custom-tabs-three-dates-tab">
                    {{-- DATOS DEL APIARIO --}}
                    <fieldset class="t_fieldset">
                        <legend class="t_legend">Datos del apiario</legend>
                    
                        <div class="t_grupo-input">
                            <label class="t_label" for="status">Estado
                                <input class="t_input-checkbox" type="checkbox" name="status" id="status" wire:model.defer="status"
                                    :value="old('status')"></label>
                            @error('status')<small class="label_error">{{$message}}</small>@enderror
                        </div>
                        <div class="grid gap-2">
                            <div class="t_grupo-input">
                                <label class="t_label" for="name">Nombre</label>
                                <input class="t_input" type="text" name="name" id="name" wire:model.defer="name" :value="old('name')"
                                    placeholder="Nombre opcional de visita" autofocus>
                                @error('name')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                            <div class="t_grupo-input">
                                <label class="t_label" for="amount">Colmenas extraidas</label>
                                <input class="t_input" type="number" name="amount" id="amount" wire:model.defer="amount"
                                    :value="old('amount')" placeholder="Numero de colmenas extraidas">
                                @error('amount')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                            <div class="t_grupo-input">
                                <label class="t_label" for="description">Descripcion</label>
                                <textarea class="t_input-textarea" name="description" id="description" wire:model.defer="description"
                                    :value="old('description')" placeholder="Descripcion de la visita" cols="10" rows="5"></textarea>
                                @error('description')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                            <div class="t_grupo-input">
                                <label class="t_label" for="remember">Recordar</label>
                                <textarea class="t_input-textarea" name="remember" id="remember" wire:model.defer="remember"
                                    :value="old('remember')" placeholder="Recordar para la proxima visita" cols="10" rows="5"></textarea>
                                @error('remember')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                    </fieldset>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-dates2" role="tabpanel"
                    aria-labelledby="custom-tabs-three-dates2-tab">
                    {{-- RELACIONES --}}
                    <fieldset class="t_fieldset">
                        <legend class="t_legend">Relaciones</legend>
                    
                        <div class="grid gap-2">
                            <div class="t_grupo-input">
                                <label class="t_label" for="date">* Fecha de visita</label>
                                <input class="t_input" type="date" name="date" id="date" wire:model.defer="date" :value="old('date')"
                                    placeholder="Fecha de visita">
                                @error('date')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                            <div class="t_grupo-input">
                                <label class="t_label" for="apiary_id">* Apiario</label>
                                <select class="t_input" name="apiary_id" id="apiary_id" wire:model.defer="apiary_id"
                                    :value="old('apiary_id')">
                                    <option value="">-- Seleccionar --</option>
                                    @foreach ($apiaries as $apiary)
                                        <option value="{{$apiary->id}}">{{$apiary->name}}</option>
                                    @endforeach
                                </select>
                                @error('apiary_id')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                            <div class="t_grupo-input">
                                <label class="t_label" for="type_visit_id">* Tipo de visita</label>
                                <select class="t_input-select2" name="type_visit_id" id="type_visit_id" wire:model.defer="type_visit_id"
                                    :value="old('type_visit_id')">
                                    <option value="">-- Seleccionar --</option>
                                    @foreach ($type_visits as $type_visit)
                                        <option value="{{$type_visit->id}}">{{$type_visit->name}}</option>
                                    @endforeach
                                </select>
                                @error('campaign_id')<small class="label_error">{{$message}}</small>@enderror
                            </div>
                            <div class="t_grupo-input">
                                <label class="t_label" for="campaign_id">* Cosecha</label>
                                <select class="t_input-select2" name="campaign_id" id="campaign_id" wire:model.defer="campaign_id"
                                    :value="old('campaign_id')">
                                    <option value="">-- Seleccionar --</option>
                                    @foreach ($campaigns as $campaign)
                                        <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                    @endforeach
                                </select>
                                @error('campaign_id')<small class="label_error">{{$message}}</small>@enderror
                            </div>
  
                        </div>
                    </fieldset>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-diseases" role="tabpanel"
                    aria-labelledby="custom-tabs-three-diseases-tab">
                    <fieldset class="t_fieldset">
                        <legend class="t_legend">Tipos de enfermedades</legend>
                    
                        <div class="grid md:grid-cols-3">
                            @foreach ($diseases as $disease)
                            <div class="t_grupo-input">
                                <span class="flex items-center gap-1">
                                    <input class="t_input-checkbox" type="checkbox" name="disease.{{$disease->id}}" id="disease.{{$disease->id}}" wire:model.defer="disease.{{$disease->id}}" :value="old('disease.{{$disease->id}}')">
                                    <label class="t_label" for="">{{$disease->name}}</label>
                                </span>
                                <span class="mt-1">
                                    Cantidad: 
                                </span>
                                <input class="t_input-checkbox w-32 mt-1" type="number" name="diseaseQ.{{$disease->id}}" id="diseaseQ.{{$disease->id}}" wire:model.defer="diseaseQ.{{$disease->id}}" :value="old('diseaseQ.{{$disease->id}}')">
                            </div>
                            @endforeach
                        </div>
                        @error('diseaseQ.*')<small class="label_error">{{$message}}</small>@enderror
                    
                        @if ($visit)
                            <table>
                                <thead>
                                    <tr>
                                        <th>enfermedad id</th>
                                        <th>apiario id</th>
                                        <th>cantidad</th>
                                        <th>borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($visit->diseaseVisits as $item)
                                    <tr class="tr_ajax">
                                        <td>
                                            {{$item->disease->name}}
                                        </td>
                                        <td>{{$item->apiary->name}}</td>
                                        <td>
                                            <div>
                                                <input type="text" value="{{$item->disease_quantity}}" name="" id="" class="diseaseVisitQ">
                                                <button type="button" value="{{$item->id}}" class="diseaseVisitUpdate">Actualizar</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$item->id}}" class="diseaseVisitDelete">Borrar</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <p>No hay enfermedades agregadas</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        @endif
                    </fieldset>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-plagues" role="tabpanel"
                    aria-labelledby="custom-tabs-three-plagues-tab">
                    <fieldset class="t_fieldset">
                        <legend class="t_legend">Tipos de plagas</legend>
                    
                        <div class="grid md:grid-cols-3">
                            @foreach ($plagues as $plague)
                            <div class="t_grupo-input">
                                <span class="flex items-center gap-1">
                                    <input class="t_input-checkbox" type="checkbox" name="plague.{{$plague->id}}" id="plague.{{$plague->id}}" wire:model.defer="plague.{{$plague->id}}" :value="old('plague.{{$plague->id}}')">
                                    <label class="t_label" for="">{{$plague->name}}</label>
                                </span>
                                <span class="mt-1">
                                    Cantidad: 
                                </span>
                                <input class="t_input-checkbox w-32 mt-1" type="number" name="plagueQ.{{$plague->id}}" id="plagueQ.{{$plague->id}}" wire:model.defer="plagueQ.{{$plague->id}}" :value="old('plagueQ.{{$plague->id}}')">
                            </div>
                            @endforeach
                        </div>
                        @error('plagueQ.*')<small class="label_error">{{$message}}</small>@enderror
                    
                        @if ($visit)
                            <table>
                                <thead>
                                    <tr>
                                        <th>plaga id</th>
                                        <th>apiario id</th>
                                        <th>cantidad</th>
                                        <th>borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($visit->plagueVisits as $item)
                                    <tr class="tr_ajax_plague">
                                        <td>
                                            {{$item->plague->name}}
                                        </td>
                                        <td>{{$item->apiary->name}}</td>
                                        <td>
                                            <div>
                                                <input type="text" value="{{$item->plague_quantity}}" name="" id="" class="plagueVisitQ">
                                                <button type="button" value="{{$item->id}}" class="plagueVisitUpdate">Actualizar</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$item->id}}" class="plagueVisitDelete">Borrar</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <p>No hay plagas agregadas</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        @endif
                    </fieldset>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-medicines" role="tabpanel"
                    aria-labelledby="custom-tabs-three-medicines-tab">
                    <fieldset class="t_fieldset">
                        <legend class="t_legend">Tipos de medicinas</legend>
                    
                        <div class="grid md:grid-cols-3">
                            @foreach ($medicines as $medicine)
                            <div class="t_grupo-input">
                                <span class="flex items-center gap-1">
                                    <input class="t_input-checkbox" type="checkbox" name="medicine.{{$medicine->id}}" id="medicine.{{$medicine->id}}" wire:model.defer="medicine.{{$medicine->id}}" :value="old('medicine.{{$medicine->id}}')">
                                    <label class="t_label" for="">{{$medicine->name}}</label>
                                </span>
                                <span class="mt-1">
                                    Cantidad: 
                                </span>
                                <input class="t_input-checkbox w-32 mt-1" type="number" name="medicineQ.{{$medicine->id}}" id="medicineQ.{{$medicine->id}}" wire:model.defer="medicineQ.{{$medicine->id}}" :value="old('medicineQ.{{$medicine->id}}')">
                            </div>
                            @endforeach
                        </div>
                        @error('medicineQ.*')<small class="label_error">{{$message}}</small>@enderror
                    
                        @if ($visit)
                            <table>
                                <thead>
                                    <tr>
                                        <th>medicina id</th>
                                        <th>apiario id</th>
                                        <th>cantidad</th>
                                        <th>borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($visit->medicineVisits as $item)
                                    <tr class="tr_ajax_medicine">
                                        <td>
                                            {{$item->medicine->name}}
                                        </td>
                                        <td>{{$item->apiary->name}}</td>
                                        <td>
                                            <div>
                                                <input type="text" value="{{$item->medicine_quantity}}" name="" id="" class="medicineVisitQ">
                                                <button type="button" value="{{$item->id}}" class="medicineVisitUpdate">Actualizar</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$item->id}}" class="medicineVisitDelete">Borrar</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <p>No hay medicinas agregadas</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        @endif
                    </fieldset>
                </div>
            </div>
        </div>

    </div>
</div>