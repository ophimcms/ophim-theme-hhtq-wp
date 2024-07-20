<?php
get_header();
?>
<?php if ( is_active_sidebar('widget-slider-poster') ) {
    dynamic_sidebar( 'widget-slider-poster' );
} else {
    _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
<div class="container">
    <div class="row">
        <?php if ( is_active_sidebar('widget-area') ) {
            dynamic_sidebar( 'widget-area' );
        } else {
            _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>
