@extends('layouts.base-admin')

@section('title')
    Menu
@endsection

@section('text-title')
    Menu
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active">Menu</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          @if(session('success'))
          <p class="alert-success justify" style="padding: 5px 10px; width: 230px;">{{ session('success') }}</p>
          @endif
          <a href="{{ route('menu.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus fa-fw"></i>Novo menu</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" id="font-size-12">Posição</th>
                <th scope="col" id="font-size-12">Submenu de</th>
                <th scope="col" id="font-size-12">Nome em PT</th>
                <th scope="col" id="font-size-12">Nome em EN</th>
                <th scope="col" id="font-size-12">Nome em CN</th>
                <th scope="col" id="font-size-12">Link</th>
                <th scope="col" id="font-size-12">Ação</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $menu)
              <tr>
                <td id="font-size-12">{{ $menu -> position }}</td>
                <td id="font-size-12">- sem -</td>
                <td id="font-size-12">{{ $menu -> name_pt }}</td>
                <td id="font-size-12">{{ $menu -> name_en }}</td>
                <td id="font-size-12">{{ $menu -> name_cn }}</td>
                <td id="font-size-12">{{ $menu -> link }}</td>
                <td>
                  <form class="form-horizontal" action="{{ route('menu.delete', $menu->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <a type="button" href="{{ route('menu.edit', $menu->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> editar</a>
                    <!-- COM MODAL DE EXCLUSAO -->
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-times"></i> remover</button>
                    <!-- MODAL DE EXCLUSÃO -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning"></i> Confirma exclusão?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Tem certeza que deseja prosseguir?<br/>Essa ação não pode ser desfeita!
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i> cancelar</button>
                            <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-times"></i> remover</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- FIM DO MODAL DE EXCLUSÃO -->
                    <!-- SEM MODAL DE EXCLUSAO
                    <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-times"></i> remover</button>
                    -->
                  </form>
                </td>
                @foreach ($submenus as $submenu)
                  @if ($submenu->parent_id == $menu->id)
                    <tr>
                      <td id="font-size-12">{{ $menu -> position }}.{{ $submenu -> position }}</td>
                      <td id="font-size-12">{{ $menu -> name_pt }}</td>
                      <td id="font-size-12">{{ $submenu -> name_pt }}</td>
                      <td id="font-size-12">{{ $submenu -> name_en }}</td>
                      <td id="font-size-12">{{ $submenu -> name_cn }}</td>
                      <td id="font-size-12">{{ $submenu -> link }}</td>
                      <td>
                        <form class="form-horizontal" action="{{ route('menu.delete', $menu->id) }}" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <a type="button" href="{{ route('menu.edit', $menu->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> editar</a>
                          <!-- COM MODAL DE EXCLUSAO -->
                          <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-times"></i> remover</button>
                          <!-- MODAL DE EXCLUSÃO -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning"></i> Confirma exclusão?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Tem certeza que deseja prosseguir?<br/>Essa ação não pode ser desfeita!
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i> cancelar</button>
                                  <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-times"></i> remover</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- FIM DO MODAL DE EXCLUSÃO -->
                          <!-- SEM MODAL DE EXCLUSAO
                          <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-times"></i> remover</button>
                          -->
                        </form>
                      </td>
                    </tr>
                  @endif
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
<style>
  #font-size-12 {
    font-size: 12;
  }
</style>
<script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
</script>