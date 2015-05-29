@extends('layout.master')
@section('main')
    {!! BootstrapForm::openHorizontal(['model' => $group, 'store' => 'group.store']) !!}
        @include('group.form')
        {!! BootstrapForm::submit('Add') !!}
    {!! BootstrapForm::close() !!}
@stop

