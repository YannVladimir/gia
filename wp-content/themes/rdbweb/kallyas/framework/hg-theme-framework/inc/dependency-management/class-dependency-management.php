<?php

class ZNHTFW_DependencyManagement{

	/**
	 * Holds a refference to the dependency status
	 * @var array
	 */
	var $dependenciesStatus = null;

	/**
	 * Holds a refference to all dependedncy errors
	 * @var array
	 */
	var $_errors = array();

	/**
	 * Holds a refference to all theme requirements
	 * @var array
	 */
	var $_requirements = array();

	function __construct(){
		// Don't allow frontend access if the dependencies are not met
		add_action( 'template_include', array( $this, 'addFrontendNotice' ), 1000 );
		// Add admin page to allow user to install/update required plugins
		add_action( 'admin_notices', array( $this, 'addAdminNotices' ) );
		// Holds a refference to all theme requirements
		do_action( 'znhgtfw:register_requirements', $this );
	}

	function addFrontendNotice( $template ){

		if( ! $this->checkDependencies() ){
			return dirname( __FILE__ ) . '/ui/frontend-notice.php';
		}

		return $template;
	}

	/**
	 * Will add an admin notice so that the user can install the required plugins
	 */
	function addAdminNotices(){
		if( isset( $_GET['page'] ) && $_GET['page'] === 'zn-about' || $this->checkDependencies() ){
			return;
		}
		?>
			<div class="notice notice-error">
				<?php echo implode( '</br>', $this->_errors ); ?>
				<p><a class="button button button-primary" href="<?php echo admin_url( 'admin.php?page=zn-about#zn-about-tab-addons-dashboard' ); ?>"><?php _e( 'Install and activate required plugins', 'zn_framework' ); ?></a></p>
			</div>
		<?php
	}


	/**
	 * Checks to see if requirements are met
	 * @param boolean $forceCheck if a force check should be made. The return value is cached.
	 * @return boolean True if there is no problem or false if some dependencies are missing
	 */
	function checkDependencies( $forceCheck = false ){

		// Cache the result of the check
		if( null !== $this->dependenciesStatus && ! $forceCheck ){
			return $this->dependenciesStatus;
		}

		$this->dependenciesStatus = $this->checkWpVersionDependencies() && $this->checkPluginsDependencies();
		return $this->dependenciesStatus;
	}

	function checkWpVersionDependencies(){
		return true;
	}



	/**
	 * Register plugin requirements
	 * @param array $args [description]
	 */
	function registerPluginRequirement( $pluginConfig = array() ){
		if( ! isset( $pluginConfig['slug'] ) ){
			return;
		}

		// Register the requirement
		$this->_requirements['plugins'][$pluginConfig['slug']] = $pluginConfig;
	}

	/**
	 * Retrieve plugin requirements
	 */
	function getPluginRequirements(){
		if( isset( $this->_requirements['plugins'] ) && is_array( $this->_requirements['plugins'] ) ){
			return $this->_requirements['plugins'];
		}

		return array();
	}

	/**
	 * Check to see if the required plugins are installed
	 * @return boolean If the plugins installed dependency is meet
	 */
	function checkPluginsDependencies(){

		$isValid = true;

		// Check to see if th theme has plugin requirements
		$pluginsRequirements = $this->getPluginRequirements();

		foreach ( $pluginsRequirements as $slug => $pluginConfig ) {
			if( ! ZNHGTFW()->getComponent( 'addons_manager' )->is_plugin_active( $pluginConfig['slug'] ) ){
				$isValid = false;
				$pluginData = ZNHGTFW()->getComponent( 'addons_manager' )->get_addon_config( $pluginConfig['slug'] );
				$this->addError( sprintf( __( 'The %s is a required plugin', 'zn_framework' ), $pluginData['name']) );
			}
		}

		return $isValid;
	}


	function addError( $error ){
		$this->_errors[] = $error;
	}
}
return new ZNHTFW_DependencyManagement();
