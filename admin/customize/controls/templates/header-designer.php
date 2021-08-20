<div class="wp-launcher-header-designer">
  <label>
    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
  </label>
  <button class="button open-designer" type="button">Toggle designer<span class="dashicons dashicons-plus" style="line-height: 30px;"></span></button>
  <button class="button open-designer" type="button" style="display: none">Toggle designer<span class="dashicons dashicons-no" style="line-height: 30px;"></span></button>

  <div class="container" style="display: none; background-color: #f0f0f1; border-left: 1px solid #dcdcde; position: fixed; height: 100%; width: 450px; right: 0; top: 0;">
    <div class="customize-control-title">Header Designer</div>
    <div class="row gutter" style="background-color: #fff; margin-bottom: 15px;">
      <div class="col-12 designer-display" style="color: #999999; font-style: italic;"></div>
    </div>
    <div>
      <button type="button" class="button" id="add-container">Container<span class="dashicons dashicons-plus" style="line-height: 30px;"></span></button>
      <button type="button" class="button" draggable="true" style="cursor: move;">Logo</button>
      <button type="button" class="button draggable" draggable="true" style="cursor: move;">Menu</button>
      <button type="button" class="button draggable" draggable="true" style="cursor: move;">Search</button>
      <button type="button" class="button draggable" draggable="true" style="cursor: move;">Custom HTML</button>
    </div>

    <div>
      <textarea class="html-builder" <?php $this->link(); ?> cols="52" rows="10" style="margin: 5px; position: fixed; bottom: 0;"></textarea>
    </div>
  </div>
</div>