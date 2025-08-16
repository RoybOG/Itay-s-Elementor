<?php
$this->start_controls_section(
			'fancyBackground_section',
		    [
				'label' => esc_html__( 'Fancy Background', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
			]
		);
        $this->add_control(
	    'userSVG-popover-toggle',
	        [
		    'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
		'label' => esc_html__( 'User SVG Code', 'textdomain' ),
		'label_off' => esc_html__( 'Default', 'textdomain' ),
		'label_on' => esc_html__( 'Custom', 'textdomain' ),
		'return_value' => 'yes',]);

        $this->start_popover();
		$this->add_control(
			'userSVG',
			[
				'label' => esc_html__( 'Paste here code for and SVG background', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 10,
			]
		);
        $this->end_popover();

        $this->add_control(
			'userSVGWidth',
			[
				'label' => esc_html__( 'SVG Width', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%' ],
				'range' => [
					
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
                'selectors' => [
					'{{WRAPPER}} div.itay-fancySVG' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'userSVGHeight',
			[
				'label' => esc_html__( 'SVG Height', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%' ],
				'range' => [
					
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
                'selectors' => [
					'{{WRAPPER}} div.itay-fancySVG' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

$this->add_control(
			'userSVGHeightScale',
			[
				'label' => esc_html__( 'scale SVG height', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .itay-fancy-content' => 'padding-block: calc({{SIZE}}{{UNIT}} + '.strval(ITAY_FANCY_SVG_PADDING). '{{UNIT}});',
				],
			]
		);

$this->add_control(
			'userSVGOffsetX',
			[
				'label' => esc_html__( ' SVG X offset', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
                'selectors' => [
					'{{WRAPPER}} .itay-fancySVG' => 'transform: translate({{SIZE}}{{UNIT}}, {{userSVGOffsetY.SIZE}}{{userSVGOffsetY.UNIT}});',
                    // '{{WRAPPER}} .itay-fancy-content' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				
			]
		);

        // $this->add_control(
		// 	'userSVGOffsetSquishX',
		// 	[
		// 		'label' => esc_html__( 'Squish with offset or extend', 'itays-elementor' ),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'label_on' => esc_html__( 'Extend', 'itays-elementor' ),
		// 		'label_off' => esc_html__( 'Squish', 'itays-elementor' ),
		// 		'return_value' => 'yes',
		// 		'default' => 'off',
		// 	]
		// );


$this->add_control(
			'userSVGOffsetY',
			[
				'label' => esc_html__( ' SVG Y offset', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .itay-fancySVG' => 'transform: translate({{userSVGOffsetX.SIZE}}{{userSVGOffsetX.UNIT}}, {{SIZE}}{{UNIT}});',
                    // '{{WRAPPER}} .itay-fancy-content' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'userContentOffsetX',
			[
				'label' => esc_html__( ' Content X offset', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
                'selectors' => [
					'{{WRAPPER}} .itay-fancy-content' => 'transform: translate({{SIZE}}{{UNIT}}, {{userContentOffsetY.SIZE}}{{userContentOffsetY.UNIT}});',
                    // '{{WRAPPER}} .itay-fancy-content' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				
			]
		);

        // $this->add_control(
		// 	'userSVGOffsetSquishX',
		// 	[
		// 		'label' => esc_html__( 'Squish with offset or extend', 'itays-elementor' ),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'label_on' => esc_html__( 'Extend', 'itays-elementor' ),
		// 		'label_off' => esc_html__( 'Squish', 'itays-elementor' ),
		// 		'return_value' => 'yes',
		// 		'default' => 'off',
		// 	]
		// );


$this->add_control(
			'userContentOffsetY',
			[
				'label' => esc_html__( ' Content Y offset', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .itay-fancy-content' => 'transform: translate({{userContentOffsetX.SIZE}}{{userContentOffsetX.UNIT}}, {{SIZE}}{{UNIT}});',
                    // '{{WRAPPER}} .itay-fancy-content' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

        // $this->add_control(
		// 	'userSVGOffsetSquishY',
		// 	[
		// 		'label' => esc_html__( 'Squish with offset or extend', 'itays-elementor' ),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'label_on' => esc_html__( 'Extend', 'itays-elementor' ),
		// 		'label_off' => esc_html__( 'Squish', 'itays-elementor' ),
		// 		'return_value' => 'yes',
		// 		'default' => 'off',
		// 	]
		// );


$this->end_controls_section();