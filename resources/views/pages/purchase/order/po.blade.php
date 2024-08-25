<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Owner</th>
        <th>Pekerjaan</th>
        <th>Nama Barang</th>
        <th>Vol</th>
        <th>Sat</th>
        <th>Estimasi Harga Satuan</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($project_material_lists as $k_project_material_list => $V_project_material_list)
        <tr>
            <td>{{ $k_project_material_list + 1 }}</td>
            <td>{{ $V_project_material_list->project->owner->name }}</td>
            <td>{{ $V_project_material_list->project->title }}</td>
            <td>{{ $V_project_material_list->material->title }}</td>
            <td>{{ $V_project_material_list->quantity }}</td>
            <td>{{ $V_project_material_list->unit }}</td>
            <td>{{ $V_project_material_list->price }}</td>
            <td>{{ $V_project_material_list->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
