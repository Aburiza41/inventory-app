<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class ProjectsExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Project::all();
//     }
// }

class ProjectsExport implements FromView
{
    public function view(): View
    {
        return view('pages.purchase.purchase', [
            'projects' => Project::all()
        ]);
    }
}
