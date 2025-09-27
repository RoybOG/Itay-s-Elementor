<?php
namespace itays_elementor_core\widgets;

use function itays_elementor_core\getRandomFileFromFolder;



class Orbit extends \Elementor\Widget_Base {

// define data and dependencies of widget	
	public function get_name(): string {
		return 'itay_orbit';
	}

	public function get_title(): string {
		return esc_html__( "orbit", 'itays-elementor' );
	}

	public function get_icon(): string {
		return 'eicon-dot-circle-o';
	}

	public function get_categories(): array {
		return [ 'itays_widgets' ];
	}

	public function get_keywords(): array {
		return [ 'orbit' ];
	}

	public function get_style_depends(): array {
		return [ 'itayswidget-Orbit-style','itayswidget-style' ];
	}

//define controls of widget
    protected function register_controls(): void {

        require __DIR__ . '/controls.php';

		

	}

//define redering of widget
	protected function render(): void {;
        $settings = $this->get_settings_for_display();
         
        if ( empty( $settings['orbitingElementsList'] ) ) {
			return;
		}

        //  error_log(print_r($settings['centerElementImage']),true);
        ?>
		<div class="circular-container">
      
        
           
            <img class="center" src= <?php echo $settings['centerElementImage']['url']? $settings['centerElementImage']['url']:"http://localhost:10004/wp-content/plugins/Itay-s-Elementor/global/../widgets/orbit/assets/sun.png";?>  alt="center" class="center-image" >
            
            <?php 
            $n = count($settings['orbitingElementsList']);
            
            
            
            $orbitingEl = function($i,$x,$y)use($settings) {
                
                $src = getRandomFileFromFolder(__DIR__ . '/assets/defualtStars');
                if($settings['OrbitingImageForAll']['url']){
                     $src = $settings['OrbitingImageForAll']['url'];
                }else{
                    if($settings['orbitingElementsList'][$i]['elementImage']['url']){
                         $src = $settings['orbitingElementsList'][$i]['elementImage']['url'];
                    }
                }

				
				?>
                <img class="orbiting" orbit_index = <?php echo $i;?> src = "<?php echo $src?>" 
                 alt = "<?php echo $settings['orbitingElementsList'][$i]['elementName'];?>"  
                 style="
                top: calc(50% - var(--orbitRadius) * <?echo $y; ?>); 
                left: calc(50% - var(--orbitRadius) * <?echo $x; ?>);
                "> 
                <?php

            };
            
            $angle = deg2rad(360 / $n);
            $unityCos = cos($angle);
            $unitySine = sin($angle);
            $currentCos = 1; //=cos(0)
            $currentSine = 0; //=sin(0)

            
            $orbitingEl(0,$currentCos,$currentSine); //show first

            //set value for second $i=1 whose cordinates are equal to the unity values becuase cos(1 * $angle)=cos($angle)= $unityCos
            $currentCos = $unityCos; 
            $currentSine = $unitySine; 

            for($i=1; $i <= floor(($n-1)/2); $i++){ //intdiv($n,2)
               
               
               $orbitingEl($i,$currentCos,$currentSine);
               $orbitingEl($n-$i, $currentCos,(-1) * $currentSine); //exploiting symetry

               $prevCos = $currentCos;
               $prevSine = $currentSine;
               
               //cos(a+b) identity
               $currentCos = $unityCos * $prevCos - $unitySine * $prevSine;
               //sin(a+b) identity
               $currentSine = $unityCos * $prevSine  +  $unitySine * $prevCos;
               
                
            }

            if($n % 2 ==0){ // ($n/2)= $n-($n/2) So in the loop I dont want to recalculate the same point
                $orbitingEl($n /2 ,$currentCos,$currentSine);
            }

            
            
            ?>
                      
             
        </div>

		<?php
        
        
		
	}

	
}