<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BuyDetailModel;
use App\Models\BuyModel;
use App\Models\OpnameModel;
use App\Models\SaleDetailModel;
use App\Models\SaleModel;
use App\Models\UsersModel;
use Myth\Auth\Models\UserModel;

define('_TITLE', 'Dashboard');

class Admin extends BaseController
{
    private $m_sale, $m_buy, $m_sale_detail, $m_buy_detail, $m_users, $m_opname;

    public function __construct()
    {
        $this->m_sale = new SaleModel();
        $this->m_buy = new BuyModel();
        $this->m_sale_detail = new SaleDetailModel();
        $this->m_buy_detail = new BuyDetailModel();
        $this->m_users = new UsersModel();
        $this->m_opname = new OpnameModel();
    }

    public function index()
    {
        $data_user = $this->m_users->getUser(user_id());
        $data = [
            'title' => _TITLE,
            'data_user' => $data_user
        ];
        return view('page', $data);
    }

    public function getGrafik()
    {
        if ($this->request->isAJAX()) {
            $sales = $this->m_sale->saleGrafik();
            $buy = $this->m_buy->buyGrafik();
            $data = [
                'sales' => $sales,
                'buy' => $buy
            ];
            $json = [
                'data' => $data
            ];
            return $this->response->setJSON($json);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function getRows()
    {
        if ($this->request->isAJAX()) {
            $sales = $this->m_sale->getRows();
            $buys = $this->m_buy->getRows();
            $users = $this->m_users->countAllResults();
            $opname = $this->m_opname->countAllResults();

            $data = [
                'sales' => $sales,
                'buys' => $buys,
                'users' => $users,
                'opname' => $opname
            ];
            $json = [
                'data' => $data,
                'status' => true
            ];

            return $this->response->setJSON($json);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
