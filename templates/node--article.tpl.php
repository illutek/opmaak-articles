<div class="article-wrap <?php print $content['field_border_color']['#items'][0]['value']; ?>">
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>>
            <?php print $title; ?>
        </h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <div class="article_img">
        <?php print render($content['field_image']); ?>
    </div>
    <?php print render($content['body']); ?>
    <?php print $editlink; ?>
    <?php
    if (node_access('update',$node)){
        print l(t('Edit'),'node/'.$node->nid.'/edit' );
    }
    ?>
</div>
