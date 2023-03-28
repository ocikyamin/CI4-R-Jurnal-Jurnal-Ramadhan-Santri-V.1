<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function() {
    return redirect()->to(base_url('/'));
});
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
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::LoginCek');
$routes->get('/register', 'Home::Register');
$routes->get('/register/student', 'Home::RegisterStudent');
$routes->post('/register/student', 'Home::CekRegisterStudent');

// Reg Walas 
$routes->get('/register/walas', 'Home::RegisterWalas');
$routes->post('/register/walas', 'Home::CekRegisterWalas');


$routes->get('login/super', 'Super::Login');
$routes->post('login/super', 'Super::LoginCek');

$routes->get('classlevel', 'Home::LevelClassId');
$routes->get('getrombel', 'Home::RombelId');

// Student 
$routes->group('student', static function ($routes) {
    $routes->get('/', 'Student::index');
    $routes->get('buat-jurnal', 'Student::FormJurnal');
    $routes->get('target', 'Student::TargetRamadhan');
    $routes->post('save-target', 'Student::SaveTargetRamadhan');
    $routes->get('jurnalku/(:num)', 'Student::JurnalkuId/$1');
    $routes->post('save-jurnal', 'Student::SaveJurnal');
    $routes->get('cetak/(:num)', 'Student::Cetak/$1');
    $routes->post('hapus', 'Student::HapusRow');
    $routes->get('logout', 'Student::Logout');
    
   
});
// Walas 
$routes->group('walas', static function ($routes) {
    $routes->get('/', 'Walas::index');
    $routes->get('student', 'Walas::ListStudent');
    $routes->get('student/jurnal/(:num)', 'Walas::JurnalSiswa/$1');
    $routes->get('student/confirm', 'Walas::FormConfim');
    $routes->post('student/store-confirm', 'Walas::StoreConfim');
    $routes->post('student/move-kelas', 'Walas::MoveKelas');
    $routes->get('jurnal/kelas/(:any)/date/(:any)', 'Walas::JurnalByDate/$1/$2');
    $routes->get('logout', 'Walas::Logout');
});

$routes->group('super', static function ($routes) {
    $routes->get('/', 'Super::index');
    $routes->get('edu/(:num)', 'Super::EduId/$1');
    $routes->get('student/room/', 'Super::ShowStudentRoom');
    $routes->get('student/jurnal/(:num)', 'Super::JurnalSiswa/$1');

    $routes->get('jurnal/(:any)', 'Super::Jurnal/$1');
    $routes->get('walas', 'Super::ListWalas');
    $routes->post('walas/aktivasi', 'Super::AktivasiWalas');
    $routes->get('santri/(:any)', 'Super::ListSantri/$1');


    $routes->get('student/confirm', 'Super::FormConfim');
    $routes->post('student/store-confirm', 'Super::StoreConfim');
    $routes->post('student/move-kelas', 'Super::MoveKelas');

    // Reset Walas 
    $routes->post('walas/reset', 'Super::ResetPasswordWalas');

    $routes->post('student/reset', 'Super::ResetPasswordStudent');
// Hapus 
 $routes->get('student/hapus/(:any)', 'Super::HapusStudent/$1');

    $routes->get('logout', 'Super::Logout');
    
   
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
