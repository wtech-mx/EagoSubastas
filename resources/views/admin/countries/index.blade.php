@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{ $title }}</h3>

   

   
    <div class="panel panel-default">
        <div class="panel-heading">
            {{getPhrase('list')}}

             @can('country_create')
{{--                <a href="{{ URL_COUNTRIES_ADD }}" class="btn btn-success btn-add pull-right">{{getPhrase('add_new')}}</a>--}}
                  <a href="{{ URL_COUNTRIES_ADD }}" class="btn btn-success btn-add pull-right">Agregar</a>
            @endcan

        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable ">
                <thead>
                    <tr>

                       <th style="text-align:center;">S.no.</th>

{{--                        <th> {{getPhrase('shortcode')}} </th>--}}
                        <th> Código corto </th>

{{--                        <th> {{getPhrase('title')}} </th>--}}
                         <th> Titulo </th>

                       
                        <th>&nbsp;Acciones</th>
                        
                    </tr>
                </thead>
                @if (count($countries) > 0)
                <tbody>
                    @if (count($countries) > 0)
                    <?php $i=0;?>
                        @foreach ($countries as $country)
                        <?php $i++;?>
                            <tr data-entry-id="{{ $country->id }}">

                                <td style="text-align:center;">{{$i}}</td>

                                <td field-key='shortcode'>{{ $country->shortcode }}</td>
                                <td field-key='title'>{{ $country->title }}</td>

                                
                                <td>
                                    @can('country_view')
{{--                                    <a href="{{ URL_COUNTRIES_VIEW }}/{{$country->slug}}" class="btn btn-xs btn-primary"> {{getPhrase('view')}} </a>--}}
                                        <a href="{{ URL_COUNTRIES_VIEW }}/{{$country->slug}}" class="btn btn-xs btn-primary"> Ver </a>
                                    @endcan

                                    @can('country_edit')
{{--                                    <a href="{{ URL_COUNTRIES_EDIT }}/{{$country->slug}}" class="btn btn-xs btn-info"> {{getPhrase('edit')}} </a>--}}
                                        <a href="{{ URL_COUNTRIES_EDIT }}/{{$country->slug}}" class="btn btn-xs btn-info">Editar </a>
                                    @endcan

                                    @can('country_delete')
{{--                                    <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('{{$country->id}}')"> {{ getPhrase('delete') }} </a>--}}
                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('{{$country->id}}')"> Eliminar </a>
                                    @endcan
                                </td>
                               
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">  {{getPhrase('no_entries_in_table')}} </td>
                        </tr>
                    @endif
                </tbody>
                @endif
            </table>
        </div>
    </div>
@stop

@section('footer_scripts') 
   
        @can('country_delete') 
        @include('common.deletescript', array('route'=>URL_COUNTRIES_DELETE))
        @endcan

    
@endsection