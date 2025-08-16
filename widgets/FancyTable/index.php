<?php
namespace itays_elementor_core\widgets;

class FancyTable extends \Elementor\Widget_Base {

// define data and dependencies of widget	
	public function get_name(): string {
		return 'fancy_table';
	}

	public function get_title(): string {
		return esc_html__( "Fancy Table", 'itays-elementor' );
	}

	public function get_icon(): string {
		return 'eicon-table';
	}

	public function get_categories(): array {
		return [ 'itays_widgets' ];
	}

	public function get_keywords(): array {
		return [ 'table', 'rows' ];
	}

	public function get_style_depends(): array {
		return [ 'itayswidget-table-style', 'itayswidget-style'];
	}

	public function get_script_depends() {
		return ['widget-script-fancyWidgetsScript'];
	}

//define controls of widget
    protected function register_controls(): void {

        require __DIR__ . '/controls.php';
		require __DIR__ . '/fancyControls.php';

	}

//define redering of widget
	protected function renderCell($colNum, $rowNum ) {
		$cellId = sprintf("%u,%u",$colNum, $rowNum );
		$this->add_inline_editing_attributes( $cellId, 'advanced' );
		echo '<td ' . $this->get_render_attribute_string( $cellId ) . '>' . $this->get_settings( $cellId ) . '</td>';
		
	}
	protected function widget_render(): void {
        
	
		$settings = $this->get_settings_for_display();
	

		
		echo '<table class="itay_table itay_widget">'; //'.$settings['alignment'].'
			echo '<thead><tr>';
			foreach (  $settings['columns'] as $item ) {
				echo '<th>'.esc_html__($item['column_title'], 'itays-elementor').'</th>';

			}
			echo '</thead></tr>';

			echo '<tbody>';
			for ($i = 0; $i <= 4; $i++) {
				echo '<tr>';
				for ($j = 0; $j < count($settings['columns']); $j++) {
					$this-> renderCell($i, $j);
				}
				echo '</tr>';
			}
			echo '</tbody>';
	        echo '</table>';
            
	
        }

		protected function render(): void {
			$settings = $this->get_settings_for_display();
			?>
				<div class="itay-fancy-container">
				<div class="itay-fancy-background">
					<div class="itay-fancySVG">
						<?php echo $settings['userSVG']; ?>

					</div>
				</div>

				<div class="itay-fancy-content">	
					<?php $this->widget_render(); ?>
				</div>
			</div>
			
			<?php


		}

        
		
	}

