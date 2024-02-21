<?php

include("header.php");
require_once('admin/class/category.class.php');
require_once('admin/class/news.class.php');

$categoryObject = new Category();
$categoryList = $categoryObject->getAllActiveCategory();
$newsObject = new News();
$newsList = $newsObject->getAllActiveFeaturedNews();
$sliderList = $newsObject->getAllActiveSliderNews();
$breakingNews = $newsObject->getAllActiveBreakingNews();




?>
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li class="active"><a href="#">Home</a></li>
        <?php
        foreach ($categoryList as $category) {
        ?>
          <li><a href="#"><?php echo $category['name']; ?></a></li>

        <?php } ?>
        <!-- <li><a href="#">DropDown</a>
          <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
          </ul>
        </li> -->
        <!-- <li class="last"><a href="#">A Long Link Text</a></li> -->
      </ul>
    </div>
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;" onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="featured_slide">
        <ul id="featurednews">
          <?php
          foreach ($sliderList as $slider) {
          ?>
            <li><img src="admin/images/<?php echo $slider['image']; ?>" alt="" />
              <div class="panel-overlay">
                <h2><?php echo $slider['title']; ?></h2>
                <p><?php echo substr($slider['short_detail'], 0, 86); ?><br />
                  <a href="news.php?id=<?php echo $slider['id'];  ?>">Continue Reading &raquo;</a>
                </p>
              </div>
            </li>
          <?php
          }
          ?>

        </ul>
      </div>
    </div>
    <div class="column">
      <ul class="latestnews">
        <?php
        foreach ($newsList as $news) {
        ?>
          <li><img src="admin/images/<?php echo $news['image']; ?>" height="100" width="100" alt="" srcset="">
            <p><strong><a href="news.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></strong><br><?php echo substr($news['short_detail'], 0, 86); ?></p>
          </li> <?php } ?>

      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="adblock">
    <div class="fl_left">
      <img src=https://cdn2.avada.io/media/resources/6c2s1sb.jpg alt="" srcset="" height='150' width='468'>
    </div>
    <div class="fl_right"><img src=https://www.deltadigit.com/wp-content/uploads/2022/11/Daraz-11.11-Sale-2022.jpg    height='150' width='468'></div>
    <br class="clear" />
  </div>
  <br class="clear" />
  <div id="hpage_cats">
    <?php
    $i = 0;
    foreach ($categoryList as $category) {
      if ($i % 2 == 0) {
        $class = 'fl_left';
      } else {
        $class = 'fl_right';
      }
      $i++;
      $newsObject->set('category_id', $category['id']);
      $categoryWiseNews = $newsObject->getNewsByCategoryId();


    ?>
      <div class="<?php echo $class; ?>">
        <h2><a href="#"><?php echo $category['name']; ?></a></h2>
        <img src="admin/images/<?php echo $categoryWiseNews[0]['image']; ?>" alt="" height='100' width='100' />
        <a href="news.php?id=<?php echo $news['id']; ?>"><strong><?php echo $categoryWiseNews[0]['title'];  ?></strong></a>
        <p><?php echo substr($categoryWiseNews[0]['short_detail'], 0, 200); ?></p>
      </div>
    <?php  } ?>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="hpage_latest">
        <h2>Breaking News</h2>
        <ul>
          <?php foreach ($breakingNews as $breaking) {  ?>
            <li><img src="<?php echo 'admin/images/' . $breaking['image'];  ?>" alt="" height='120' width='160' />
              <p><?php echo substr($breaking['short_detail'], 0, 86);  ?></p>
              <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
              <p class="readmore"><a href="news.php?id=<?php echo $news['id']; ?>">Continue Reading &raquo;</a></p>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="column">
      <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>
      <div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt="" /></a></div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php

include("footer.php");

?>