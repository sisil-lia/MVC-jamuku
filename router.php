<?php

/**
 * alias untuk method get 
 */
function get($route, $handler) {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		route($route, $handler);
	}
}

/**
 * alias untuk method post
 */
function post($route, $handler) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		route($route, $handler);
	}
}

/**
 * alias untuk method apapun
 */
function any($route, $handler) {
	route($route, $handler);
}

/**
 * fungsi utama router 
 */
function route($route, $handler) {
	$callback = $handler; // simpan $handler sebagai $callback
	if (!is_callable($callback)) { // jika $callback tdk dapat dieksekusi
		if (!strpos($handler, '.php')) { // jika $callback tidak punya ekstensi `.php`
      /**
      * maka tambah .php ke belakang $handler sehingga 
      * sekarang $handler berisi nama file
      */
			$handler .= '.php'; 
		}
	}
	if ($route == "/404") { // jika $route berisi string '/404'
		include_once __DIR__ . "/$handler"; // langsung jalankan $handler
		exit(); // lalu berhenti
	}
  /**
   * Berikutnya kita ubah URI menjadi bagian-bagian
   * 1. lakukan sanitasi agar variable REQUEST_URI aman diproses
   * 2. hapus trailling slash (garis miring di akhir URI)
   * 3. hapus bagian query string, karena beda proses
   */
	$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
	$request_url = rtrim($request_url, '/');
	$request_url = strtok($request_url, '?');

  /** 
   * Berikutnya kita pecah route dan request_url dengan karakter
   * garis miring untuk mencocokkan antara route dengan handler
   */
	$route_parts = explode('/', $route);
	$request_url_parts = explode('/', $request_url);
	array_shift($route_parts);
	array_shift($request_url_parts);

  /**
   * Jika setelah dipecah didapati bahwa item pertama $route_parts kosong
   * maka langsung jalankan callback atau file yang menjadi handler,
   * Setelah itu selesai. Demikian juga jika route dan request berbeda,
   * langsung keluar saja, karena kemungkinan ada kesalahan.
   */
	if ($route_parts[0] == '' && count($request_url_parts) == 0) {
    // jika handler dapat dipanggil, panggil tanpa argumen
		if (is_callable($callback)) {
			call_user_func_array($callback, []);
			exit();
		}
    // jika handler tidak dapat dipanggil, maka include sebagai file
		include_once __DIR__ . "/$handler";
		exit();
	}
	if (count($route_parts) != count($request_url_parts)) {
		return;
	}

  /**
   * Jika item pertama $route_parts tidak kosong, maka ada argumen yang 
   * perlu di-parsing. Untuk setiap parameter pada $route yang berawalan
   * simbol $, buat variable tersebut. Lalu panggil $callback dengan
   * parameter pada vaiable $parameters.
   */
	$parameters = [];
	for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
		$route_part = $route_parts[$__i__];
		if (preg_match("/^[$]/", $route_part)) {
			$route_part = ltrim($route_part, '$');
			array_push($parameters, $request_url_parts[$__i__]);
			$$route_part = $request_url_parts[$__i__]; // buat variable dari parameter di $route
		} else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
			return;
		}
	}
	// panggil callback dengan parameter
	if (is_callable($callback)) {
		call_user_func_array($callback, $parameters);
		exit();
	}
	// atau include file jika bukan callable
	include_once __DIR__ . "/$handler";
	exit();
}

function out($text) {
	echo htmlspecialchars($text);
}

