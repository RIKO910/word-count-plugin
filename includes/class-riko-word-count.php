<?php

defined( 'ABSPATH' ) || exit;

/**
 * Class Riko_Word_Count.
 *
 * @since 1.0.0
 */
class Riko_Word_Count {

    /**
     * File.
     *
     * @var string $file File
     *
     * @since 1.0.0
     */
    public string $file;

    /**
     * Version.
     *
     * @var mixed|string $version Version
     *
     * @since 1.0.0
     */
    public string $version = '1.0.0';

    /**
     * Constructor.
     *
     * @since 1.0.0
     */

    public function __construct($file, $version = '1.0.0')
    {
        $this->file = $file;
        $this->version = $version;
        $this->define_constant();
        $this->activation();
        $this->deactivation();
        $this->init_hooks();
    }

    /**
     * Define Constant.
     *
     * @since 1.0.0
     * @return void
     */
    public function define_constant()
    {
        define( 'RWC_VERSION', $this->version );
        define( 'RWC_PLUGIN_DIR', plugin_dir_path( $this->file ) );
        define( 'RWC_PLUGIN_URL', plugin_dir_url( $this->file ) );
        define( 'RWC_PLUGIN_BASENAME', plugin_basename( $this->file ) );
    }

    /**
     * Activation.
     *
     * @since 1.0.0
     * @return void
     */
    public function activation()
    {
        register_activation_hook($this->file, array( $this, 'activation_hook' ) );
    }

    /**
     * Activation hook.
     *
     * @since 1.0.0
     * @return void
     */
    public function activation_hook()
    {
        update_option( 'RWC_VERSION', $this->version );
    }
    /**
     * Deactivation.
     *
     * @since 1.0.0
     * @return void
     */

    public function deactivation(){
        register_deactivation_hook($this->file, array( $this, 'deactivation_hook' ) );
    }

    /**
     * Dectivation hook.
     *
     * @since 1.0.0
     * @return void
     */

    public function deactivation_hook(){
        delete_option( 'RWC_VERSION' );
    }

    /**
     * Init hook.
     *
     * @since 1.0.0
     * @return void
     */

    public function init_hooks()
    {
        add_action("plugins_loaded", array( $this, 'load_textdomain' ) );
        add_action( 'admin_notices', array( $this, 'admin_notices' ) );
        add_filter('the_content', array( $this, 'filter_content' ) );

    }

    /**
     * Load textdomain.
     *
     * @since 1.0.0
     * @return void
     */
    public function load_textdomain()
    {
        load_plugin_textdomain('riko-word-count', false, dirname( plugin_basename( $this->file ) ) . '/languages/' );
    }

    /**
     * Admin notices.
     *
     * @since 1.0.0
     * @return void
     */
    public function admin_notices(){
        printf( '<div id="message" class="notice is-dismissible notice-success"><p>%s</p></div>', 'Your Word Count Plugin is Active' );
    }

    /**
     * Filter count.
     *
     * @since 1.0.0
     * @return void
     */
    public function filter_content( $content ){
        $stripped_content =strip_tags( $content );
        $wordn =str_word_count( $stripped_content );
        $label  = __('Total Number of words', 'riko-word-count');
        $content .=printf('<h2>%s: %s</h2>', $label, $wordn);
        return $content;
    }

}