<?php
global $wpdb;
$todayDate    = new DateTime();
$stringDate = $todayDate->format('Y-m-d');
$today_post_count = $wpdb->get_var(
    $wpdb->prepare(
        "
            SELECT COUNT(*)
            FROM $wpdb->posts
            WHERE DATE(post_date) = DATE(%s)
        ",
        $stringDate
    )
);

$total_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post'");
$total_pages = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='page'");

$total_subscriber = count(get_users([
    'role'    => 'Subscriber',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
]));

$total_contributor = count(get_users([
    'role'    => 'Contributor',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
]));

$total_author = count(get_users([
    'role'    => 'Author',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
]));

$total_editor = count(get_users([
    'role'    => 'Editor',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
]));
?>
<center class="">
    <div class="circle blue"><?= $today_post_count?></div>
    <h1>Todays Posts</h1>
</center>
<div class="flex-grid">
  <div class="col"><i class="fas fa-thumbtack"></i><?= $total_posts?> Posts</div>
  <div class="col"><i class="fas fa-copy"></i><?= $total_pages?> Pages</div>
</div>
<div class="flex-grid">
  <div class="col"><i class="fas fa-user-check"></i><?= $total_subscriber?> Subscribers</div>
  <div class="col"><i class="fas fa-user-plus"></i><?= $total_contributor?> Contributor</div>
</div>
<div class="flex-grid">
  <div class="col"><i class="fas fa-user-tie"></i><?= $total_author?> Authors</div>
  <div class="col"><i class="fas fa-user-edit"></i><?= $total_editor?> Editors</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css">
<style>
.flex-grid {
  display: flex;
  padding-top: 10px;
}
.flex-grid .col {
  flex: 1;
}
 
.flex-grid .col i {
    padding-right: 8px;
}
@media (max-width: 400px) {
  .flex-grid {
    display: block;
    .col {
      width: 100%;
      margin: 0 0 10px 0;
    }
  }
}

.circle {
    width: 70px;
    height: 70px;
    line-height: 72px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    text-align: center;
    color: white;
    font-size: 50px;
    text-transform: uppercase;
    font-weight: 700;
    margin: 0 auto 10px;
  background-color: #3498db;  
} 
</style>
<!--
<div class="nice">
    <i class="fas fa-thumbtack"></i>
</div>

<style>
   
</style> -->