<?php
  function loadSiteConfig()
    {
        define('HTTP_PATH', env('APP_URL', 'www.hoz.sg'));
        define("BASE_PATH", $_SERVER['DOCUMENT_ROOT']);

        define('PRODUCT_UPLOAD_PATH', BASE_PATH . '/storage/products/');
        define('PRODUCT_DISPLAY_PATH', HTTP_PATH . '/storage/products/');

        define('ORDER_STATUS', ['waiting_payment'=>0, 'payment_approved'=>1, 'delivered'=>2, 'canceled'=>3, 'deleted'=>5]);

        define('SHOPS_TYPES', ['doors_gates', 'digital_locks', 'accessories']);

    }
?>
