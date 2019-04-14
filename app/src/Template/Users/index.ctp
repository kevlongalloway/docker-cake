<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Foundation | Welcome</title>
      <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?php echo $this->Html->css('bootstrap.min.css');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
   </head>
   <body>
      <div class="callout large primary">
         <div class="row column text-center">
            <h1>Our Blog</h1>
         </div>
      </div>
      <?php if($auth) : ?>
            <?php if($role == 1) : ?>
               <?= $this->Html->link(__('Create Post'), ['controller' => 'posts', 'action' => 'add'], array('class'=>'btn btn-primary')) ?>
            <?php elseif($role == 2) : ?>
               <?= $this->Html->link(__('View Drafts'), ['controller' => 'posts', 'action' => 'drafts'], array('class'=>'btn btn-primary')) ?>
            <?php endif ?> 
         <?php endif ?> 

      <div class="row" id="content">
           

         <div id="blog_posts" class="medium-8 columns">
            
         </div>



         <div class="medium-3 columns" data-sticky-container>
            <div class="sticky" data-sticky data-anchor="content">
               <h4>Categories</h4>
               <ul>
                  <li><a href="#">Skyler</a></li>
                  <li><a href="#">Jesse</a></li>
                  <li><a href="#">Mike</a></li>
                  <li><a href="#">Holly</a></li>
               </ul>
               <h4>Authors</h4>
               <ul>
                  <li><a href="#">Skyler</a></li>
                  <li><a href="#">Jesse</a></li>
                  <li><a href="#">Mike</a></li>
                  <li><a href="#">Holly</a></li>
               </ul>
            </div>
         </div>
      </div>



      <div class="row column">
         <ul class="pagination" role="navigation" aria-label="Pagination">
            <li class="disabled">Previous</li>
            <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
            <li><a href="#" aria-label="Page 2">2</a></li>
            <li><a href="#" aria-label="Page 3">3</a></li>
            <li><a href="#" aria-label="Page 4">4</a></li>
            <li class="ellipsis"></li>
            <li><a href="#" aria-label="Page 12">12</a></li>
            <li><a href="#" aria-label="Page 13">13</a></li>
            <li><a href="#" aria-label="Next page">Next</a></li>
         </ul>
      </div>

      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
      <script>
         $(document).foundation();
      </script>
      <script>
         $(document).ready(function(){
            $.getJSON("/posts.json",function(data){
               var post = '';
               $.each(data.posts,function(key,value){
                  console.log(value);
                  post += '<div class="blog-post">';
                  post += '<h3>'+value.title+'<small>'+value.created+'</small></h3>';
                  post += '<p>'+value.body+'</p>';
                  post += '</div>';
                  post += '<hr>'

               });
               $('#blog_posts').append(post);
            });
         });
      </script>
   </body>
</html>

