@inject('request', 'Illuminate\Http\Request')
@extends($layout)


@section('header_scripts')
<link href="{{CSS}}bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="{{CSS}}checkbox.css" rel="stylesheet" type="text/css">
@endsection


@section('custom_div')

@if (isset($record) && count($record))
    <div ng-controller="prepareAuctionData" ng-init="initFunctions()">
@else
     <div ng-controller="prepareAuctionData">
@endif

@stop

@section('content')
<!--Panel 2-->
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('email.import.excel')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h1>Correos de Invitación  </h1>
                <div class="form-group">
                        <input type="hidden" name="auction_id" value="{{ $record->id }}">
                        <div class="col-md-6">
                                <input  type="file" class="form-control"  name="file">
                        </div>
                    <div class="col-4">
                        <button class="btn btn-success">Importar Usuarios</button>
                    </div>

        <table class="table table-bordered table-striped">
            
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
            </thead>

            @if (count($invitacion) > 0)
                <tbody>
                    @if (count($invitacion) > 0)
                        <?php $i=0;?>
                            @foreach ($invitacion as $item)
                        <?php $i++;?>
                                
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td> 
                                        <td>{{ $item->email }}</td>
                                        
                                    </tr>
                                
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

@endsection


@section('footer_scripts')
@include('common.validations')

@include('common.alertify')


@include('admin.auctions.scripts.auction-js-scripts')


<script src="{{PREFIX1}}ckeditor/ckeditor.js"></script>
<script src="{{PREFIX1}}ckeditor/adapters/jquery.js"></script>

<script src="{{JS}}moment.min.js"></script>
<script src="{{JS}}bootstrap-datetimepicker.min.js"></script>


<script src="{{JS}}bootstrap-datepicker.min.js"></script>
<script>
     $(function () {
        $('#datepicker').datepicker({
            autoclose:true
        });
    });
</script>


<script src="{{PREFIX1}}adminlte/plugins/timepicker/bootstrap-timepicker.min.js"></script>

@stop