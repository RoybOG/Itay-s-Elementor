<?php
use const itays_elementor_core\SIZE_UNITS;
use function itays_elementor_core\getRandomFileFromFolder;




$this->start_controls_section(
			'orbitSettings',
		    [
				'label' => esc_html__( 'Orbit Settings', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
			'rotationAnimation',
			[
				'label' => esc_html__( 'Rotation Animation', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					
					'turnRight' => [
						'title' => esc_html__( 'Turn Right', 'textdomain' ),
						'icon' => 'eicon-redo',
					],
					'none' => [
						'title' => esc_html__( 'None', 'textdomain' ),
						'icon' => 'eicon-circle-o',
					],
					
					'turnLeft' => [
						'title' => esc_html__( 'Turn Left', 'textdomain' ),
						'icon' => 'eicon-undo',
					],
				],
				'default' => 'none',
				'toggle' => true,
				
			]
		);

$this->end_controls_section();

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
				'default' => [
					['elementName'=>'Star'],
				],
				'title_field' => '{{{ elementName }}}',
			]
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

		// $this->add_control(
        //     'orbitingAngleOffset',
        //      [
				    
		// 			'label' => esc_html__( 'Angle Offset', 'textdomain' ),
		// 		    	'type' => \Elementor\Controls_Manager::SLIDER,
        //     'size_units' => [ 'degrees']//, 'radians' ]
		// 		,'range' => [
		// 			'degrees' => [
		// 				'min' => 0,
		// 				'max' => 360,
		// 				'step' => 1,
		// 			],
		// 			// 'radians' => [
		// 			// 	'min' => 0,
		// 			// 	'max' => 2*pi(),
		// 			// ],
		// 		],   
        //     'default' => [
		// 			'unit' => 'degrees',
		// 			'size' => 0,
		// 	],

		// 	]
		// );
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

