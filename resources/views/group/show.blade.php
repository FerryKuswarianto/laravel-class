@extends('layout.master')
@section('main')
    {!! BootstrapForm::openHorizontal(['model' => $group, 'update' => 'group.update']) !!}
        @include('group.form')
    {!! BootstrapForm::close() !!}
@stop

