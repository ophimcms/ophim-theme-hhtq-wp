<div class="myui-panel radius-0 clearfix" id="index-hot" style="padding: 15px 0;">
    <div class="myui-panel-box clearfix">
        <div class="myui-panel_bd col-pd">
            <div class="container">
                <div class="row">
                    <div class="flickity active clearfix" data-align="left" data-next="1" data-play="1500">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-3">
                            <?php include THEMETEMPLADE.'/movie_card.php'?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
