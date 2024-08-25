<?php

namespace App\Exports;

use App\Models\ProjectMaterialList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class ProjectMaterialListsExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return ProjectMaterialList::all();
//     }
// }

class ProjectMaterialListsExport implements FromView
{
    public function view(): View
    {
        return view('pages.purchase.order.po', [
            'project_material_lists' => ProjectMaterialList::all()
        ]);
    }
}
