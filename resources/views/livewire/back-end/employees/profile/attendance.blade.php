<div>
	<div class="card card-primary card-outline">
        <div class="card-header">
            <h4 class="card-title">Attendance</h4>
			<div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
            </div>
        </div>
        <div wire:ignore class="card-body">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="{{route('back-end.employees.export-attendance', ['employee_id' => $employee_id])}}">
                        @method('GET')
                        <div class="form-group">
                            <label>Export Attendance:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="daterangepicker" id="daterangepicker">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-success rounded-right">Export</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 text-right">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function () {
  
        var Calendar   = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');
    
        let collection = [];

        @foreach ($data as $item)
            collection.push({
                id             : '{{$item->id}}',
                title          : '{{Utility::attendanceType()[$item->type]}}',
                start          : '{{date("Y-m-d", strtotime($item->created_at))}}',
                backgroundColor: '#28a745',
                borderColor    : '#28a745',
                url            : 'javascript:void(0);',
                allDay         : true,
            })
        @endforeach
        
        var calendar = new Calendar(calendarEl, {
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
                header    : {
                left  : 'prev,next today',
                center: 'title',
                right : 'export, dayGridMonth,timeGridWeek,timeGridDay'
            },
            'themeSystem': 'bootstrap',
            //Random default events
            events    : collection,
            eventClick: function(info) {
                @this.call('showPhoto', info.event.id)
                Swal.fire({
                    title             : 'Please wait...',
                    html              : 'Getting Information...',
                    allowOutsideClick : false,
                    showCancelButton  : false,
                    showConfirmButton : false,
                    onBeforeOpen      : () => {
                        Swal.showLoading();
                    }
                });
            },
            customButtons: {
                export: {
                    text: 'Export',
                    click: function() {
                        alert('clicked export button .{{$employee_id}}');
                    }
                }
            }
        });
  
      calendar.render();
    })

    window.livewire.on('showPhoto', param => {
        Swal.close();
        Swal.fire({
            title      : param['time'],
            html       : `(<span>${param['type']}</span>)<br><a target="_blank" href='${param['photo']}'>Click here to view full photo.</a>`,
            imageUrl   : param['photo'],
            imageHeight: 200,
            imageAlt   : 'Loading Photo...',
        })
    });
  </script>
@endpush
