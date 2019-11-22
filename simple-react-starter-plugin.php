<?php
/**
 * Plugin Name: Simple React Starter Plugin (SRSP)
 * 
 * Description: Basic plugin to demonstrate how you can develop your own WordPress plugins with React
 * Author: Jules Colle
 * Version: 1.0
 * Author URI: http://bdwm.be/
 */

 /* Load reactapp scripts */
require_once('reactapp_loader.php');



/**
 * 
 * EXAMPLE CODE BELOW. Feel free to delete.
 * 
 * Code below creates an admin menu page with the <div id="reactapp_root"></div>
 * 
 * Important! 
 * If you should keep this code, make sure to replace srsp with your own plugin's prefix
 * 
* */

function srsp_admin_menu() {
    add_menu_page(
        __( 'React Test', 'srsp' ),
        __( 'React Test', 'srsp' ),
        'manage_options',
        'srsp-test-page',
        'srsp_admin_page',
        'dashicons-editor-code',
        99
    );
}

add_action( 'admin_menu', 'srsp_admin_menu' );

function srsp_admin_page() {
    ?>
        <h1>Simple React Starter Plugin</h1>
        <div id="reactapp_root">
            <p>Your react app is not loading yet.</p>
            <p>1. Make sure <strong>node</strong> and <strong>npm</strong> are installed.</p>
            <p>2. Open a terminal window inside <code>wp-content/plugins/simple-react-starter-plugin/reactapp</code> folder and run these commands:</p>
            <code>sudo npm install</code><br>
            <code>sudo npm start</code>
            <p>3. Check if you can visit <a href="http://localhost:3000/" target="_blank">http://localhost:3000/</a></p>
            <p>4. If it works, you should refresh this page and see the react app here instead of this text.</p>
        </div>
    <?php
}