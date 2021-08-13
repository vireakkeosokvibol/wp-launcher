<label>
  <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
</label>
<button class="button my_custom_button" type="button">Toggle Designer <span class="screen-reader-text">Close</span></button>

<div class="wp-launcher-container" style="display: none; background-color: #f0f0f1; border-left: 1px solid #dcdcde; position: fixed; height: 100%; width: 350px; right: 0; top: 0;">
  <input id="customInput" class="form-control" type="hidden" <?php $this->link(); ?> aria-describedby="inputGroup-sizing-sm" />
  <div style="border: 1px dashed #000; width: 100%; height: 50px; background-color: #fff; margin-bottom: 15px;" dropzone="">

  </div>
  <button type="button" class="button draggable" draggable="true" style="cursor: move;">Container</button>
  <button type="button" class="button draggable" draggable="true" style="cursor: move;">Logo</button>
  <button type="button" class="button add-container">Add</button>
</div>