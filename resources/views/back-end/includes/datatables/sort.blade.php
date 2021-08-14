@if($field !== implode('|', $sort))
	<i class="text-muted float-right fas fa-sort"></i>
@elseif($sort_type == 'asc')
	<i class="text-sayang float-right fas fa-sort-up"></i>
@else
	<i class="text-sayang float-right fas fa-sort-down"></i>
@endif