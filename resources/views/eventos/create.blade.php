@extends('layout')
@section('content')
<br>
<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Crear Evento</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <form action="{{url('/eventos')}}" method="post" role="form justify-content-center" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-md-offset-3">
                    <div class="main-box-body clearfix" id="formularioregistros">
                        <div class="form-group">
                            <label for="nombre">Nombre(*):</label>
                            <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control"
                                placeholder="Nombre...">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="descripcion" name="descripcion" value="{{old('descripcion')}}" class="form-control"
                                placeholder="Descripcion del evento...">
                        </div>

                         <div class="form-group">
                            <label for="Fecha">Fecha:</label>
                            <input type="Fecha" name="Fecha" value="{{old('Fecha')}}" class="form-control"
                                placeholder="dd/mm/aaaa">
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo:</label>
                            <input type="file" name="logo" class="form-control">
                        </div>


                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                <a href="{{url('eventos')}}" class="btn btn-danger" role="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
            </div>
        </form>

    </div>
</div>
@endsection