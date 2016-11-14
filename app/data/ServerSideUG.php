<?php
/**
* ServerSide
*/
class ServerSideUG
{

	static public function count()
	{
		$group = Usergroup::count("deleted = 'N'");
		return $group;
	}

	static public function requestSearchCount($data)
	{
		$count = Usergroup::count([
			"conditions" => "deleted = 'N' AND (usergroup LIKE '%".$data."%' OR description LIKE '%".$data."%')"
		]);
		return $count;
	}

	static public function requestSearchOrder($search, $request = [])
	{
		$column = ['id', 'usergroup', 'description', 'active', 'deleted'];
		
		$query = Usergroup::find([
			"conditions" => "deleted = 'N' AND (usergroup LIKE '%".$search."%' OR description LIKE '%".$search."%')",
			"order" => $column[$request['order'][0]['column']]." ".$request['order'][0]['dir']." LIMIT ".$request['start']." ,".$request['length']
		]);
		
		return $query;
	}

	static public function requestSearchOrderr($request = [])
	{
		$column = ['id', 'usergroup', 'description', 'active', 'deleted'];
		
		$data = Usergroup::find([
			"conditions" => "deleted = 'N'",
			"order" => $column[$request['order'][0]['column']]." ".$request['order'][0]['dir']." LIMIT ".$request['start']." ,".$request['length']
		]);
		
		return $data;
	}

}

/*

=============================== CARA PEMASANGAN ========================================

 $requestData = $_REQUEST;
        $requestSearch = strtolower($requestData['search']['value']);

        $totalData = ServerSideUG::count();
        $count = $totalData;

        if (!empty($requestSearch)) {
            $count = ServerSideUG::requestSearchCount($requestSearch);
            $order = ServerSideUG::requestSearchOrder($requestSearch, $requestData);
        } else {
            $order = ServerSideUG::requestSearchOrderr($requestData);
        }

        $array = array();
        $no = $requestData['start']+1;
        foreach ($order as $key => $value) {
            $resultData = array();
            $resultData[] = $no++;
            $resultData[] = 'action';
            $resultData[] = $value->usergroup;
            $resultData[] = $value->description;

            $array[] = $resultData;
        }

        $dataJson = [
            "draw"            => intval( $requestData['draw'] ), 
            "recordsTotal"    => intval( $totalData ), 
            "recordsFiltered" => intval( $count ),
            "data"            => $array
        ];
 */