@extends('layout')
@section('content')
<br>
<div class="box-body">
 <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      @if(Session::has('Mensaje'))
        {{
        Session::get('Mensaje')
        }}
      @endif
  </div>
</div>

    <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listado de eventos 
              <a href="{{url('eventos/create')}}" class="btn btn-success" role="button"><i class="fa fa-plus"></i> Agregar</a></h3>
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

           
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">Numero</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th style="width: 40px">Fecha</th>
                  <th>logo</th>
                  <th>Opciones</th>
                </tr>
                 @foreach($eventos as $evento)
                <tr>
                  <td>{{$evento->id}}</td>
                  <td>{{$evento->Nombre}}</td>
                  <td>{{$evento->Descripcion}}</td>
                  <td>{{$evento->Fecha}}</td>
                  <td>
                  <img src="{{asset('storage').'/'.$evento->logo}}" alt="" width="100">
                  </td>
                  <td><button class="btn btn-block btn-warnig"><a href="{{url('/eventos/'.$evento->id.'/edit')}}">Editar</a>  </button>
                
                  <form method="post" action="{{url('/eventos/'.$evento->id)}}">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class="btn btn-block btn-danger" type='submit' onclick="return confirm('Desea Borrar el evento?');">Borrar</button>   
                  </td>
                </tr>
                @endforeach
               

                </tbody></table>
            </div>
            
          </div>
    </div>
@endsection
