<div>
	<div class="card card-primary card-outline mb-3">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-12 text-right">
                    <a href="{{route('back-end.employees.add')}}" class="btn btn-primary">Add Employee</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- NOTE: Always put the show entries & search before the .table-responsive class -->
                    @include('back-end.includes.datatables.search')
                    <div class="table-responsive my-3">
                        <table class="table table-bordered table-hovertable-cell-nowrap table-sm text-center">
                            <thead>
                                <tr>
                                    <th>Employee No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>Gender</th>
                                    <th>BirthDate</th>
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
                                            @if ($row->contact_no)
                                                {{$row->contact_no}}
                                            @else 
                                                <span class="text-sm">Not Set</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->gender)
                                                {{ucfirst($row->gender)}}
                                            @else 
                                                <span class="text-sm">Not Set</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->birth_date)
                                                {{date('F d, y', strtotime($row->birth_date))}}
                                            @else 
                                                <span class="text-sm">Not Set</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('back-end.employees.profile', ['employee_no' => $row->employee_no, 'key_token' => $row->key_token])}}" class="btn btn-success btn-sm">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                            <a href="{{route('back-end.employees.profile', ['employee_no' => $row->employee_no, 'key_token' => $row->key_token])}}" class="btn btn-success btn-sm">
                                                <span class="fas fa-edit"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- NOTE: Always put the pagination after the .table-responsive class -->
                    @include('back-end.includes.datatables.pagination', ['pagination_items' => $data])
                </div>
            </div>
        </div>
    </div> <!-- card.// -->
</div>