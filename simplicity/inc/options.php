<?php
	
function add_submenu() {
		add_submenu_page(
			'themes.php',
			'Simplicity Theme Options Page',
			'Theme Options',
			'manage_options',
			'theme_options',
			'my_theme_options_page'
		);
	}
add_action( 'admin_menu', 'add_submenu' );
	

function settings_init() { 
	register_setting( 'theme_options', 'options_settings' );
	
	add_settings_section(
		'options_page_section', 
		'Navigation', 
		'options_page_section_callback', 
		'theme_options'
	);
	function options_page_section_callback() { 
		echo 'Customize navigation using options below.';
	}

	//On/Off Navigation
	add_settings_field( 
		'select_field', 
		'Turn Navgation On/Off', 
		'select_field_render', 
		'theme_options', 
		'options_page_section'  
	);	
	function select_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<select name="options_settings[select_field]">
			<option value="1" <?php if (isset($options['select_field'])) selected( $options['select_field'], 1 ); ?>>On</option>
			<option value="2" <?php if (isset($options['select_field'])) selected( $options['select_field'], 2 ); ?>>Off</option>
		</select>
	<?php
	}

	//Location of Navigation
		add_settings_field( 
		'radio_field', 
		'Choose the Location of the Navigation Bar', 
		'radio_field_render', 
		'theme_options', 
		'options_page_section'
	);
	function radio_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 1 ); ?> value="1" /> <label>Right</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 2 ); ?> value="2" /> <label>Left</label>
		<?php
	}

	//////
	add_settings_section(
		'options_page_section_nav', 
		'Copyright', 
		'options_page_section_callback_nav', 
		'theme_options'
	);
	function options_page_section_callback_nav() { 
		echo 'Customize copyright line using option below.';
	}
	//Copyright
		add_settings_field( 
		'checkbox_field', 
		'Check your preference', 
		'checkbox_field_render', 
		'theme_options', 
		'options_page_section_nav'  
	);
	function checkbox_field_render() { 
		$options = get_option( 'options_settings' );
	?>
		<input type="checkbox" name="options_settings[checkbox_field]" <?php if (isset($options['checkbox_field'])) checked( 'on', ($options['checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label> 
		<?php	
	}

	add_settings_field( 
		'text_field', 
		'Enter New Copyright Line', 
		'text_field_render', 
		'theme_options', 
		'options_page_section_nav' 
	);
	function text_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<input type="text" name="options_settings[text_field]" placeholder="enter copyright line" value="<?php if (isset($options['text_field'])) echo $options['text_field']; ?>" />
		<?php
	}


	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Customize Setting</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'settings_init' );