@extends('layout.master')
@section('main')
    {!! BootstrapForm::openHorizontal(['model' => $user, 'store' => 'user.store']) !!}
        @include('user.form')
        {!! BootstrapForm::submit('Add') !!}
    {!! BootstrapForm::close() !!}
@stop

