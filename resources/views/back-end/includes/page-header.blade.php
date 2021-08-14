<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0 text-dark">{{ isset($page_header['title']) ? ucwords($page_header['title']):'' }}</h2>
            </div><!-- /.col -->
            @if(isset($page_header['breadcrumbs']))
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('login-redirect.index')}}">Home</a></li>
                        @foreach($page_header['breadcrumbs'] as $bc_row)
                            @if($bc_row['url'] != '')
                                <li class="breadcrumb-item"><a href="{{$bc_row['url']}}">{{ ucfirst($bc_row['label']) }}</a></li>
                            @else
                                <li class="breadcrumb-item active">{{ ucfirst($bc_row['label']) }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div><!-- /.col -->
            @endif
        </div><!-- /.row -->
    </div><!-- /.container-fluid-fluid -->
</div>
<!-- /.content-header -->