<style>
    #result{
        margin-top: 20px;
        background-color: #333333;
        list-style-type: none;
        width: 600px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
    }
    .column {
        float: left;
        padding: 5px;
    }

    .left {
        text-align: center;
        width: 20%;
    }

    .right {
        width: 80%;
    }

    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }
    .rowsearch:hover {
        background-color: #282626;
    }
</style>
<header>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a class="logo" href="/" title="<?php bloginfo('name'); ?>">
                        <?php op_the_logo('width:20px') ?>
                    </a>
                </div>
                <div class="navbar-menu-toggle" id="navbar-toggle">
                    <i class="icon-menu"></i>
                </div>
            </div>
            <div class="navbar-left" id="navbar-left">
                <div class="navbar-search">
                    <form method="GET" action="/" id="form-search">
                        <div class="search-box">
                            <input type="text" name="s" placeholder="Tìm kiếm tên phim..." autocomplete="off" id="search" onkeyup="fetch()">
                            <i class="icon icon-search"></i>
                        </div>
                    </form>
                    <div class="" id="result"></div>
                </div>
                <div class="navbar-menu" style="">
                    <?php
                    $menu_items = wp_get_menu_array('primary-menu');
                    foreach ($menu_items as $key => $item) : ?>
                        <?php if (empty($item['children'])) { ?>
                            <li class="navbar-menu-item">
                                <a href="<?= $item['url'] ?>">
                                    <i class="icon icon-chart"></i> <?= $item['title'] ?> </a>
                            </li>
                        <?php } else { ?>
                            <li class="navbar-menu-item navbar-menu-has-sub">
                                <a href="javascript:void(0);">
                                    <i class="icon icon-book"></i> <?= $item['title'] ?> </a>
                                <ul class="navbar-submenu">
                            <?php foreach ($item['children'] as $k => $child): ?>
                                    <li class="navbar-submenu-item">
                                        <a class="navbar-menu-ditem" href="<?= $child['url'] ?>"><?= $child['title'] ?></a>
                                    </li>
                            <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php endforeach; ?>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
                <div class="navbar-close">
                    <i class="icon-close"></i>
                </div>
                <div class="navbar-brand">
                    <a class="logo" href="/" title="<?php bloginfo('name'); ?>">
                        <?php op_the_logo('width:20px') ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
