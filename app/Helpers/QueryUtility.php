<?php
namespace App\Helpers;
use DB;
class QueryUtility{

    private static function where($filter, $data){
		if(isset($filter['where'])){
			$data = $data->where($filter['where']);
			
			return $data;
		}else{
			return false;
		}
	}

	private static function whereNot($filter, $data){
		if(isset($filter['whereNot'])){
			foreach($filter['whereNot'] as $key => $value){
				$data = $data->where($value['field'], '!=', $value['value']);
			}
			return $data;
		}
	}

	private static function whereIn($filter, $data){
		if(isset($filter['whereIn'])){
			foreach($filter['whereIn'] as $key => $value){
				$data = $data->whereIn($value['field'], $value['values']);
			}

			return $data;
		}else{
			return false;
		}
	}

	private static function dateRange($filter, $data){
		if(isset($filter['dateRange'])){
			foreach($filter['dateRange'] as $key => $date){
				$from       = $date['from'].' 00:00:00';
				$to       	= $date['to'].' 23:59:59';
				$data       = $data->whereRaw($date['field']." >= ? AND ".$date['field']." <=?",[$from,$to]);
			}

			return $data;
		}else{
			return false;
		}
	}

	private static function dateRangeTwoField($filter, $data){
		if(isset($filter['dateRangeTwoField'])){
			foreach($filter['dateRangeTwoField'] as $key => $date){
				$data = $data->whereRaw($date['field_from']." <= ? AND ".$date['field_to']." >=?",[$date['date'], $date['date']]);
			}

			return $data;
		}else{
			return false;
		}
	}

	private static function valueBetweenMinMax($filter, $data){
		if(isset($filter['valueBetweenMinMax'])){
			foreach($filter['valueBetweenMinMax'] as $key => $row){
				$data = $data->where($row['field'], '>=', $row['min'])->where($row['field'], '<=', $row['max']);
			}

			return $data;
		}else{
			return false;
		}
	}
	private static function orderByRaw($filter, $data){
		if(isset($filter['order_by'])){
			$data = $data->orderByRaw($filter['order_by']);
			
			return $data;
		}else{
			return false;
		}
	}

    public static function regionProvinces(array $filter = []){
		if(isset($filter['select'])){
			$select = $filter['select'];
		}else{
			$select = '*';
		}

		$data = DB::table('region_provinces')
				->select($select);

		$filtered = self::where($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		$filtered = self::date_range($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		$filtered = self::order_by_raw($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		return $data;
	}

	public static function cities(array $filter = []){
		if(isset($filter['select'])){
			$select = $filter['select'];
		}else{
			$select = '*';
		}

		$data = DB::table('cities')
			->select($select)
			->join('region_provinces', 'region_provinces.id', '=', 'cities.region_province_id');

		$filtered = self::where($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		$filtered = self::date_range($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		$filtered = self::order_by_raw($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		return $data;
	}

	public static function employees(array $filter = []){
		if(isset($filter['select'])){
			$select = $filter['select'];
		}else{
			$select = '*';
		}
		$data = DB::table('employees')
			->select($select)
			->join('users', 'users.id', '=', 'employees.user_id');
	
		$filtered = self::where($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		if(isset($filter['orWhereLike'])){
			$search = trim($filter['orWhereLike']);
			$search = explode(' ',$search);
			$data = $data->where(function($query) use ($search) {
				foreach($search as $value){
					$query->orWhere('employees.first_name','like',"%{$value}%")
						->orWhere('employees.last_name','like',"%{$value}%")
						->orWhere('employees.middle_name','like',"%{$value}%")
						->orWhere('users.email','like',"%{$value}%")
						->orWhere('users.name','like',"%{$value}%");
				}
            });
		}
		
		$filtered = self::whereIn($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		$filtered = self::dateRange($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		$filtered = self::orderByRaw($filter, $data);
		if($filtered){
			$data = $filtered;
		}

		return $data;
	}

}