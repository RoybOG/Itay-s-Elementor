<?php

const SIZE_UNITS = [
    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
	'range' => [
			'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'em' => [
						'min' => 0,
						'max' => 100,
						'step' => 0.5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				]
            ];


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

		$this->add_control(
			'teaser_type',
			[
				'label' => esc_html__( 'Teaser Type', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'excerpt',
				'options' => [
					'none' => esc_html__( 'None', 'textdomain' ),
					'excerpt'  => esc_html__( 'Post Excerpt', 'textdomain' ),
					'post_start' => esc_html__( 'Post Start', 'textdomain' ),
					
				],
				
			]
		);

        $this->add_control(
			'start_height',
			[
				'label' => esc_html__( 'Start Height', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
                'condition' => [
                    'teaser_type'=>'post_start'
                ],
            'default' => [
					'unit' => 'px',
					'size' => 150,
			],
		    'selectors' => [
    			'{{WRAPPER}} ul.itay_post_list .post_start' => 'max-height: {{SIZE}}{{UNIT}}',
		    ]
			] + SIZE_UNITS
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'layout_section',
		    [
				'label' => esc_html__( 'Layout', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gap',
			[
				'label' => esc_html__( 'Items Gap', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				
                'selectors' => [
					'{{WRAPPER}} ul.itay_post_list' => 'gap: {{SIZE}}{{UNIT}};',
				],
			] + SIZE_UNITS
		);
		$this->end_controls_section();

        