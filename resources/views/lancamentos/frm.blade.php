@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Lançamento
                  <a href="{{ url('lancamentos') }}" class="btn btn-default btn-sm pull-right">Voltar</a>
                </div>

                <div class="panel-body">

                  @if(Session::has('msg_sucesso'))
                    <div class="alert alert-success">
                      {{ Session::get('msg_sucesso') }}
                    </div>
                  @endif


                  @if(Request::is('*/edt'))
                    {!! Form::model($lancamento,['method'=>'PATCH','url'=>'lancamentos/'.$lancamento->id]) !!}
                  @else
                    {!! Form::open(['url'=>'lancamentos/grv']) !!}
                  @endif

                  {!! Form::input('text', 'descricao', null, ['class'=>'form-control','autofocus','placeholder'=>'Descrição']) !!}
                  {!! Form::input('text', 'valor', null, ['class'=>'form-control','','placeholder'=>'Valor']) !!}
                  {!! Form::number('ano', 2017, ['class'=>'form-control','','placeholder'=>'ano']) !!}
                  {!! Form::number('mes', null, ['class'=>'form-control','','placeholder'=>'mes']) !!}
                  <br/>
                  {!! Form::submit('Salvar',['class'=>'btn btn-default']) !!}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
