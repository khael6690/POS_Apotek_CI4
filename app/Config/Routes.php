<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// routes akses login
$routes->group('', ['filter' => 'login'], function ($routes) {
    //route akses admin
    $routes->get('/', 'admin\Admin::index');
    $routes->get('grafik', 'admin\Admin::getGrafik');
    $routes->get('count-rows', 'admin\Admin::getRows');

    // route setting user
    $routes->get('setuser', 'admin\User::setuser');
    $routes->get('setuser/datauser', 'admin\User::dataUser');
    $routes->post('setuser/(:num)', 'admin\User::saveset/$1');
    $routes->post('changepass/(:num)', 'admin\User::changesave/$1');

    //route akses stok
    $routes->get('stok', 'admin\Stok::index');
    $routes->get('stok-opname', 'admin\Stok::indexOpname');
    $routes->get('stok-opname/viewdata', 'admin\Stok::viewdataOpname');
    $routes->get('opname-update/(:num)', 'admin\Stok::opnameEdit/$1');
    $routes->post('opname-update/(:num)', 'admin\Stok::opnameUpdate/$1');
    $routes->delete('opname-delete/(:num)', 'admin\Stok::opnameDelete/$1');
    $routes->get('stok-masuk', 'admin\Stok::stok_masuk');
    $routes->get('stok-masuk/viewdata', 'admin\Stok::viewdataMasuk');
    $routes->get('stok/viewdata', 'admin\stok::viewdata');
    $routes->get('opname-create/(:num)', 'admin\stok::addOpname/$1');
    $routes->post('opname-save', 'admin\stok::saveOpname');

    // route management customers
    $routes->get('customers', 'admin\Customers::index');
    $routes->get('customers/viewdata', 'admin\Customers::viewdata');
    $routes->get('customers/data', 'admin\Customers::data');
    $routes->post('customers-detail', 'admin\Customers::detail');
    $routes->get('customers-create', 'admin\Customers::create');
    $routes->post('customers-create', 'admin\Customers::save');
    $routes->get('customers-update/(:num)', 'admin\Customers::edit/$1');
    $routes->post('customers-update/(:num)', 'admin\Customers::update/$1');
    $routes->delete('customers/(:num)', 'admin\Customers::delete/$1');
});

$routes->group('', ['filter' => 'permission:management-user'], function ($routes) {
    // routes akses User
    $routes->get('user', 'admin\User::index');
    $routes->get('user/viewdata', 'admin\User::viewdata');
    $routes->post('user-detail', 'admin\User::detail');
    $routes->get('user-create', 'admin\User::create');
    $routes->post('user-create', 'admin\User::save');
    $routes->get('user-update/(:num)', 'admin\User::edit/$1');
    $routes->post('user-update/(:num)', 'admin\User::update/$1');
    $routes->delete('user-delete/(:num)', 'admin\User::delete/$1');
    $routes->post('user-reset/(:num)', 'admin\User::resetpass/$1');
    $routes->post('user-aktif/(:num)', 'admin\User::setaktif/$1');

    // route akses group
    $routes->get('group', 'admin\Group::index');
    $routes->get('group/viewdata', 'admin\Group::viewdata');
    $routes->get('group-update/(:num)', 'admin\Group::edit/$1');
    $routes->post('group-update/(:num)', 'admin\Group::update/$1');
});

$routes->group('', ['filter' => 'role:Admin'], function ($routes) {
    //route akses setting
    $routes->get('setting', 'admin\Setting::index');
    $routes->post('setting/(:num)', 'admin\Setting::save/$1');
});

$routes->group('', ['filter' => 'permission:management-obat'], function ($routes) {
    // route akses obat
    $routes->get('obat', 'admin\Obat::index');
    $routes->get('obat/viewdata', 'admin\Obat::viewdata');
    $routes->get('obat/data', 'admin\Obat::data');
    $routes->post('obat-detail', 'admin\Obat::detail');
    $routes->get('obat-create', 'admin\Obat::create');
    $routes->post('obat-create', 'admin\Obat::save');
    $routes->get('obat-update/(:num)', 'admin\Obat::edit/$1');
    $routes->post('obat-update/(:num)', 'admin\Obat::update/$1');
    $routes->delete('obat-delete/(:num)', 'admin\Obat::delete/$1');

    // route akses satuan
    $routes->get('satuan', 'admin\satuan::index');
    $routes->get('satuan/viewdata', 'admin\satuan::viewdata');
    $routes->get('satuan-create', 'admin\Satuan::create');
    $routes->post('satuan-create', 'admin\Satuan::save');
    $routes->get('satuan-update/(:num)', 'admin\Satuan::edit/$1');
    $routes->post('satuan-update/(:num)', 'admin\Satuan::update/$1');
    $routes->delete('satuan-delete/(:num)', 'admin\Satuan::delete/$1');

    // route akses produsen
    $routes->get('produsen', 'admin\Produsen::index');
    $routes->get('produsen/viewdata', 'admin\Produsen::viewdata');
    $routes->post('produsen-detail', 'admin\Produsen::detail');
    $routes->get('produsen-create', 'admin\Produsen::create');
    $routes->post('produsen-create', 'admin\Produsen::save');
    $routes->get('produsen-update/(:num)', 'admin\Produsen::edit/$1');
    $routes->post('produsen-update/(:num)', 'admin\Produsen::update/$1');
    $routes->delete('produsen-delete/(:num)', 'admin\Produsen::delete/$1');
});

$routes->group('', ['filter' => 'permission:management-transaksi'], function ($routes) {
    //route akses transaksi penjualan
    $routes->get('transjual', 'admin\Transjual::index');
    $routes->get('get-produk-sale', 'admin\Transjual::getProduk');
    $routes->get('load-cart-sale', 'admin\Transjual::show_cart');
    $routes->post('add-cart-sale', 'admin\Transjual::add_cart');
    $routes->post('add-cart-sale/(:any)', 'admin\Transjual::add_cart/$1');
    $routes->post('update-cart-sale/(:any)', 'admin\Transjual::update_cart/$1');
    $routes->delete('delete-cart-sale/(:any)', 'admin\Transjual::delete_cart/$1');
    $routes->get('reset-cart-sale', 'admin\Transjual::reset');
    $routes->get('load-total-sale', 'admin\Transjual::getTotal');
    $routes->get('load-totbayar-sale', 'admin\Transjual::totbayar');
    $routes->post('load-totbayar-sale', 'admin\Transjual::getDiskon');
    $routes->post('load-kembalian-sale', 'admin\Transjual::getKembalian');
    $routes->post('pay-sale', 'admin\Transjual::pay');

    //route akses transaksi pembelian
    $routes->get('transbeli', 'admin\Transbeli::index');
    $routes->get('get-produk', 'admin\Transbeli::getProduk');
    $routes->get('load-cart-buy', 'admin\Transbeli::show_cart');
    $routes->post('add-cart-buy', 'admin\Transbeli::add_cart');
    $routes->post('add-cart-buy/(:any)', 'admin\Transbeli::add_cart/$1');
    $routes->delete('delete-cart-buy/(:any)', 'admin\Transbeli::delete_cart/$1');
    $routes->post('update-cart-buy/(:any)', 'admin\Transbeli::update_cart/$1');
    $routes->get('load-total-buy', 'admin\Transbeli::getTotal');
    $routes->get('load-totbayar-buy', 'admin\Transbeli::totbayar');
    $routes->post('load-totbayar-buy', 'admin\Transbeli::getDiskon');
    $routes->post('load-kembalian-buy', 'admin\Transbeli::getKembalian');
    $routes->post('pay-buy', 'admin\Transbeli::pay');
    $routes->get('reset-cart-buy', 'admin\Transbeli::reset');
});

$routes->group('', ['filter' => 'permission:management-laporan'], function ($routes) {
    //route akses laporan penjualan
    $routes->get('laporan-jual', 'admin\Transjual::laporan');
    $routes->post('laporan-jual-detail', 'admin\Transjual::lapdetail');
    $routes->get('print-laporan-jual-detail/(:any)', 'admin\Transjual::printdetail/$1');

    // route akses laporan pembelian
    $routes->get('laporan-beli', 'admin\Transbeli::laporan');
    $routes->post('laporan-beli-detail', 'admin\Transbeli::lapdetail');
    $routes->get('print-laporan-beli-detail/(:any)', 'admin\Transbeli::printdetail/$1');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
