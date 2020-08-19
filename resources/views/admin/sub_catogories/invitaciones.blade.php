@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<!--Panel 2-->

    <div class="row">
        <div class="col-md-12">
            <form action="{{route('email.import.excel')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                
                <h1>Correos de Invitación  </h1>
                <h3>{{ $sub->sub_category }}</h3>
                <div class="form-group">
                        <input type="hidden" name="auction_id" value="{{ $sub->id }}">
                        <div class="col-md-4">
                                <input  type="file" class="form-control"  name="file">
                        </div>
                    <div class="col-6">
                        <button class="btn btn-success">Importar Usuarios</button>
                    </div>

                    <div class="col-12 p-5">
                        <h3>El ID del lote es :  {{ $sub->id }}</h3>
                        <p>Porfavor ingresar en el exel </p>
                    </div>

                <table class="table table-bordered table-striped">

                    <thead>
                        <th>#</th>
                        <th>Id subasta</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Eliminar</th>
                    </thead>

                    @if (count($invitacion) > 0)
                        <tbody>
                            @if (count($invitacion) > 0)
                                <?php $i=0;?>
                                    @foreach ($invitacion as $item)
                                        @if($sub->id == $item->auction_id)
                                        <?php $i++;?>
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->auction_id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @can('invitacion_delete')
                                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('{{$sub->id}}')"> Borrar </a>
                                                    @endcan
                                                </td>

                                            </tr>
                                        @else
                                        @endif

                                    @endforeach
                            @else
                                <tr>
                                    <td colspan="12"> {{ getPhrase('no_entries_in_table') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    @endif

                </table>
                </div>
            </form>
        </div>
    </div>

   

    @stop

    @section('footer_scripts') 
    
     @can('category_delete') 
            @include('common.deletescript', array('route'=>URL_item_CATEGORIES_DELETE))
            @endcan
    
        
    
    @endsection