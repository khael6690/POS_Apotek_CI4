<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

define('_TITLE', 'Group');

class Group extends BaseController
{

    private $_m_group, $_m_permissions;
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->_m_permissions = new PermissionModel();
        $this->_m_group = new GroupModel();
    }

    public function index()
    {
        $data_group = $this->_m_group->findAll();
        $data = [
            'title' => _TITLE,
            'data_group' => $data_group
        ];
        return view('Group/index', $data);
    }

    public function edit($id = null)
    {
        // dd($this->_m_group->getPermissionsForGroup($id));
        foreach ($this->_m_group->getPermissionsForGroup($id) as $value) {
            // dd($value);
            $permissionsGroup[$value['id']] = $value['name'];
        }
        // dd($permissionsGroup);
        $data_group = $this->_m_group->find($id);
        $data = [
            'title' => _TITLE,
            'data_group' => $data_group,
            'permissions' => $this->_m_permissions->findAll(),
            'permissionsGroup' => $permissionsGroup,
            'validation' => \config\Services::validation()
        ];
        return view('Group/update', $data);
    }

    public  function update($id)
    {
        if (!$this->validate([
            'permissions' => [
                'rules' => 'required',
                'label' => 'Izin',
                'errors' => [
                    'required' => '{field} Harus diisi salah satu!'
                ]
            ]
        ])) {
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('group-update/' . $id)->withInput();
        }
        if ($this->db->table('auth_groups_permissions')->where('group_id', $id)->delete()) {
            $permissions = $this->request->getPost('permissions');
            if (count($permissions) > 0) {
                foreach ($permissions as $value) {
                    $this->_m_group->addPermissionToGroup($value, $id);
                }
            }
            session()->setFlashdata('sukses', 'Group berhasil diupdate!');
        } else
            session()->setFlashdata('warning', 'Group gagal diupdate!');
        return redirect()->to('/group');
    }
}
