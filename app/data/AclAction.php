<?php

class AclAction
{

	static public function group()
	{
		$group = Usergroup::find();
    	foreach ($group as $key => $value) {
    		$group_name[$value->id] = $value->usergroup;
    	}
    	return $group_name;
	}

	static public function user($username)
	{
		$user = Users::findFirst("username = '$username'");
    	if (!empty($user->usergroup)) {
            $usergroup = explode(',', $user->usergroup);
            foreach ($usergroup as $key => $value) {
                if ($value != '') {
                    $usergroup_data['array'][$value] = AclAction::group()[$value];
                    $usergroup_data['sql'][] = "usergroup like '%,$value,%'";
                }
            }
        }

        return $usergroup_data;
	}

	static public function acl($group_sql, $username)
	{
		$acl = Acl::find([
    		"conditions" => "$group_sql or  except like '%,$username,%'"
    	]);

        foreach ($acl as $key => $value) {
            $controller[$value->controller] = 1;
            if ($value->action != '') {
                $action['url'] = "/".$value->action;
                $action['array'][$value->controller][$value->action] = 1;
            }else{
                $action['url'] = '';
            }
            $url[] = $value->controller.$action['url'];
        }

        $access = array(
            'usergroup'  => AclAction::user($username)['array'],
            'url'        => $url,
            'public_url' => explode(',', PUBLIC_URL),
            'controller' => $controller,
            'action'     => $action['array']
        );

    	return $access;
	}

	static public function aclList($username)
	{
    	$group = AclAction::group();
    	$user  = AclAction::user($username);

    	$group_sql = implode(' or ', $user['sql']);
    	$acl = AclAction::acl($group_sql, $username);

    	return $acl;
	}
    
    static public function usergroup()
    {
        $usergroup = Usergroup::find(["conditions" => "active = 'Y' AND deleted = 'N'"]);
        return $usergroup;
    }

    static public function acl_usergroup($string)
    {
        $result = explode(',', $string);
        return $result;
    }

}