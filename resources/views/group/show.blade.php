@extends('layout.master')
@section('main')
    {!! BootstrapForm::horizontal(['model' => $group, 'update' => 'group.update']) !!}
        @include('group.form')
    {!! BootstrapForm::close() !!}
@stop

