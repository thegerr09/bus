<?php

class AclAction
{

	public static function group()
	{
		$group = Usergroup::find();
    	foreach ($group as $key => $value) {
    		$group_name[$value->id] = $value->group;
    	}
    	return $group_name;
	}

	public static function user($username)
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

	public static function acl($group_sql, $username)
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

	public static function aclList($username)
	{
    	$group = AclAction::group();
    	$user  = AclAction::user($username);

    	$group_sql = implode(' or ', $user['sql']);
    	$acl = AclAction::acl($group_sql, $username);

    	return $acl;
	}

}