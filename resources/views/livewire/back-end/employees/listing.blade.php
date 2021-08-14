<div>
	<div class="card card-primary card-outline mb-3">
        <div class="card-body">
            <!-- NOTE: Always put the show entries & search before the .table-responsive class -->
            @include('back-end.includes.datatables.search')
            <div class="table-responsive my-3">
                <table class="table table-bordered table-hovertable-cell-nowrap table-sm text-center">
                    <thead>
                        <tr>
                            <th>Employee No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td>{{$row->employee_no}}</td>
                                <td>{{ucfirst($row->first_name)}}</td>
                                <td>{{ucfirst($row->last_name)}}</td>
                                <td>
                                    <a href="{{route('back-end.employees.profile', ['employee_no' => $row->employee_no, 'key_token' => $row->key_token])}}" class="btn btn-success btn-sm">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- NOTE: Always put the pagination after the .table-responsive class -->
            @include('back-end.includes.datatables.pagination', ['pagination_items' => $data])
        </div>
    </div> <!-- card.// -->
</div>