<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

define('_TITLE', 'Group');

class Group extends BaseController
{

    private $_m_group, $_m_permissions, $db;
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->_m_permissions = new PermissionModel();
        $this->_m_group = new GroupModel();
    }

    public function index()
    {
        $data = [
            'title' => _TITLE
        ];
        return view('Group/index', $data);
    }


    public function viewdata()
    {
        if ($this->request->isAJAX()) {
            $data_group = $this->_m_group->findAll();
            $data = [
                'data_group' => $data_group
            ];

            $msg = [
                'data' => view('Group/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {
        if ($this->request->isAJAX()) {
            // dd($this->_m_group->getPermissionsForGroup($id));
            foreach ($this->_m_group->getPermissionsForGroup($id) as $value) {
                // dd($value);
                $permissionsGroup[$value['id']] = $value['name'];
            }

            $data_group = $this->_m_group->find($id);
            $data = [
                'title' => _TITLE,
                'data_group' => $data_group,
                'permissions' => $this->_m_permissions->findAll(),
                'permissionsGroup' => $permissionsGroup
            ];
            $msg = [
                'data' => view('Group/update', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public  function update($id)
    {
        if ($this->request->isAJAX()) {
            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'permissions' => [
                    'rules' => 'required',
                    'label' => 'Izin',
                    'errors' => [
                        'required' => '{field} harus pilih minimal satu!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'permissions' => $validation->getError('permissions')
                    ]
                ];
                return $this->response->setJSON($msg);
            }
            if ($this->db->table('auth_groups_permissions')->where('group_id', $id)->delete()) {
                $permissions = $this->request->getPost('permissions');
                if (count($permissions) > 0) {
                    foreach ($permissions as $value) {
                        $this->_m_group->addPermissionToGroup($value, $id);
                    }
                }
                $msg = [
                    'success' =>  'Data berhasil diupdate!'
                ];
                return $this->response->setJSON($msg);
            } else
                $msg = [
                    'fail' =>  'Data gagal diupdate!'
                ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
