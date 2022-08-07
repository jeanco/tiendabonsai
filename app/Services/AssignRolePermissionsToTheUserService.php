<?php

namespace App\Services;

use App\PermissionRole;
use App\PermissionUser;

class AssignRolePermissionsToTheUserService
{
    public function execute($user_id, $role_id){

        $role_permission = PermissionRole::whereRoleId($role_id)
        ->get();

        foreach ($role_permission as $i => $rp) {

            $exist_record_permission_user = PermissionUser::whereUserId($user_id)
                ->wherePermissionId($rp->permission_id)->first();

            if (!count($exist_record_permission_user)) {
                $new_permission_user = new PermissionUser();
                $new_permission_user->user_id = $user_id;
                $new_permission_user->permission_id = $rp->permission_id;
                $new_permission_user->additional = 0;
                $new_permission_user->activated = $rp->activated;
                $new_permission_user->save();
            } else {
                if ($rp->activated) {
                    $exist_record_permission_user->activated = 1;
                    $exist_record_permission_user->save();
                }
            }
        }

    }

}
