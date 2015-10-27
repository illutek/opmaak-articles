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

#Opmaak wrap afhankelijk van geen of wel field content

 De bedoeling is dat de wrapper rond de artikelen een andere achtergrond kleur krijgen afhankelijk van wel of geen content in het ‘images field’

 Volgend inhoudstype ‘News’ met 3 velden, ‘Title’ (title), ‘Body’ (body) en ‘Images’ (field_news_img)

##Een simpele view

 Page display van volledige content in een unformatted list

##Een node—news.tpl.php
 ```
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
 ```
 Het is onderstaande regel controleert of er inhoud is, en wordt gelijk gesteld aan een zelf gekoezen variabele ($field)
 ```$field = field_get_items('node', $node, 'field_news_img');```
 If $field bestaat wordt volgende class geprint ```<div class="news-wrap-img clearfix">```
 Zoniet else dan wordt deze class geprint ```<div class="news-wrap clearfix">````

##De rest is voor scss
 ```
 /*
 * News items
 =======================================*/
 .news-wrap {
   background: #CCCCCC;
   padding: 10px;
   margin-bottom: 20px;
   h2 {
     display: inline-block;
     padding-left: 24px;
     background: url("../images/drupal-8.png") no-repeat left center;
   }
 }
 .news-wrap-img {
   @extend .news-wrap;
   background: #EEEEEE;
   border: solid 1px #333333;
 }
 .news-img {
   width: 150px;
   float: left;
 }
 ```

