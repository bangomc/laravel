<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lancamento;
use Redirect;
use Illuminate\Support\Facades\Auth;

class LancamentosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
      $codigo = Auth::id();
      $mes = $request->mes;

      if(null==$mes){
        $mes = 6;
      }

      $lancamentos = Lancamento::where(['user_id'=>$codigo,'mes'=>$mes])->get();
      return view('lancamentos/lst',['lancamentos' => $lancamentos]);
    }

    public function add(){
      return view('lancamentos/frm');
    }

    public function grv(Request $request){
      $lancamento = new Lancamento();

      $lancamento->user_id = Auth::id();
      $lancamento->descricao = $request->descricao;
      $lancamento->valor = $request->valor;
      $lancamento->ano = $request->ano;
      $lancamento->mes = $request->mes;
      $lancamento = $lancamento->save();

      \Session::flash('msg_sucesso','Gravação efetuada com sucesso!');

      return Redirect::to('lancamentos/add');
    }
    public function edt($id){
      $lancamento = Lancamento::find($id);
      return view('lancamentos/frm',['lancamento'=>$lancamento]);
    }
    public function upd($id, Request $request){
      $lancamento = Lancamento::find($id);
      $lancamento->update($request->all());

      \Session::flash('msg_sucesso','Gravação efetuada com sucesso!');

      return Redirect::to('lancamentos/'.$lancamento->id.'/edt');
    }

    public function del($id){
      $lancamento = Lancamento::find($id);
      $lancamento->delete();
      \Session::flash('msg_sucesso','Exclusão efetuada com sucesso!');

      return Redirect::to('lancamentos');
    }
}
