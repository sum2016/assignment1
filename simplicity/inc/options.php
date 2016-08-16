<?php
	
function add_submenu() {
		add_submenu_page( 'themes.php', 'My Super Awesome Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'add_submenu' );
	

function settings_init() { 
	register_setting( 'theme_options', 'options_settings' );
	
	add_settings_section(
		'options_page_section', 
		'Your section description', 
		'options_page_section_callback', 
		'theme_options'
	);
	
	function options_page_section_callback() { 
		echo 'A description and detail about the section.';
	}

	add_settings_field( 
		'text_field', 
		'Enter your text', 
		'text_field_render', 
		'theme_options', 
		'options_page_section' 
	);

	add_settings_field( 
		'checkbox_field', 
		'Check your preference', 
		'checkbox_field_render', 
		'theme_options', 
		'options_page_section'  
	);

	add_settings_field( 
		'radio_field', 
		'Choose an option', 
		'radio_field_render', 
		'theme_options', 
		'options_page_section'  
	);
	
	add_settings_field( 
		'textarea_field', 
		'Enter content in the textarea', 
		'textarea_field_render', 
		'theme_options', 
		'options_page_section'  
	);
	
	add_settings_field( 
		'select_field', 
		'Choose from the dropdown', 
		'select_field_render', 
		'theme_options', 
		'options_page_section'  
	);

	function text_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<input type="text" name="options_settings[text_field]" value="<?php if (isset($options['text_field'])) echo $options['text_field']; ?>" />
		<?php
	}
	
	function checkbox_field_render() { 
		$options = get_option( 'options_settings' );
	?>
		<input type="checkbox" name="options_settings[checkbox_field]" <?php if (isset($options['checkbox_field'])) checked( 'on', ($options['checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label> 
		<?php	
	}
	
	function radio_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 1 ); ?> value="1" /> <label>Option One</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 2 ); ?> value="2" /> <label>Option Two</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 3 ); ?> value="3" /> <label>Option Three</label>
		<?php
	}
	
	function textarea_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<textarea cols="40" rows="5" name="options_settings[textarea_field]"><?php if (isset($options['textarea_field'])) echo $options['textarea_field']; ?></textarea>
		<?php
	}

	function select_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<select name="options_settings[select_field]">
			<option value="1" <?php if (isset($options['select_field'])) selected( $options['select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['select_field'])) selected( $options['select_field'], 2 ); ?>>Option 2</option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>My Awesome Options Page</h2>
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