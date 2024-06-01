<div class="form-group col-md-12">
    <label for="ad1-title">Ad-1 highlighted title :</label>
    <input type="text" class="form-control" name="ad1_highlight" id="ad1-highlight" placeholder="Enter Ad-1 Highlighted Title" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-title">Ad-1 title :</label>
    <input type="text" class="form-control" name="ad1_title" id="ad1-title" placeholder="Enter Ad-1 Title" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-quote">Ad-1 quote :</label>
    <input type="text" class="form-control" name="ad1_quote" id="ad1-quote" placeholder="Enter Ad-1 Quote" required>
</div>
<div class="form-group col-md-12 mt-4 bg-primary">
    <input required data-parsley-validateimage="1024" class="form-control custom-input-file custom-input-file--2" name="ad1_image" id="ad1-image" type="file" onchange="imagePreview('ad1', event)"/>
    <label for="ad1-image">
        <i class="fa fa-upload"></i>
        <span>Ad-1 Image……</span>
    </label>
</div>
<p style="color:black;"><b>Recomended image size height 600px and width 437px</b></p>
<img id="preview1" class="rounded mx-auto d-block" width="500">
<div class="form-group col-md-12">
    <label for="ad1-button-text">Ad1 Button Text :</label>
    <input type="text" class="form-control" name="ad1_button_text" id="ad1-button-text" placeholder="Enter Ad-1 button text" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-button-url">Ad1 Button Url :</label>
    <input type="text" class="form-control" name="ad1_button_url" id="ad1-button-url" placeholder="Enter Ad-1 button url" required>
</div>
<div class="form-group col-md-12">
    <input type="checkbox" name="ad1_button_target" id="ad1-button-target" value="other-site">
    <label for="button-text">Open new tab</label>
</div>
<div class="form-group col-md-12">
    <label for="ad1-title">Ad-2 highlighted title :</label>
    <input type="text" class="form-control" name="ad2_highlight" id="ad2-highlight" placeholder="Enter Ad-2 Highlighted Title" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-title">Ad-2 title :</label>
    <input type="text" class="form-control" name="ad2_title" id="ad2-title" placeholder="Enter Ad-2 Title" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-quote">Ad-2 quote :</label>
    <input type="text" class="form-control" name="ad2_quote" id="ad2-quote" placeholder="Enter Ad-2 Quote" required>
</div>
<div class="form-group col-md-12 mt-4 bg-primary">
    <input required data-parsley-validateimage="1024" class="form-control custom-input-file custom-input-file--2" name="ad2_image" id="ad2-image" type="file" onchange="imagePreview('ad2', event)"/>
    <label for="ad2-image">
        <i class="fa fa-upload"></i>
        <span>Ad-2 Image……</span>
    </label>
</div>
<p style="color:black;"><b>Recomended image size height 600px and width 437px</b></p>
<img id="preview2" class="rounded mx-auto d-block" width="500">
<div class="form-group col-md-12">
    <label for="ad1-button-text">Ad-2 Button Text :</label>
    <input type="text" class="form-control" name="ad2_button_text" id="ad2-button-text" placeholder="Enter Ad-2 button text" required>
</div>
<div class="form-group col-md-12">
    <label for="ad2-button-url">Ad-2 Button Url :</label>
    <input type="text" class="form-control" name="ad2_button_url" id="ad2-button-url" placeholder="Enter Ad-2 button url" required>
</div>
<div class="form-group col-md-12">
    <input type="checkbox" name="ad2_button_target" id="ad2-button-target" value="other-site">
    <label for="button-text">Open new tab</label>
</div>
<script>
    window.getAdFormData = function (event) {
        let ad1_highlight = $('#ad1-highlight').val();
        let ad1_title = $('#ad1-title').val();
        let ad1_quote = $('#ad1-quote').val();
        let ad1_image = $('#ad1-image').prop('files')[0];
        let ad1_button_text = $('#ad1-button-text').val();
        let ad1_button_url = $('#ad1-button-url').val();
        let ad1_button_target = $('#ad1-button-target').val();
        let ad2_highlight = $('#ad2-highlight').val();
        let ad2_title = $('#ad2-title').val();
        let ad2_quote = $('#ad2-quote').val();
        let ad2_image = $('#ad2-image').prop('files')[0];
        let ad2_button_text = $('#ad2-button-text').val();
        let ad2_button_url = $('#ad2-button-url').val();
        let ad2_button_target = $('#ad2-button-target').val();
        let form_data = new FormData();
        form_data.append('template_data[ad1_highlight]',ad1_highlight);
        form_data.append('template_data[ad1_title]',ad1_title);
        form_data.append('template_data[ad1_quote]',ad1_quote);
        form_data.append('template_data[images][ad1_image]',ad1_image);
        form_data.append('template_data[ad1_button_text]',ad1_button_text);
        form_data.append('template_data[ad1_button_url]',ad1_button_url);
        form_data.append('template_data[ad1_button_target]',ad1_button_target);
        form_data.append('template_data[ad2_highlight]',ad2_highlight);
        form_data.append('template_data[ad2_title]',ad2_title);
        form_data.append('template_data[ad2_quote]',ad2_quote);
        form_data.append('template_data[images][ad2_image]',ad2_image);
        form_data.append('template_data[ad2_button_text]',ad2_button_text);
        form_data.append('template_data[ad2_button_url]',ad2_button_url);
        form_data.append('template_data[ad2_button_target]',ad2_button_target);
        form_data.append('_token',"{{ csrf_token() }}");

        return form_data;
    }

    window.fillFormData = function (data) {
        let ad1_highlight = $('#ad1-highlight').val(data.ad1_highlight);
        let ad1_title = $('#ad1-title').val(data.ad1_title);
        let ad1_quote = $('#ad1-quote').val(data.ad1_quote);
        let ad1_image = $('#ad1-image').prop('files')[0];
        $('#preview1'). attr('src', 'http://localhost:8000/storage/'+data.ad1_image);
        let ad1_button_text = $('#ad1-button-text').val(data.ad1_button_text);
        let ad1_button_url = $('#ad1-button-url').val(data.ad1_button_url);
        if (data.ad1_button_target == 'other-site') {
            $("#ad1-button-target").prop('checked', true);
        }
        let ad1_button_target = $('#ad1-button-target').val();
        let ad2_highlight = $('#ad2-highlight').val(data.ad2_highlight);
        let ad2_title = $('#ad2-title').val(data.ad2_title);
        let ad2_quote = $('#ad2-quote').val(data.ad2_quote);
        let ad2_image = $('#ad2-image').prop('files')[0];
        $('#preview2'). attr('src', 'http://localhost:8000/storage/'+data.ad2_image);
        let ad2_button_text = $('#ad2-button-text').val(data.ad2_button_text);
        let ad2_button_url = $('#ad2-button-url').val(data.ad2_button_url);
        if (data.ad2_button_target == 'other-site') {
            $("#ad2-button-target").prop('checked', true);
        }
        let ad2_button_target = $('#ad2-button-target').val();
        let form_data = new FormData();
        form_data.append('template_data[ad1_highlight]',ad1_highlight);
        form_data.append('template_data[ad1_title]',ad1_title);
        form_data.append('template_data[ad1_quote]',ad1_quote);
        form_data.append('template_data[images][ad1_image]',ad1_image);
        form_data.append('template_data[ad1_button_text]',ad1_button_text);
        form_data.append('template_data[ad1_button_url]',ad1_button_url);
        form_data.append('template_data[ad1_button_target]',ad1_button_target);
        form_data.append('template_data[ad2_highlight]',ad2_highlight);
        form_data.append('template_data[ad2_title]',ad2_title);
        form_data.append('template_data[ad2_quote]',ad2_quote);
        form_data.append('template_data[images][ad2_image]',ad2_image);
        form_data.append('template_data[ad2_button_text]',ad2_button_text);
        form_data.append('template_data[ad2_button_url]',ad2_button_url);
        form_data.append('template_data[ad2_button_target]',ad2_button_target);
        form_data.append('_token',"{{ csrf_token() }}");
    }
</script>
