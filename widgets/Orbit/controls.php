<?php
use const itays_elementor_core\SIZE_UNITS;
use function itays_elementor_core\getRandomFileFromFolder;


$this->start_controls_section(
			'orbitingElements',
		    [
				'label' => esc_html__( 'Orbiting Elements', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'orbitingElementsList',
			[
				'label' => esc_html__( 'Orbiting Elements', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'elementName',
						'label' => esc_html__( 'Name', 'itays-elementor' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Star' , 'itays-elementor' ),
						'label_block' => true,
                    ],
                    [
                    'name'=> 'elementImage',
				    'label' => esc_html__( 'Image', 'textdomain' ),
				    'type' => \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					    'url' => "",
				                 ],
                    
                    ]
                                ],
				'title_field' => '{{{ elementName }}}',
			]
		);

        $this->add_control(
			'radius',
			[
				'label' => esc_html__( 'radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
               
            'default' => [
					'unit' => 'px',
					'size' => 300,
			],
		    'selectors' => [
    			'{{WRAPPER}} .circular-container' => 
                '--orbitRadius: {{SIZE}}{{UNIT}}; width: calc(var(--orbitRadius) * 2 + {{orbitingElementsSize.SIZE}}{{orbitingElementsSize.UNIT}});',
		    ]
			] + SIZE_UNITS
		);

        $this->add_control(
			'orbitingElementsSize',
			[
				'label' => esc_html__( 'size', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
               
            'default' => [
					'unit' => 'px',
					'size' => 100,
			],
		    'selectors' => [
    			'{{WRAPPER}} .circular-container img:not(.center)' => 
                'height: {{SIZE}}{{UNIT}};',
		    ]
			] + SIZE_UNITS
		);
        
		$this->add_control(
            'OrbitingImageForAll',
             [
				    
					'label' => esc_html__( 'One image for all', 'textdomain' ),
				    'type' => \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					    'url' => "",
				                 ],
                    ]
                                );

$this->end_controls_section();


$this->start_controls_section(
			'orbitingCenter',
		    [
				'label' => esc_html__( 'Center Element', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'centerElementImage',
             [
				    
					'label' => esc_html__( 'Image', 'textdomain' ),
				    'type' => \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					    'url' => "",
				                 ],
                    ]
                                );
        $this->add_control(
			'centerElementSize',
			[
				'label' => esc_html__( 'size', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
               
            'default' => [
					'unit' => 'px',
					'size' => 100,
			],
		    'selectors' => [
    			'{{WRAPPER}} .circular-container img.center' => 
                'height: {{SIZE}}{{UNIT}};',
		    ]
			] + SIZE_UNITS
		);
    

    
// $imgs = array_diff(scandir( __DIR__ . '/assets' ), array('..', '.'));
// error_log((getRandomFileFromFolder(__DIR__ . '/assets')) );

$this->end_controls_section();

