<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $useSoftDeletes = true;
    protected $allowedFields    = ['email', 'username', 'fullname', 'user_image', 'password_hash', 'active'];
    protected $useTimestamps = true;

    public function getUser($id = null)
    {
        if ($id === null) {
            $this->select('users.id as userid, username, fullname, email, user_image, gu.group_id, g.name, g.id ')
                ->join('auth_groups_users gu', 'users.id = gu.user_id')
                ->join('auth_groups g', 'g.id = gu.group_id');
            return $this->get()->getResultArray();
        } else {
            $this->select('users.id as userid, username, fullname, email, user_image, gu.group_id, g.name, g.id ')
                ->join('auth_groups_users gu', 'users.id = gu.user_id')
                ->join('auth_groups g', 'g.id = gu.group_id');
            $this->where(['users.id ' => $id]);
            return $this->first();
        }
    }
}
