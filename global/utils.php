<?php

namespace itays_elementor_core;

function getRandomFileFromFolder($folder_path){
    $imgs = array_diff(scandir( $folder_path ), array('..', '.'));
     $picked = $imgs[array_rand($imgs)];

    // return a filesystem path
    // return rtrim( $folder_path, '/\\' ) . DIRECTORY_SEPARATOR . $picked;

    $picked = $imgs[ array_rand( $imgs ) ];

    // Build a plugin-relative URL (plugin root file is itays_elementor.php)
    $plugin_root_file = __DIR__ . '/../itays_elementor.php';
    $base_url = function_exists( 'plugin_dir_url' ) ? plugin_dir_url( $plugin_root_file ) : '';

    // widgets/orbit/assets/ + basename ensures we produce a valid URL, not a filesystem path
    $url = $base_url . 'widgets/orbit/assets/defualtStars/' . basename( $picked );

    return esc_url_raw( $url );

    // return $url;
}