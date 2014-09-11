<div class="page-header">
  <h1>Manage News <small><span class="glyphicon glyphicon-arrow-right"></span> <?php echo $page_title;?></small></h1>
</div>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="input_news" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <input type="hidden" name="news_id" value="<?php echo (isset($news_id)) ? $news_id : "" ?>">
      <div class="form-group">
        <label for="title" class="col-sm-4 control-label">Title</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo (isset($title)) ? $title : "" ?>" required autofocus>
        </div>
      </div>
      <div class="form-group">
        <label for="content" class="col-sm-4 control-label">Content</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="content" name="content" rows='4' cols='100'><?php echo (isset($content)) ? $content : "" ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="image" class="col-sm-4 control-label">Image</label>
        <div class="col-sm-8">
          <input type='hidden' name='orig_image' value="<?php echo $orig_image ?>">
          <img src="<?php echo base_url("assets/uploads/images/$orig_image")?>" width="50" height="50">
          <input type='file' name='image'  size='20'>
        </div>
      </div>
      <div class="form-group">
        <label for="type" class="col-sm-4 control-label">Type</label>
        <div class="col-sm-8">
          <div class="radio">
            <label>
              <input type="radio" name="type" id="news" value="news" <?php echo (isset($type)) ? ($type=="news") ? "checked" : "" : "" ?>>
              News
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="type" id="event" value="event" <?php echo (isset($type)) ? ($type=="event") ? "checked" : "" : "" ?>>
              Event
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="type" id="announce" value="announce" <?php echo (isset($type)) ? ($type=="announce") ? "checked" : "" : "" ?>>
              Announcement
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnAddNews">Save</button>
          <a href=<?php echo base_url("acadhead/manage_news")?> class="btn btn-default">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>