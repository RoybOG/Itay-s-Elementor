<?php
namespace itays_elementor_core\widgets;

class PostsList extends \Elementor\Widget_Base {

// define data and dependencies of widget	
	public function get_name(): string {
		return 'posts_list';
	}

	public function get_title(): string {
		return esc_html__( "posts list", 'itays-elementor' );
	}

	public function get_icon(): string {
		return 'eicon-post-list';
	}

	public function get_categories(): array {
		return [ 'itays_widgets' ];
	}

	public function get_keywords(): array {
		return [ 'posts', 'post' ];
	}

	public function get_style_depends(): array {
		return [ 'itayswidget-posts_list-style','itayswidget-style' ];
	}

//define controls of widget
    protected function register_controls(): void {

        require __DIR__ . '/controls.php';

		

	}

//define redering of widget
	protected function render(): void {;
        $settings = $this->get_settings_for_display();
        
        $args = array(
	    'numberposts'	=> 20,
	    
        );
        
        if ( $settings['show_categories'] ) {
              
         $args['category__in'] = is_array($settings['show_categories'])? $settings['show_categories']:[$settings['show_categories']];
        }

        $my_posts = get_posts( $args );

        if( ! empty( $my_posts ) ){
            echo '<ul class="itay_post_list itay_widget '.$settings['alignment'].'">';
	        foreach ( $my_posts as $p ){
		        echo '<li><article><a class="post_title" href="' . esc_url(get_permalink( $p->ID )) . '">' 
		        . esc_html__($p->post_title, 'itays-elementor' ) . '</a>';
				
				switch($settings['teaser_type']){
					case 'excerpt':
						echo '<p>'. esc_html__($p->post_excerpt, 'itays-elementor' ) . '</p>';
						break;
					case 'post_start':
						echo '<div class="post_start">';
						echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $p->ID );
						echo '</div>';
						break;
				}
				
				echo '<a class="read_more" href="' . esc_url(get_permalink( $p->ID )) . '">'. esc_html__("read move", 'itays-elementor' ).'</a>';
				echo'</article></li>';
	        }
	        echo '</ol>';
            
	
        }
        
		
	}

	
}