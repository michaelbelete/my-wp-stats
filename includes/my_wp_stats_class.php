<?php
/**
 * Adds Foo_Widget widget.
 */
class My_WP_STATS_WIDGET extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'my_wp_stat_widget', // Base ID
			esc_html__( 'My WP stats', 'my_wp_stats_domain' ), // Name
			array( 'description' => esc_html__( 'Widget that display basic analytics for your website', 'my_wp_stats_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		
        require("template/widget.php");

		echo $args['after_widget'];
	}


} // class Foo_Widget

?>