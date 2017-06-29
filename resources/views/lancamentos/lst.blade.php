@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lançamentos
                    {!! Form::open(['method'=>'GET','url'=>'lancamentos','style'=>'display:inline']) !!}
                    {!! Form::select('mes', ['5'=>'Maio','6'=>'Junho'], ['placeholder'=>'mes']) !!}
                    {!! Form::number('ano',2017, ['placeholder'=>'ano']) !!}
                    {!! Form::submit('Filtrar',['class'=>'btn btn-default btn-sm']) !!}
                    {!! Form::close() !!}
                    <a href="{{ url('lancamentos/add') }}" class="btn btn-default btn-sm pull-right">Adicionar</a>
                </div>

                <div class="panel-body">
                  @if(Session::has('msg_sucesso'))
                    <div class="alert alert-success">
                      {{ Session::get('msg_sucesso') }}
                    </div>
                  @endif

                  <table class="table">
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>ano</th>
                    <th>mes</th>
                    <th>Ações</th>
                    <tbody>
                      @foreach($lancamentos as $lan)
                      <tr>
                        <td>{{ $lan->descricao }}</td>
                        <td>{{ $lan->valor }}</td>
                        <td>{{ $lan->ano }}</td>
                        <td>{{ $lan->mes }}</td>
                        <td>
                          <a href="lancamentos/{{ $lan->id }}/edt" class="btn btn-default btn-sm">EDT</a>
                          {!! Form::open(['method'=>'DELETE','url'=>'lancamentos/'.$lan->id,'style'=>'display:inline']) !!}
                          <button type='submit' class="btn btn-default btn-sm">DEL</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
