<?php
echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text'];?>
<p><a href="update/<?php echo $news_item['slug']; ?>">編集</a></p>
<p><a href="delete/<?php echo $news_item['id']; ?>">削除</a></p>
<p><a href="<?php echo site_url('news/'); ?>">記事に戻る</a></p>