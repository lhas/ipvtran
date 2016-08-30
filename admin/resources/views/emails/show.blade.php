@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Email {{ $email->id }}
        <a href="{{ url('emails/' . $email->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Email"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['emails', $email->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Email',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $email->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $email->name }} </td></tr><tr><th> Email </th><td> {{ $email->email }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
