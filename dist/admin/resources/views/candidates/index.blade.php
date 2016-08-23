@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="pull-left"><i class="fa fa-users"></i> Candidatos <a href="{{ url('/candidates/create') }}" class="btn btn-primary btn-xs" title="Add New Candidate"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    
    <form class="form-inline pull-right" style="margin-top: 30px; margin-bottom: 20px;">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-user"></i> CPF</div>
      <input type="text" name="cpf" class="form-control" id="exampleInputAmount" placeholder="Digite aqui o CPF">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Pesquisar</button>
</form>

<div class="clearfix"></div>

@if (sizeof($candidates) == 0)

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><i class="fa fa-exclamation-circle"></i> Nenhum registro encontrado!</strong> Tente novamente...
</div>

@else

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><i class="fa fa-user"></i> {{sizeof($candidates)}} registros encontrados.</strong>
</div>

@endif

    
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th> Nome Completo </th>
                    <th> CPF </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($candidates as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>
                        <a href="{{ url('/candidates/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Candidate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/candidates', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Candidate" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Candidate',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $candidates->render() !!} </div>
    </div>

</div>
@endsection
