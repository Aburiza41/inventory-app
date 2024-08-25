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
        <th>Jenis Beli</th>
        <th>Harga Satuan</th>
        <th>Diskon</th>
        <th>Status Proyek</th>
        <th>Supplier</th>
        <th>Kontak Supplier</th>
        <th>Alamat</th>
        <th>Nota Beli</th>
        <th>Tanggal Beli</th>
        <th>Jatuh Tempo</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            @foreach($project->project_material_lists as $k_project_material_list => $V_project_material_list)
                <tr>
                    <td>{{ $k_project_material_list + 1 }}</td>
                    <td>{{ $V_project_material_list->project->owner->name }}</td>
                    <td>{{ $V_project_material_list->project->title }}</td>
                    <td>{{ $V_project_material_list->material->title }}</td>
                    <td>{{ $V_project_material_list->quantity }}</td>
                    <td>{{ $V_project_material_list->unit }}</td>
                    <td>{{ $V_project_material_list->price }}</td>
                    <td>{{ $V_project_material_list->material_order_list->brand }}</td>
                    <td>{{ $V_project_material_list->material_order_list->price }}</td>
                    <td>{{ $V_project_material_list->material_order_list->discount }}</td>
                    <td>{{ $V_project_material_list->status }}</td>
                    <td>{{ $V_project_material_list->material_order_list->material_order->supplier->name }}</td>
                    <td>{{ $V_project_material_list->material_order_list->material_order->supplier->phone_1 }}</td>
                    <td>{{ $V_project_material_list->material_order_list->material_order->supplier->address }}</td>
                    <td>{{ $V_project_material_list->material_order_list->material_order->buyer_number_invoice }}</td>
                    <td>{{ $V_project_material_list->material_order_list->material_order->purchase_date }}</td>
                    <td>{{ $V_project_material_list->material_order_list->material_order->due_date }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
