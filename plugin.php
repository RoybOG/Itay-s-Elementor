<?php
namespace itays_elementor_core;
/**
 * Plugin class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */

define('ITAY_FANCY_SVG_PADDING', 10);

final class plugin {

	/**
	 * Addon Version
	 *
	 * @since 1.0.0
	 * @var string The addon version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the addon.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.20.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the addon.
	 */
	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \Elementor_Test_Addon\Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \Elementor_Test_Addon\Plugin An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}
	

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function is_compatible(): bool {

		// Check if Elementor installed and activated
		/*if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}*/

		return true;

	}

	/**
	 * init
	 *
	 * If the site is compatible(has elementor), will initialize the modifications of this plugin
	 *	
	**/	
	public function init(): void {
		
		$this->modify_elementor();

		 //register widgets:
		 add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		 
		 //register global and widget styles: 
		 add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'register_styles' ] );

		  // Register scripts for frontend
    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'register_scripts' ] );

    // Register scripts for editor
    add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'register_scripts' ] );
		
	}


	public function modify_elementor(){
		//add the plugin category for widgets
         add_action( 'elementor/elements/categories_registered', function($elements_manager){
            $elements_manager->add_category(
		    'itays_widgets',
		    [
			'title' => esc_html__( "Itay's Widgets", 'itays-elementor' ),
			'icon' => 'fa fa-plug',
			]
			);
         } );
	}

	public function register_styles(){
		
		wp_register_style(
			'itayswidget-style',
			plugins_url( 'global/pluginStyles.css', __FILE__ )
		);
		
		wp_register_style(
			'itayswidget-posts_list-style',
			plugins_url( 'widgets/posts_list/styles.css', __FILE__ )
		);
		wp_register_style(
			'itayswidget-table-style',
			plugins_url( 'widgets/ElementorTable/styles.css', __FILE__ )
		);
		wp_register_style(
			'itayswidget-fancyTable-style',
			plugins_url( 'widgets/FancyTable/styles.css', __FILE__ )
		);

		wp_register_style(
			'itayswidget-Orbit-style',
			plugins_url( 'widgets/Orbit/styles.css', __FILE__ )
		);
		
		
	
	}

	public function register_scripts(){
		wp_register_script( 'widget-script-fancyWidgetsScript', plugins_url( 'global/fancyWidgetsScript.js', __FILE__ ) );

		wp_register_script( 'widget-script-orbitRotationScript', plugins_url( 'widgets/Orbit/orbitRotation.js', __FILE__ ) );

		wp_localize_script(
        'widget-script-fancyWidgetsScript',
        'ItayFancySVGSettings',
        [
            'padding' => ITAY_FANCY_SVG_PADDING,
        ]
    );
	
	}
	
	
	/**
	 * Register Widgets
	 *
	 * Load widgets files and register new Elementor widgets.
	 *
	 * Fired by `elementor/widgets/register` action hook.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ): void {

		 require_once( __DIR__ . '/widgets/posts_list/index.php' );
		 require_once( __DIR__ . '/widgets/ElementorTable/index.php' );
		 require_once( __DIR__ . '/widgets/FancyTable/index.php' );
		  require_once( __DIR__ . '/widgets/Orbit/index.php' );
        
		$widgets_manager->register( new \itays_elementor_core\widgets\PostsList() );
		$widgets_manager->register( new \itays_elementor_core\widgets\ElementorTable() );
		$widgets_manager->register( new \itays_elementor_core\widgets\FancyTable() );
		$widgets_manager->register( new \itays_elementor_core\widgets\Orbit() );

		
        
		// $widgets_manager->register( new Widget_2() );

	}
    


}