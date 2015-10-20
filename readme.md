#Opmaak articles

Afhankelijk van de gekozen opmaak (field_border_color), bij het aanmaken of editeren van een artikel, wordt deze toegevoegd aan de class
op node--article.tpl.php en wel op volgende manier
```
div class="article-wrap <?php print $content['field_border_color']['#items'][0]['value']; ?>">
```
'field_border_color' is hier uiteraard de veld naam bij het inhoudstype 'article'

Hier de volledige node--article.tpl.php

```
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
    <?php
    if (node_access('update',$node)){
        print l(t('Edit'),'node/'.$node->nid.'/edit' );
    }
    ?>
</div>
```

Volgende om een edit link toe te voegen.
```
<?php
    if (node_access('update',$node)){
        print l(t('Edit'),'node/'.$node->nid.'/edit' );
    }
    ?>
```

De css
```
/*
* eigen opmaak
===============================================*/
.article-wrap {
    padding: 20px;
    margin-bottom: 25px;
    overflow: hidden;
}

.article-wrap h2 {
    margin-bottom: 30px!important;
}

.article_img {
    float: left;
}

.article_img img {
    width: 250px;
    height: auto;
    margin: 0 10px 5px 0;
}

.blauw {
    border: solid 2px #2690d1;
    background: #2690d1;
    color: white;
}

.groen {
    border: solid 2px green;
}

.rood {
    border: solid 2px red;
}
```
