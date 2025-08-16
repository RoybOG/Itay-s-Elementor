<?php


$this->start_controls_section(
			'header_section',
		    [
				'label' => esc_html__( 'Header', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

$this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'column_title',
						'label' => esc_html__( 'Title', 'itays-elementor' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'itays-elementor' ),
						'label_block' => true,
					]
				],
				'default' => [
					[
						'column_title' => esc_html__( 'Title #1', 'itays-elementor' ),
					]
				],
				'title_field' => '{{{ column_title }}}',
			]
		);

$this->end_controls_section();

$this->start_controls_section(
			'body_section',
		    [
				'label' => esc_html__( 'Body', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

$this->add_control(
			'rows',
			[
				'label' => esc_html__( 'Rows', 'itays-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'row_content',
						'label' => esc_html__( 'content', 'itays-elementor' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'itays-elementor' ),
						'label_block' => true,
					]
				],

				'default' => [
					[
						'column_title' => esc_html__( 'Title #1', 'itays-elementor' ),
					]
				],
				'title_field' => '{{{ column_title }}}',
			]
		);

$this->end_controls_section();


$this->start_controls_section(
			'table_header',
		    [
				'label' => esc_html__( 'Header', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
			]
		);


$this->end_controls_section();

$this->start_controls_section(
			'table_body',
		    [
				'label' => esc_html__( 'Body', 'itays-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
			]
		);


$this->end_controls_section();


