jQuery((function(n){var e=[];try{var o=n("#header-customizer").val().toString();o&&""!==o&&"[]"!==o&&(e=JSON.parse(o),console.log(e))}catch(n){console.log(n)}function a(o){void 0===o&&(o=!0),!0===o&&wp.customize("header-section-customizer",(function(n){n.set(JSON.stringify(e))}));var s=n(".header-customizer-display");if(s.html(""),0!==e.length){var i=function(o){for(var i in s.append(n('<div class="row g-1 p-1"></div>').append(n('<div class="col-12" style="border: 1px solid #efefef; box-sizing: border-box;"></div>').append(n('<div style="display: flex; font-size: 11px;">Container<span style="flex: 1 1 auto;"></span></div>').append(n('<span class="dashicons dashicons-edit"></span>').on("click",(function(e){n(e.currentTarget).children(".setting-panel").show()})).append(n('<span class="setting-panel"></span>').append('<button type="button" class="button">Close</button>').on("click",(function(n){n.preventDefault(),console.log("panel clicked")})))).append(n('<span class="dashicons dashicons-no"></span>').on("click",(function(){e.splice(o,1),a()})))).append(n('<div class="row g-1 p-1"></div>').append()))),e[o].container.column)s.find(".row .col-12 .row:eq("+o+")").append(n('<div class="col-'+e[o].container.column[i].span+'" style="height: 30px; border: 1px dashed #efefef;">asd</div>'))};for(var t in e)i(t)}else s.append('<div class="col-12 empty-component" style="font-style: italic; padding: 25px 10px; color: #aaaaaa;">Add a container to start customizing.</div>')}a(!1),n(".component #add-container").on("click",(function(){e.push({container:{column:[{span:12,html:""}]}}),a()}))}));