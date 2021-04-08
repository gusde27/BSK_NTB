<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Pages
$routes->get('/', 'PagesController::beranda');
$routes->get('/berita-kegiatan', 'PagesController::berita_kegiatan');
$routes->get('/detail-kampus/(:any)', 'PagesController::detail_kampus/$1');
$routes->get('/detail-berita/(:any)', 'PagesController::detail_berita/$1'); //berita satuan
$routes->get('/kampus-kerjasama', 'PagesController::kampus_kerjasama');
$routes->get('/tata-cara', 'PagesController::tata_cara');

$routes->post('/kirim-pesan', 'PagesController::KirimPesan');
$routes->get('kampus/(:any)', 'PagesController::kampus/$1');
$routes->get('recent_news/(:any)', 'PagesController::recent_news/$1');

//login 
$routes->post('/login', 'PagesController::loginPOST');
$routes->get('/login', 'PagesController::login'); ///GET
$routes->get('/logout', 'PagesController::logout');

//Admin
$routes->get('/dashboard-admin', 'AdminController::index', ['filter' => 'admin']);
$routes->get('/pts-admin', 'AdminController::pts', ['filter' => 'admin']);
$routes->get('/massage-admin', 'AdminController::massage', ['filter' => 'admin']);
$routes->get('/mahasiswa-admin/(:any)', 'AdminController::DataMHS/$1', ['filter' => 'admin']);
$routes->get('/recent-news-admin/(:any)', 'AdminController::DataRECENT/$1', ['filter' => 'admin']);
$routes->get('/detail-mhs-admin/(:any)/(:any)', 'AdminController::MhsDetail/$1/$2', ['filter' => 'admin']);


$routes->post('/delete-pesanAdmin', 'AdminController::massageDelete', ['filter' => 'admin']); //massage
$routes->post('/balas-pesanAdmin', 'AdminController::massageBalas', ['filter' => 'admin']); //massage

$routes->post('/update_admin', 'AdminController::AdminUpdate', ['filter' => 'admin']);
$routes->post('/update_fotoAdmin', 'AdminController::AdminUpdateFoto', ['filter' => 'admin']);
$routes->post('/tambah_pts', 'AdminController::TambahPTS', ['filter' => 'admin']);
$routes->post('/update_ptsAdmin', 'AdminController::UpdatePTS', ['filter' => 'admin']);
$routes->post('/delete_ptsAdmin', 'AdminController::DeletePTS', ['filter' => 'admin']);
$routes->post('/delete-berita-admin', 'AdminController::DeleteBERITA', ['filter' => 'admin']);

$routes->post('/download_khs_admin', 'AdminController::KhsDownload', ['filter' => 'admin']); //download khs
$routes->post('/download_krs_admin', 'AdminController::KrsDownload', ['filter' => 'admin']); //download krs
$routes->post('/download_prestasi_admin', 'AdminController::PrestasiDownload', ['filter' => 'admin']); //download khs


//berita
//$routes->get('/recent_news/(:any)', 'Pages::berita/$1'); //berita
$routes->get('/berita', 'PtsController::berita', ['filter' => 'pts']); //berita
$routes->post('/tambah_berita', 'PtsController::beritaTambah', ['filter' => 'pts']); //berita
$routes->post('/update_berita', 'PtsController::beritaUpdate', ['filter' => 'pts']); //berita
$routes->post('/delete_berita', 'PtsController::beritaDelete', ['filter' => 'pts']); //berita

//PTS
$routes->get('/dashboard', 'PtsController::index', ['filter' => 'pts']);

$routes->get('/setting', 'PtsController::setting', ['filter' => 'pts']);
$routes->post('/update_pass_pts', 'PtsController::update_pass', ['filter' => 'pts']);

$routes->post('/update_pts', 'PtsController::PtsUpdate', ['filter' => 'pts']);
$routes->post('/update_fotoPts', 'PtsController::PtsUpdateFoto', ['filter' => 'pts']);
//Mhs
$routes->get('/mahasiswa', 'MhsController::index', ['filter' => 'pts']);
$routes->post('/update_mhs', 'MhsController::MhsUpdate', ['filter' => 'pts']);
$routes->post('/update_fotoMhs', 'MhsController::MhsUpdateFoto', ['filter' => 'pts']);
$routes->get('/detail/(:segment)', 'MhsController::detail/$1', ['filter' => 'pts']);
$routes->post('/delete_mahasiswa', 'MhsController::Delete_Mahasiswa', ['filter' => 'pts']);
$routes->post('/mahasiswa', 'MhsController::save', ['filter' => 'pts']);

//KHS
$routes->post('/download_khs', 'MhsController::KhsDownload', ['filter' => 'pts']);
$routes->post('/upload_khs', 'MhsController::KhsUpload', ['filter' => 'pts']);
$routes->post('/update_khs', 'MhsController::KhsUpdate', ['filter' => 'pts']);
$routes->post('/delete_khs', 'MhsController::KhsDelete', ['filter' => 'pts']);

//KRS
$routes->post('/download_krs', 'MhsController::KrsDownload', ['filter' => 'pts']);
$routes->post('/upload_krs', 'MhsController::KrsUpload', ['filter' => 'pts']);
$routes->post('/update_krs', 'MhsController::KrsUpdate', ['filter' => 'pts']);
$routes->post('/delete_krs', 'MhsController::KrsDelete', ['filter' => 'pts']);

//Prestasi
$routes->post('/download_prestasi', 'MhsController::PrestasiDownload', ['filter' => 'pts']);
$routes->post('/upload_prestasi', 'MhsController::PrestasiUpload', ['filter' => 'pts']);
$routes->post('/update_prestasi', 'MhsController::PrestasiUpdate', ['filter' => 'pts']);
$routes->post('/delete_prestasi', 'MhsController::PrestasiDelete', ['filter' => 'pts']);
//$routes->get('mahasiswa/(:segment)', 'Mhs::detail/$1');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}