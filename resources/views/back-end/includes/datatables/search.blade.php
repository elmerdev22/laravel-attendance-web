<div class="row">
	<div class="col-sm-7 col-md-8 col-lg-9 text-center text-sm-left">
		<div class="my-2">
			Show 
				<select wire:model="show_entries">
					@foreach(Utility::datatableShowEntries() as $value)
						<option value="{{$value == 1 && $data->total() > 0 ? $data->total() : $value }}">{{$value == 1 ? 'All' : $value}}</option>
					@endforeach
				</select> 
			Entries	
		</div>
	</div>
	<div class="col-sm-5 col-md-4 col-lg-3 text-center text-sm-right">
		<input type="search" wire:model.debounce.300ms="search" class="form-control" placeholder="Search...">
	</div>
</div>