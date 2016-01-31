<?php

function display_footer_legal_mce() {
	$settings = array(
		'teeny' => true,
		'textarea_rows' => 15,
		'tabindex' => 1
	);
	wp_editor(get_option('footer_copy'), 'footer_copy', $settings);
}

function display_theme_panel_fields() {
	add_settings_section("section", "Footer", null, "theme-options-footer");

	add_settings_field("footer_copy", "Footer copy", "display_footer_legal_mce", "theme-options-footer", "section");

	register_setting("section", "footer_copy");
}

add_action("admin_init", "display_theme_panel_fields");

function theme_settings_page(){
	?>
		<div class="wrap">
			<h2>Theme Settings</h2>
			<form method="post" action="options.php">
				<?php
					settings_fields("section");
					do_settings_sections("theme-options-footer");
					submit_button();
				?>
			</form>
		</div>
	<?php
}

function add_theme_menu_item() {
	add_submenu_page('options-general.php', 'Theme Settings', 'Theme Settings', 'manage_options', 'theme-settings', 'theme_settings_page', null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

?>