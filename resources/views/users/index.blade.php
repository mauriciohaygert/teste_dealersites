@extends('layout')

@section('cabecalho')
<h1>Dealer Sites - Teste Full Stack Developer</h1>
@endsection

@section('conteudo')
<form id="filtro" method="post" class="">
  @csrf
  <input type="hidden" name="orderby" id="orderby" value="">
  <input type="hidden" name="sort" id="sort" value="">
  <input type="hidden" name="name_sort" id="name_sort" value="asc">
  <input type="hidden" name="page" id="page" value="1">
    <div class="btn-toolbar mb-3" role="toolbar">

      <div class="input-group mr-2">
        <div class="input-group-prepend">
          <div class="input-group-text" id="aria1"><i class="fas fa-search"></i></div>
        </div>
        <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" aria-describedby="aria1" onchange="$('#page').val(1);filtro()">
      </div>


      <div class="input-group mr-2">
        <input type="date" placeholder="Fim da busca" class="form-control" name="dt_inicio" id="dt_inicio" onchange="filtro()">
      </div>


      <div class="input-group mr-2">
        <input type="date" placeholder="Fim da busca" class="form-control" name="dt_fim" id="dt_fim" onchange="filtro()">
      </div>
  
      <div class="btn-group btn-group-sm mr-2" role="group" aria-label="aria2">
        <div class="input-group-prepend">
          <div class="input-group-text" id="aria2">Paginação</div>
        </div>
        <select class="form-control" name="paginacao" id="paginacao" onchange="filtro()" aria-describedby="aria2">
          <option>10</option>
          <option>20</option>
          <option>30</option>
          <option>100</option>
        </select>
      </div>

      <div class="btn-group align-self-end" role="group" aria-label="First group">
          <button type="button" class="btn btn-secondary mr-1" name="desc">Mais Logins</button>
          <button type="button" class="btn btn-secondary mr-1" name="asc">Menos Logins</button>
      </div>
    </div>
</form>
  

<div class="form-row" id="tabela">
  @include('users.tabela', $users)
</div>

@endsection