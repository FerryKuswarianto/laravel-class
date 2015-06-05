@extends('layout.master')
@section('main')
    {!! BootstrapForm::openHorizontal(['model' => $user, 'update' => 'user.update']) !!}
        @include('user.form')
        {!! BootstrapForm::submit('Update') !!}
    {!! BootstrapForm::close() !!}
@stop

