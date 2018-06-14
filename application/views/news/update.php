<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/update/'.$news_item['id'].''); ?>

    <input type="hidden"  name="id"　id="id" value="<?php echo $news_item['id']; ?>">
    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $news_item['title']; ?>"/><br />

    <label for="text">text</label>
    <textarea name="text"><?php echo $news_item['text']; ?></textarea><br />

    <input type="submit" name="submit" value="update news item" />

</form>
