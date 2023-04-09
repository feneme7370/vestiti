<form wire:submit.prevent="visitEdit" class=" md:w-2/3 md:mx-auto">

    @include('livewire.fnm.visit.form')

    <button type="submit" class="t_btn-prm w-auto ml-3">Actualizar</button>


    @push('scripts')
        <script>              
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // AJAX ENFERMEDAD
                $(document).on('click', '.diseaseVisitUpdate', function(){
                    let visit_id = {{$visit->id}};
                    let disease_visit_id = $(this).val();
                    let diseaseQ = $(this).closest('.tr_ajax').find('.diseaseVisitQ').val();

                    if(diseaseQ <= 0 || diseaseQ == null){
                        alert('La cantidad es requerida');
                        return false;
                    }

                    let data = {
                        'visit_id' : visit_id,
                        'disease_visit_id' : disease_visit_id,
                        'diseaseQ' : diseaseQ
                    }

                    $.ajax({
                        type: "POST",
                        url: "/visitas/visitaEnfermedad/"+disease_visit_id,
                        data : data,
                        success: function(response){
                            alert(response.message)
                        }
                    })
                });
                $(document).on('click', '.diseaseVisitDelete', function(){
                    let disease_visit_id = $(this).val();
                    let thisClick = $(this);

                    $.ajax({
                        type: "GET",
                        url: "/visitas/visitaEnfermedad/"+disease_visit_id+"/delete",
                        success: function(response){
                            thisClick.closest('.tr_ajax').remove();
                            alert(response.message)
                        }
                    })
                });
                // AJAX PLAGAS
                $(document).on('click', '.plagueVisitUpdate', function(){
                    let visit_id = {{$visit->id}};
                    let plague_visit_id = $(this).val();
                    let plagueQ = $(this).closest('.tr_ajax_plague').find('.plagueVisitQ').val();

                    if(plagueQ <= 0 || plagueQ == null){
                        alert('La cantidad es requerida');
                        return false;
                    }

                    let data = {
                        'visit_id' : visit_id,
                        'plague_visit_id' : plague_visit_id,
                        'plagueQ' : plagueQ
                    }

                    $.ajax({
                        type: "POST",
                        url: "/visitas/visitaPlaga/"+plague_visit_id,
                        data : data,
                        success: function(response){
                            alert(response.message)
                        }
                    })
                });
                $(document).on('click', '.plagueVisitDelete', function(){
                    let plague_visit_id = $(this).val();
                    let thisClick = $(this);

                    $.ajax({
                        type: "GET",
                        url: "/visitas/visitaPlaga/"+plague_visit_id+"/delete",
                        success: function(response){
                            thisClick.closest('.tr_ajax_plague').remove();
                            alert(response.message)
                        }
                    })
                });
                // AJAX MEDICINAS
                $(document).on('click', '.medicineVisitUpdate', function(){
                    let visit_id = {{$visit->id}};
                    let medicine_visit_id = $(this).val();
                    let medicineQ = $(this).closest('.tr_ajax_medicine').find('.medicineVisitQ').val();

                    if(medicineQ <= 0 || medicineQ == null){
                        alert('La cantidad es requerida');
                        return false;
                    }

                    let data = {
                        'visit_id' : visit_id,
                        'medicine_visit_id' : medicine_visit_id,
                        'medicineQ' : medicineQ
                    }

                    $.ajax({
                        type: "POST",
                        url: "/visitas/visitaMedicina/"+medicine_visit_id,
                        data : data,
                        success: function(response){
                            alert(response.message)
                        }
                    })
                });
                $(document).on('click', '.medicineVisitDelete', function(){
                    let medicine_visit_id = $(this).val();
                    let thisClick = $(this);

                    $.ajax({
                        type: "GET",
                        url: "/visitas/visitaMedicina/"+medicine_visit_id+"/delete",
                        success: function(response){
                            thisClick.closest('.tr_ajax_medicine').remove();
                            alert(response.message)
                        }
                    })
                });
            });
        </script>
    @endpush

</form>