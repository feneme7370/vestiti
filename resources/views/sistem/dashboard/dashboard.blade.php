<x-app-layout>
    <h2>{{$title}}</h2>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$apiaries->count()}}</h3>
                    <p>Apiarios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{route('apiarios.index')}}" class="small-box-footer">
                Ver mas <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Rinde...</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$hives}}</h3>
                    <p>Colmenas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('apiarios.index')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$diseases}}</h3>
                <p>Enfermedades</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Ultimas visitas</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div class="card-body p-0" style="display: block;">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Visita</th>
                                <th>Extraida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($last_visits as $last_visit)
                                <tr>
                                    <td>{{$last_visit->id}}</td>
                                    <td>{{$last_visit->date}}</td>
                                    <td><span class="badge badge-success">{{$last_visit->type_visit->name}}</span></td>
                                    <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{$last_visit->amount}}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card-footer clearfix" style="display: block;">
                <a href="{{route('visitas.create')}}" class="btn btn-sm btn-info float-left">Nueva visita</a>
                <a href="{{route('visitas.index')}}" class="btn btn-sm btn-secondary float-right">Ver todas</a>
            </div>
            
        </div>
    </div>
</x-app-layout>
