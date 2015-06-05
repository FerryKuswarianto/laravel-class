@extends('layout.master')
@section('main')
    {!! BootstrapForm::horizontal(['model' => $group, 'store' => 'group.store']) !!}
        @include('group.form')
        {!! BootstrapForm::submit('Add') !!}
    {!! BootstrapForm::close() !!}
@stop

