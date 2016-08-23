@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Candidate</h1>
    <hr/>

    {!! Form::open(['url' => '/candidates', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('certification_attachment') ? 'has-error' : ''}}">
                {!! Form::label('certification_attachment', 'Certification Attachment', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('certification_attachment', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('certification_attachment', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                {!! Form::label('sex', 'Sex', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sex', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cpf') ? 'has-error' : ''}}">
                {!! Form::label('cpf', 'Cpf', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cpf', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rg') ? 'has-error' : ''}}">
                {!! Form::label('rg', 'Rg', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('rg', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
                {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('date_of_birth', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('orgao_expedidor') ? 'has-error' : ''}}">
                {!! Form::label('orgao_expedidor', 'Orgao Expedidor', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('orgao_expedidor', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('orgao_expedidor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mom_name') ? 'has-error' : ''}}">
                {!! Form::label('mom_name', 'Mom Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('mom_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mom_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                {!! Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address_num') ? 'has-error' : ''}}">
                {!! Form::label('address_num', 'Address Num', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address_num', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address_num', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address_complement') ? 'has-error' : ''}}">
                {!! Form::label('address_complement', 'Address Complement', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address_complement', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address_complement', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address_neighbourhood') ? 'has-error' : ''}}">
                {!! Form::label('address_neighbourhood', 'Address Neighbourhood', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address_neighbourhood', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address_neighbourhood', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address_cep') ? 'has-error' : ''}}">
                {!! Form::label('address_cep', 'Address Cep', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address_cep', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address_cep', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                {!! Form::label('phone', 'Phone', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cell_phone') ? 'has-error' : ''}}">
                {!! Form::label('cell_phone', 'Cell Phone', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('cell_phone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cell_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nr_cnh') ? 'has-error' : ''}}">
                {!! Form::label('nr_cnh', 'Nr Cnh', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nr_cnh', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nr_cnh', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                {!! Form::label('category', 'Category', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('category', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection