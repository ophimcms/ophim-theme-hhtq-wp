<?php
get_header();
?>
<div class="container">
    <div class="row">
        <div class="myui-panel active myui-panel-bg clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <div class="myui-panel__head clearfix">
                        <h3 class="title"><?php echo single_tag_title(); ?></h3>
                    </div>
                    <ul class="myui-vodlist clearfix">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) { the_post(); ?>
                    <li class="col-lg-6 col-md-6 col-sm-4 col-xs-3">
                            <?php include THEMETEMPLADE . '/movie_card.php' ?>
                    </li>
                        <?php } wp_reset_postdata(); } else{ echo '  <p>Không tìm thấy phim trong mục này</p>';} ?>
                    </ul>
                    <?php ophim_pagination(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
