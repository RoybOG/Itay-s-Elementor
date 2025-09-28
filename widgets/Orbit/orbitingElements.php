
    <style>
        #circular-container {
                border: black 1px solid;
                height: 700px;
                width: 700px;
                position: relative;
                margin-inline: auto;
                --orbitRadius: 300px;
            }
        #circular-container img {
           
            height: 100px;
            aspect-ratio: 1;
            position: absolute;
            transform: translate(-50%,-50%);
            top:0px;
            left:0px;
        }

        img#center {
             top:50%;
            left:50%;

        }

        /* div#orbiting img:nth-child(1) {
            
            top:50%;/* sin(0)=0 */
            left: calc(50% - var(--orbitRadius));  /* cos(0)=1 */
        }


        div#orbiting img:nth-child(2) {
            
            top:calc(50% - var(--orbitRadius) * 0.5); /*  sin(30)=0.5 */
            left: calc(50% - var(--orbitRadius) * 0.866);  /* cos(0)=1 */
        }

        div#orbiting img:nth-child(3) {
            
            top:calc(50% - var(--orbitRadius) * 0.866); /*  sin(60)=0.866 */
            left: calc(50% - var(--orbitRadius) * 0.5);  /* cos(60)=0.5 */
        }


        div#orbiting img:nth-child(4) {
            
            top:calc(50%  - var(--orbitRadius) ); /*  sin(90)=1 */
            left: 50% ;  /* cos(90)=0 */
        } */

    </style>
    <?php 
        function renderOrbitingElements($n){
            
            $orbitingEl = function($i,$x,$y) {
                ?>
                <img class="orbiting" orbit_index = <?php echo $i;?> src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&amp;h=400&amp;fit=crop&amp;crop=face" alt="Profile Photo"  style="
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

        }
    ?>
    <div id="circular-container">
      
        
            <!-- Center Image -->
            <img id="center" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&amp;h=400&amp;fit=crop&amp;crop=face" alt="Profile Photo" class="center-image" >
            
            <?php renderOrbitingElements(9)?>
    
             
        </div>