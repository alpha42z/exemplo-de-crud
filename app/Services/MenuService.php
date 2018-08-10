<?php

namespace App\Services;
use App\Menu;

class MenuService
{

    // public function getAll ()
    // {
    //     return Menu::all()->sortBy('position');
    // }

    public function create ($data)
    {        
        return Menu::create
        ([
            'name_pt' =>$data['name_pt'],
            'name_en' =>$data['name_en'],
            'name_cn' =>$data['name_cn'],
            'link' =>$data['link'],
            'position' =>$data['position'],
            'parent_id' =>$data['parent_id'] == 0 ? null : $data['parent_id']
        ]);
    }

    public function getById ($id)
    {
        return Menu::find($id);
    }

    public function update ($data, $id)
    {        
        return Menu::where('id', $id)->update
        ([
            'name_pt' =>$data['name_pt'],
            'name_en' =>$data['name_en'],
            'name_cn' =>$data['name_cn'],
            'link' =>$data['link'],
            'position' =>$data['position'],
            'parent_id' =>$data['parent_id'] == 0 ? null : $data['parent_id']
        ]);
    }

    public function destroy ($id) 
    {
        return Menu::destroy($id);
    }
    public function allParents()
    {
        return Menu::whereNull('parent_id')->get()->sortBy('position');
    }
    public function allSons()
    {
        return Menu::whereNotNull('parent_id')->get()->sortBy('position');
    }
    public function getParentId($id)
    {
        return Menu::find($id)->parent_id;
    }
}