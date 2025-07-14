<?php
namespace itays_elementor_core\widgets;

class PostsList extends \Elementor\Widget_Base {

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


    protected function register_controls(): void {

        $categories = get_categories( array(
        'hide_empty' => true, 
        'orderby'    => 'name',
        'order'      => 'ASC',
        ) );

        $escaped_category_options = [];

        // 2. Check if categories were found and no error occurred
        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {

        // 3. Use wp_list_pluck to create an associative array: ID => Raw Name
        // The third argument ('term_id') makes the term_id the array key.
        // The second argument ('name') makes the category name the array value.
            $raw_options = wp_list_pluck( $categories, 'name', 'term_id' );

            // 4. Use array_map to apply esc_html() to each category name (value)
            // The keys will be preserved.
            $escaped_category_options = array_map( 'esc_html', $raw_options );

        }
		
        $this->start_controls_section(
			'content_section',
		    [
				'label' => esc_html__( 'Content', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        

        $this->add_control(
			'show_categories',
			[
				'label' => esc_html__( 'Show Categories', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $escaped_category_options,
				'default' => [  ],
			]
		);
		// $this->add_control();

		// $this->add_control();

		// $this->add_control();

		$this->end_controls_section();

		// $this->start_controls_section(
		// 	'info_section',
		// 	[
		// 		'label' => esc_html__( 'Info', 'textdomain' ),
		// 		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		// 	]
		// );

		// $this->add_control();

		// $this->add_control();

		// $this->add_control();

		// $this->end_controls_section();

	}

	protected function render(): void {
        $output ='';
        $settings = $this->get_settings_for_display();
        
        $args = array(
	    'numberposts'	=> 20,
	    // 'category'		=> 4
        );
        
        if ( $settings['show_categories'] ) {
                $output .= '<h3>' . implode(', ', array_keys($settings['show_categories'])) . '</h3>';
         $args['category__in'] = is_array($settings['show_categories'])? $settings['show_categories']:[$settings['show_categories']];
        }

        $my_posts = get_posts( $args );

        if( ! empty( $my_posts ) ){
            $output .=  '<ol>';
	        foreach ( $my_posts as $p ){
		        $output .= '<li><a href="' . esc_url(get_permalink( $p->ID )) . '">' 
		        . esc_html__($p->post_title, 'itays-elementor' ) . '</a></li>';
	        }
	        $output .= '</ol>';
            echo $output;
        }
        
		
	}

	protected function content_template(): void {
		?>
		<p> Hello World </p>
		<?php
	}
}