<?php
$field = field_get_items('node', $node, 'field_news_img');
if ($field) { ?>
<div class="news-wrap-img clearfix">
    <div class="news-img">
        <?php print render($content['field_news_img']); ?>
    </div>
    <?php } else { ?>
    <div class="news-wrap clearfix">
        <div class="no-img"></div>
        <?php } ?>

        <div class="content clearfix"<?php print $content_attributes; ?>>
            <h2><?php print $title; ?></h2>
            <?php print render($content['body']); ?>
        </div>
    </div>
