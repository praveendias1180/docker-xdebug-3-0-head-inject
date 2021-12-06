<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://praveendias1180.github.io
 * @since      1.0.0
 *
 * @package    Head_Inject
 * @subpackage Head_Inject/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Head_Inject
 * @subpackage Head_Inject/admin
 * @author     Praveen Dias <praveendias1180@gmail.com>
 */
class Head_Inject_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Head_Inject    The ID of this plugin.
	 */
	private $Head_Inject;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Head_Inject       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Head_Inject, $version ) {

		$this->Head_Inject = $Head_Inject;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Head_Inject_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Head_Inject_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Head_Inject, plugin_dir_url( __FILE__ ) . 'css/head-inject-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Head_Inject_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Head_Inject_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Head_Inject, plugin_dir_url( __FILE__ ) . 'js/head-inject-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * [head_inject_settings_init description]
	 *
	 * @return  [type]  [return description]
	 */
	function head_inject_settings_init() {

		/**
		 * Register a Setting
		 */
		register_setting('headinjectgroup', 'head_inject_setting');
	 
		/**
		 * Register a Settings Section
		 */		
		add_settings_section(
			'head_inject_settings_section_1',
			'Head Inject Settings Section 1', 
			array($this, 'head_inject_settings_section_callback_1'),
			'headinjectgroup'
		);
	 
		/**
		 * Add Settings Field to Settings Section
		 */
		add_settings_field(
			'head_inject_settings_field',
			'Head Inject Setting Field 1', 
			array($this, 'head_inject_settings_field_callback_1'),
			'headinjectgroup',
			'head_inject_settings_section_1'
		);
	}

	/**
	 * [head_inject_settings_section_callback_1 description]
	 *
	 * @return  [type]  [return description]
	 */
	public function head_inject_settings_section_callback_1() {
		do_action( 'qm/debug', 'inside settings section callback!' );
		echo '<p>Head Inject Section - Paste Your Code Here.</p>';
	}
	
	/**
	 * [head_inject_settings_field_callback_1 description]
	 *
	 * @return  [type]  [return description]
	 */
	public function head_inject_settings_field_callback_1() {
		$setting = get_option('head_inject_setting');
		?>
		<textarea id="w3review" name="head_inject_setting" rows="10" cols="50"><?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?></textarea>
		<?php
	}	

	/**
	 * Add an Admin Menu to manage settings.
	 * 
	 * @since	1.0.0
	 */
	public function add_menu_page() {
		add_menu_page(
			'Head Inject',
			'Head Inject',
			'manage_options',
			plugin_dir_path(__FILE__) . 'partials/plugin-head-inject-display.php',
			null,
			'dashicons-plus-alt',
			20
		);
	}



}
