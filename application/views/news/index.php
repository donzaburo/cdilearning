<h2><?php echo $title; ?></h2>

<div>

 <?php foreach ($news->result_array() as $news_item): ?>

      <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">記事を見る</a></p>

<?php endforeach; ?>
<?php echo $this->pagination->create_links();?>
</div>
