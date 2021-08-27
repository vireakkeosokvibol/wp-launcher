<?php

declare(strict_types=1);

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

class WP_Launcher_Customize_Customizer_Control extends WP_Customize_Control
{

  public $type = 'customizer';

  public function enqueue()
  {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1');
    wp_enqueue_style('customizer', get_template_directory_uri() . '/assets/css/admin/customizer.css', array(), '0.1');
    wp_enqueue_script('customizer', get_template_directory_uri() . '/assets/js/admin/bundle.js', array(), '0.1', true);
  }

  public function render_content(): void
  {
?>
    <label><?php echo esc_html($this->label); ?></label>
    <div class="row" style="background-color: #ffffff; box-shadow: 0 0 3px #ccc;">
      <div class="col-12 header-customizer-display" style="padding: 2px;"></div>
    </div>
    <div class="component" style="margin: 25px 0;">
      <button class="button" draggable="true" id="add-container" type="button" style="display: flex; align-items: center;"><span class="dashicons dashicons-plus"></span>Container</button>
    </div>
    <input type="hidden" id="header-customizer" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
<?php
  }
}
