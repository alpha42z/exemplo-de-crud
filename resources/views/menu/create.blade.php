@extends('layouts.base-admin')

@section('title')
    Novo
@endsection

@section('text-title')
    Novo
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/menu">Menu</a></li>
    <li class="breadcrumb-item active">Novo</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action="{{ route('menu.create') }}" method="post">
            @csrf
            <div class="form-group">
              <label class="col-sm-4 control-label">Nome em Portugês</label>
              <div class="col-sm-6">
                <input name="name_pt" value="{{ old('name_pt') }}" type="text" class="form-control {{ $errors->has('name_pt') ? 'is-invalid' : '' }}" placeholder="Nome do Menu">
                @if($errors->has('name_pt'))
                  <div class="invalid-feedback">{{ $errors->first('name_pt') }}</div>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Nome em Inglês</label>
              <div class="col-sm-6">
                <input name="name_en" value="{{ old('name_en') }}" type="text" class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" placeholder="Nome do Menu">
                @if($errors->has('name_en'))
                  <div class="invalid-feedback">{{ $errors->first('name_en') }}</div>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Nome em Chinês</label>
              <div class="col-sm-6">
                <input name="name_cn" value="{{ old('name_cn') }}" type="text" class="form-control {{ $errors->has('name_cn') ? 'is-invalid' : '' }}" placeholder="Nome do Menu">
                @if($errors->has('name_cn'))
                  <div class="invalid-feedback">{{ $errors->first('name_cn') }}</div>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Posição</label>
              <div class="col-sm-6">
                <input name="position" value="{{ old('position') }}" type="text" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" placeholder="Posição no Menu">
                @if($errors->has('position'))
                  <div class="invalid-feedback">{{ $errors->first('position') }}</div>
                @endif
              </div>
            </div>
             <div class="form-group col-sm-6">
              <label for="submenu">Submenu de:</label>
              <select name="parent_id" class="form-control" id="submenu">
                <option value="0">- novo menu -</option>
                @foreach ($menus as $menu)
                  <option value="{{ $menu -> id }}">{{ $menu -> name_pt }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-sm-6 control-label">
            * não preencher o link se esse for um menu com submenus.</div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Link</label>
              <div class="col-sm-6">
                <input name="link" value="{{ old('link') }}" type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" placeholder="link">
                @if($errors->has('link'))
                  <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                @endif
              </div>
            </div>
          </div>
          <div class="card-footer clearfix">
            <input type="submit" class="btn btn-primary" value="Salvar">
            <a href="{{ route('menu.index') }}" class="btn btn-danger">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection