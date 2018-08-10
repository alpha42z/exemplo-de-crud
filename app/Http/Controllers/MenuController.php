<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Services\MenuService;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller {

    private $service;

    public function __construct(MenuService $service) {
        $this->service = $service;
    }
    public function index() {
        $menus = $this->service->allParents();
        $submenus = $this->service->allSons();
        return view('menu.index', compact('menus','submenus'));
    }
    public function create() {
        $menus = $this->service->allParents();
        return view('menu.create', compact('menus'));
    }
    public function store(MenuRequest $request) {
        $request->validated();
        $this->service->create($request->all());
        $this->service->allParents();
        return redirect()->route('menu.index')->with(['success' => 'Menu criado com sucesso!']);
    }
    public function edit($id) {
        $menu = $this->service->getById($id);
        if(is_null($menu)) {
            return redirect()->route('menu.index');
        }
        $menus = $this->service->allParents();
        $parentId = $this->service->getParentId($id);
        return view('menu.edit', compact('menu', 'menus', 'parentId'));
    }
    public function update(MenuRequest $request, $id) {
        $request->validated();
        $this->service->update($request->all(),$id);
        return redirect()->route('menu.index')->with(['success' => 'Menu editado com sucesso!']);
    }
    public function destroy($id) {
        $this->service->destroy($id);
        return redirect()->route('menu.index')->with(['success' => 'Menu deletado com sucesso!']);
    }
}