<div class="form-group col-md-12">
    <label for="video-title">Video title :</label>
    <input required type="text" class="form-control" name="video_title" id="video-title" placeholder="Enter Video Title" required>
</div>
<div class="form-group col-md-12">
    <label for="video-title">Video ID :</label>
    <input type="text" class="form-control" name="video_id" id="video-id" placeholder="Enter Video ID" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-title">Ad-1 title :</label>
    <input type="text" class="form-control" name="ad1_title" id="ad1-title" placeholder="Enter Ad-1 Title" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-quote">Ad-1 quote :</label>
    <input type="text" class="form-control" name="ad1_quote" id="ad1-quote" placeholder="Enter Video Title" required>
</div>
<div class="form-group mt-4 bg-primary">
    <input  required data-parsley-validateimage="1024" class="form-control custom-input-file custom-input-file--2" name="ad1_image" id="ad1-image" type="file" onchange="imagePreview('ad1', event)"/>
    <label for="ad1-image">
        <i class="fa fa-upload"></i>
        <span>Ad-1 Image……</span>
    </label>
</div>
<p style="color:black;"><b>Recomended image size height 208px and width 208px</b></p>
<img id="preview1" class="rounded mx-auto d-block" width="500">
<div class="form-group col-md-12">
    <label for="ad1-button-text">Ad1 Button Text :</label>
    <input type="text" class="form-control" name="ad1_button_text" id="ad1-button-text" placeholder="Enter Video Title" required>
</div>
<div class="form-group col-md-12">
    <label for="ad1-button-url">Ad1 Button Url :</label>
    <input type="text" class="form-control" name="ad1_button_url" id="ad1-button-url" placeholder="Enter Video Title" required>
</div>
<div class="form-group col-md-12">
    <input type="checkbox" name="ad1_button_target" id="ad1-button-target" value="other-site">
    <label for="ad1-button-target">Open new tab</label>
</div>
<div class="form-group col-md-12">
    <label for="ad2-title">Ad-2 title :</label>
    <input type="text" class="form-control" name="ad2_title" id="ad2-title" placeholder="Enter Ad-2 Title" required>
</div>
<div class="form-group col-md-12">
    <label for="ad2-quote">Ad-2 quote :</label>
    <input type="text" class="form-control" name="ad2_quote" id="ad2-quote" placeholder="Enter Ad-2 Quote" required>
</div>
<div class="form-group col-md-12 mt-4 bg-primary">
    <input required data-parsley-validateimage="1024" class="form-control custom-input-file custom-input-file--2" name="ad2_image" id="ad2-image" type="file" onchange="imagePreview('ad2', event)"/>
    <label for="ad2-image">
        <i class="fa fa-upload"></i>
        <span>Ad-2 Image……</span>
    </label>
</div>
<p style="color:black;"><b>Recomended image size height 208px and width 208px</b></p>
<img id="preview2" class="rounded mx-auto d-block" width="500">
<div class="form-group col-md-12">
    <label for="ad2-button-text">Ad-2 Button Text :</label>
    <input type="text" class="form-control" name="ad2_button_text" id="ad2-button-text" placeholder="Enter Ad-2 Button Text" required>
</div>
<div class="form-group col-md-12">
    <label for="ad2-button-url">Ad-2 Button Url :</label>
    <input type="text" class="form-control" name="ad2_button_url" id="ad2-button-url" placeholder="Enter Ad-2 Button Url" required>
</div>
<div class="form-group col-md-12">
    <input type="checkbox" name="ad2_button_target" id="ad2-button-target" value="other-site">
    <label for="ad2_button_target">Open new tab</label>
</div>
<div class="form-group col-md-12">
    <label for="ad3-title">Ad-3 title :</label>
    <input type="text" class="form-control" name="ad3_title" id="ad3-title" placeholder="Enter Ad-3 Title" required>
</div>

<div class="form-group col-md-12 mt-4 bg-primary">
    <input required data-parsley-validateimage="1024" class="form-control custom-input-file custom-input-file--2" name="ad3_image" id="ad3-image" type="file" onchange="imagePreview('ad3', event)"/>
    <label for="ad3-image">
        <i class="fa fa-upload"></i>
        <span>Ad-3 Image…</span>
    </label>
</div>
<p style="color:black;"><b>Recomended image size height 208px and width 208px</b></p>
<img id="preview3" class="rounded mx-auto d-block" width="500">

<div class="form-group">
    <label>Give rating :</label>
    <input type="radio" class="form-check-input ml-1 " name="ad3_rating" id="rating_1" value="1">
    <label for="one-rating" class="form-check-label ml-4">⭐</label>
    <input type="radio" class="form-check-input ml-1 " name="ad3_rating" id="rating_2" value="2">
    <label for="two-rating" class="form-check-label ml-4">⭐⭐</label>
    <input type="radio" class="form-check-input ml-1 " name="ad3_rating" id="rating_3" value="3">
    <label for="three-rating" class="form-check-label ml-4">⭐⭐⭐</label>
    <input type="radio" class="form-check-input ml-1 " name="ad3_rating" id="rating_4" value="4">
    <label for="four-rating" class="form-check-label ml-4">⭐⭐⭐⭐</label>
    <input type="radio" class="form-check-input ml-1 " name="ad3_rating" id="rating_5" value="5" checked>
    <label for="five-rating" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
</div>
<script>
    window.getAdFormData = function (event) {
        let video_title = $('#video-title').val();
        let video_id = $('#video-id').val();
        let ad1_title = $('#ad1-title').val();
        let ad1_quote = $('#ad1-quote').val();
        let ad1_image = $('#ad1-image').prop('files')[0];
        let ad1_button_text = $('#ad1-button-text').val();
        let ad1_button_url = $('#ad1-button-url').val();
        let ad1_button_target = $('#ad1-button-target').is(':checked') ? 'other-site' : '';
        let ad2_title = $('#ad2-title').val();
        let ad2_quote = $('#ad2-quote').val();
        let ad2_image = $('#ad2-image').prop('files')[0];
        let ad2_button_text = $('#ad2-button-text').val();
        let ad2_button_url = $('#ad2-button-url').val();
        let ad2_button_target = $('#ad2-button-target').is(':checked') ? 'other-site' : '';
        let ad3_title = $('#ad3-title').val();
        let ad3_image = $('#ad3-image').prop('files')[0];
        let ad3_rating = $('[name="ad3_rating"]:checked').val();
        let form_data = new FormData();
        form_data.append('template_data[video_title]',video_title);
        form_data.append('template_data[video_id]',video_id);
        form_data.append('template_data[ad1_title]',ad1_title);
        form_data.append('template_data[ad1_quote]',ad1_quote);
        form_data.append('template_data[ad1_button_text]',ad1_button_text);
        form_data.append('template_data[ad1_button_url]',ad1_button_url);
        form_data.append('template_data[ad1_button_target]',ad1_button_target);
        form_data.append('template_data[ad2_title]',ad2_title);
        form_data.append('template_data[ad2_quote]',ad2_quote);
        form_data.append('template_data[ad2_button_text]',ad2_button_text);
        form_data.append('template_data[ad2_button_url]',ad2_button_url);
        form_data.append('template_data[ad2_button_target]',ad2_button_target);
        form_data.append('template_data[ad3_title]',ad3_title);
        form_data.append('template_data[ad3_rating]',ad3_rating);
        form_data.append('_token',"{{ csrf_token() }}");

        if (ad1_image) {
            form_data.append('template_data[images][ad1_image]',ad1_image);
        }
        if (ad2_image) {
            form_data.append('template_data[images][ad2_image]',ad2_image);
        }
        if (ad3_image) {
            form_data.append('template_data[images][ad3_image]',ad3_image);
        }

        return form_data;
    }

    window.fillFormData = function (data) {
        $('#video-title').val(data.video_title);
        $('#video-id').val(data.video_id);
        $('#ad1-title').val(data.ad1_title);
        $('#ad1-quote').val(data.ad1_quote);
        $('#preview1').attr('src', '{{ img("/") }}'+data.ad1_image);
        $('#ad1-button-text').val(data.ad1_button_text);
        $('#ad1-button-url').val(data.ad1_button_url);
        $("#ad1-button-target").prop('checked', data.ad1_button_target == 'other-site');
        $("#ad1-image").prop('required', false);
        $('#ad2-title').val(data.ad2_title);
        $('#ad2-quote').val(data.ad2_quote);
        $('#preview2').attr('src', '{{ img("/") }}'+data.ad2_image);
        $("#ad2-image").prop('required', false);
        $('#ad2-button-text').val(data.ad2_button_text);
        $('#ad2-button-url').val(data.ad2_button_url);
        $("#ad2-button-target").prop('checked', data.ad2_button_target == 'other-site');
        $("#ad3-image").prop('required', false);
        $('#ad3-title').val(data.ad3_title);
        $('#preview3').attr('src', '{{ img("/") }}'+data.ad3_image);
        $("#rating_"+data.ad3_rating).prop('checked', true);
        $('[name="ad3_rating"]:checked').val();
    }
</script>
