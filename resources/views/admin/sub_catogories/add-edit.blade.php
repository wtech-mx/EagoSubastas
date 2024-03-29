@extends('layouts.app')

@section('content')
	{{-- <h3 class="page-title">{{getPhrase('sub_categories')}}</h3> --}}
	<h3 class="page-title">Empresas</h3>

     <div class="panel panel-default">
        <div class="panel-heading">
			{{-- {{ isset($title) ? $title : ''}} --}}
			Crear
        </div>

        {{--@include('errors.errors')--}}

        <div class="panel-body form-auth-style" id="app">

        	<div class="row">
        		@if ($record)
				{{ Form::model($record, 
				array('url' => URL_SUB_CATEGORIES_EDIT.'/'.$record->slug, 
				'method'=>'PATCH', 'name'=>'formValidate', 'novalidate'=>'')) }}
				@else
				{!! Form::open(array('url' => URL_SUB_CATEGORIES_ADD, 'method' => 'POST','name'=>'formValidate', 'novalidate'=>'')) !!}
				@endif

				@include('admin.sub_catogories.form_elements', array('record' => $record))

				{!! Form::close() !!}
			</div>

    	</div>

@endsection


@section('footer_scripts')
@include('common.validations')
@include('common.alertify')

@stop    