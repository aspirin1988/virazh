<link rel="stylesheet" href="/wp-content/plugins/pp-gallery/bower_components/uikit/css/uikit.min.css">
<link rel="stylesheet" href="/wp-admin/css/wp-admin.min.css">
<link rel="stylesheet" href="/wp-content/plugins/pp-gallery/bower_components/uikit/css/components/placeholder.min.css">
<link rel="stylesheet" href="/wp-content/plugins/pp-gallery/bower_components/uikit/css/components/form-file.min.css">
<link rel="stylesheet" href="/wp-content/plugins/pp-gallery/bower_components/uikit/css/components/upload.min.css">
<link rel="stylesheet" href="/wp-content/plugins/pp-gallery/bower_components/uikit/css/components/progress.min.css">
<link rel="stylesheet" href="/wp-content/plugins/pp-gallery/pp-gallery.css">

<div class="pp-widget-container">
    <div class="pp-widget-images">
        <ul class="uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-5 uk-grid-width-large-1-5" data-uk-margin>
            <?php foreach($pp_gallery_current_images as $key => $val): ?>
                <li class="pp-widget-image">
                    <div class="uk-thumbnail">
                        <img src="<?=$val->url; ?>" alt="">
                        <div class="uk-thumbnail-caption">
                            <i class="uk-icon-remove remove-pp-img" data-pp-id="<?=$val->id; ?>"></i>
                            <i class="uk-icon-cog"></i>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="pp-widget-file-uploader">
        <div id="upload-drop" class="uk-placeholder uk-text-center">
            <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i>
            Для загрузки перетащите изображение или
            <a class="uk-form-file">Выберите его<input id="upload-select" type="file" name="pp_widget_files[]" multiple></a>.
            <input type="hidden" name="post-id" value="<?=$postID;?>" id="postID">
        </div>

        <div id="progressbar" class="uk-progress uk-hidden">
            <div class="uk-progress-bar" style="width: 0%;">0%</div>
        </div>
    </div>
</div>
