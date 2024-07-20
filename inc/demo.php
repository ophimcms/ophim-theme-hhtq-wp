<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<div class="myui-foot clearfix">
                    <div class="container min">
                    <div class="row">
                    <div class="col-pd text-center">
                    <p class="margin-0">Liên hệ quảng cáo: admin@gmail.com</p>
                    <p class="margin-0">Copyright © 2014-2023 Phim mới | Phim vietsub | Xem phim | Phim Lẻ |
                    Phim Online | Phim HD | Download phim</p>
                    <p class="margin-0">Disclaimer: This site does not store any files on its server. All contents
                    are provided by non-affiliated third parties.</p>
                    </div>
                    </div>
                    </div>
                    </div>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);