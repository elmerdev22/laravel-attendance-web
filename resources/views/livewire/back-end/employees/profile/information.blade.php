<div>
	<div class="card card-outline card-sayang ">
        <div class="card-header">
            <h2 class="card-title">
                Account Information
            </h2>
        </div>
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{$data->photo}}" alt="User profile picture" style="width: 150px; height: 150px;">
            </div>
            <h3 class="profile-username text-center">{{ucwords($data->first_name.' '.$data->middle_name.' '.$data->last_name)}}</h3>
            <p class="text-muted text-center">({{$data->employee_no}})</p>
            <ul class="list-group sayang-list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Firstname</b> 
                    <a class="float-right">
                        @if($data->first_name)
                            {{ucfirst($data->first_name)}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Middlename</b> 
                    <a class="float-right">
                        @if($data->middle_name)
                            {{ucfirst($data->middle_name)}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Lastname</b> 
                    <a class="float-right">
                        @if($data->last_name)
                            {{ucfirst($data->last_name)}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
                
                <li class="list-group-item">
                    <b>Email</b> 
                    <a class="float-right">
                        @if($data->email)
                            {{$data->email}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
                
                <li class="list-group-item">
                    <b>Gender</b> 
                    <a class="float-right">
                        @if($data->gender)
                            {{ucfirst($data->gender)}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Birth Date</b> 
                    <a class="float-right">
                        @if($data->birth_date)
                            {{date('F d,Y', strtotime($data->birth_date))}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Contact No.</b> 
                    <a class="float-right">
                        @if($data->contact_no)
                            {{$data->contact_no}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Joined</b> 
                    <a class="float-right">
                        @if($data->created_at)
                            {{date('F/d/Y', strtotime($data->created_at))}}
                        @else
                            <small class="text-muted">Not Set</small>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>