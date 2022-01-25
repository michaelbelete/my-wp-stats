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

//stats overview
$total_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post'");
$total_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments");
$total_pages = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='page'");
$total_users = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users");
$total_media = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts where post_type='attachment'");
$total_tags_catgories = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->term_taxonomy");

//fetch by catgories
$categories = get_terms('category');
$categoriesName = [];
$categoriesCount = [];

foreach($categories as $cat){
    array_push($categoriesName, $cat->name);
    array_push($categoriesCount, $cat->count);
}

//post activites

$posts = $wpdb->get_results("SELECT COUNT(*) as post_count, CAST(post_date AS DATE) AS post_date FROM $wpdb->posts GROUP BY CAST(post_date AS DATE) ORDER BY post_date ASC");
$post_dates = [];
$post_counts = [];

foreach ( $posts as $post ) {
  array_push($post_dates, $post->post_date);
  array_push($post_counts, $post->post_count);
}

// $users = $wpdb->get_results("SELECT COUNT(*) as post_count, wp_users.display_name FROM wp_posts INNER JOIN wp_users ON wp_posts.post_author = wp_users.ID GROUP BY wp_posts.post_author ORDER BY post_count DESC LIMIT 5");
$users = $wpdb->get_results("SELECT COUNT(*) as post_count, wp_users.display_name FROM $wpdb->posts wp_posts INNER JOIN $wpdb->users wp_users ON wp_posts.post_author = wp_users.ID GROUP BY wp_posts.post_author ORDER BY post_count DESC LIMIT 5");
?>
<div class="flex flex-col gap-8 px-2 py-4">
  <div class="text-3xl font-medium">My Wordpress Analytics</div>
  <div id="overview" class="">
    <div class="grid grid-cols-4 grid-rows-2 gap-4">
      <div class="row-span-2">
        <div class="flex flex-col content-center items-center shadow-xl bg-sky-700 w-full h-full rounded-xl gap-2 py-5">
          <div class="bg-sky-600 rounded-full px-4 py-2 shadow-lg text-center">
            <i class="fas fa-thumbtack text-4xl text-white"></i>
          </div>
          <h1 class="text-6xl text-white font-bold">
            <?= $today_post_count ?>
          </h1>
          <p class="text-white">Today Posts</p>
          
        </div>
      </div>
      <div>
        <!-- card start here -->
        <div class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4">
          <h4 class="font-semibold text-gray-500 text-xs uppercase">
            Total Posts
          </h4>
          <div class="flex flex-row gap-3">
            <div class="bg-sky-200 rounded-full px-4 py-2 shadow text-center">
              <i class="fas fa-thumbtack text-2xl text-sky-600"></i>
            </div>
            <h1 class="text-4xl font-semibold">
              <?= $total_posts?>
            </h1>
          </div>
        </div>
        <!-- card end here -->
      </div>
      <div>
        <!-- card start here -->
        <div class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4">
          <h4 class="font-semibold text-gray-500 text-xs uppercase">
            Total Comments
          </h4>
          <div class="flex flex-row gap-3">
            <div class="bg-indigo-300 rounded-full px-3 py-2 shadow text-center">
              <i class="fas fa-comments text-2xl text-indigo-600"></i>
            </div>
            <h1 class="text-4xl font-semibold">
              <?= $total_comments?>
            </h1>
          </div>
        </div>
        <!-- card end here -->
      </div>
      <div>
        <!-- card start here -->
        <div class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4">
          <h4 class="font-semibold text-gray-500 text-xs uppercase">
            Total Pages
          </h4>
          <div class="flex flex-row gap-3">
            <div class="bg-red-300 rounded-full px-3 py-2 shadow text-center">
              <i class="fas fa-copy text-2xl text-red-600"></i>
            </div>
            <h1 class="text-4xl font-semibold">
              <?= $total_pages ?>
            </h1>
          </div>
        </div>
        <!-- card end here -->
      </div>
      <div>
        <!-- card start here -->
        <div class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4">
          <h4 class="font-semibold text-gray-500 text-xs uppercase">
            Total Users
          </h4>
          <div class="flex flex-row gap-3">
            <div class="bg-orange-300 rounded-full p-2 shadow text-center">
              <i class="fas fa-users text-2xl text-orange-600"></i>
            </div>
            <h1 class="text-4xl font-semibold">
              <?=  $total_users?>
            </h1>
          </div>
        </div>
        <!-- card end here -->
      </div>
      <div>
        <!-- card start here -->
        <div class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4">
          <h4 class="font-semibold text-gray-500 text-xs uppercase">
            Total Media
          </h4>
          <div class="flex flex-row gap-3">
            <div class="bg-teal-300 rounded-full px-3 py-2 shadow text-center">
              <i class="fa fa-images text-2xl text-teal-600"></i>
            </div>
            <h1 class="text-4xl font-semibold">
              <?= $total_media ?>
            </h1>
          </div>
        </div>
        <!-- card end here -->
      </div>
      <div>
        <!-- card start here -->
        <div class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4">
          <h4 class="font-semibold text-gray-500 text-xs uppercase">
            Total Tags and Catagories
          </h4>
          <div class="flex flex-row gap-3">
            <div class="bg-pink-300 rounded-full p-2 shadow text-center">
              <i class="fas fa-tags text-2xl text-pink-600"></i>
            </div>
            <h1 class="text-4xl font-semibold">
              <?= $total_tags_catgories ?>
            </h1>
          </div>
        </div>
        <!-- card end here -->
      </div>
    </div>
  </div>
  <!-- overview end here -->
  <div class="grid grid-cols-9 gap-4">
    <!-- post Activites start here -->
    <div class="bg-white shadow w-full rounded-lg px-5 py-4 col-span-4"> 
      <h3 class="font-semibold text-lg text-gray-500">Post Activites</h3>
      <div id="post-activites-chart"></div>
    </div>
    <!-- post Activites end here -->

    <!--  Post By Catagories start here -->
    <div class="bg-white shadow w-full rounded-lg px-5 py-4 col-span-3">
      <h3 class="font-semibold text-lg text-gray-500">Post By Catagories</h3>
      <div id="post-by-catagories-chart" class="py-16"></div>
    </div>
    <!-- Post By Catagories end here -->
    <!-- Top users start here -->
    <div class="bg-white shadow w-full rounded-lg col-span-2">
      <h3 class="font-semibold text-lg text-gray-500 px-5 pt-4">Top Users</h3>
      <ul class="pt-3">
        <?php
        foreach($users as $user){
        ?>
        <li class="shadow-sm py-2 px-5">
          <div class="flex flex-row gap-3">
            <img class="h-12 rounded-full"
              src="https://ui-avatars.com/api/?name=<?=$user->display_name?>&&background=random&&size=80" />
              <div class="">
                <h3 class="text-lg"><?= $user->display_name ?></h3>
                <span class="text-xs bg-gray-600 px-2 text-white rounded-2xl"><?=  $user->post_count?> posts</span>
              </div>
          </div>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
    <!-- Top users start here -->
  </div>
  <!-- table start here -->
  <div class="bg-white shadow rounded-lg px-5 py-2">
    <h3 class="font-semibold text-lg text-gray-500 pb-5">User Activites</h3>

    <table id="table">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th># Published Pages</th>
          <th># Publish Posts</th>
          <th># Uploaded Files</th>
          <th># Access Private Pages</th>
          <th># Access Private Posts</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach(get_users() as $user) {
        ?>
        <tr>
          <td><?=  $user->display_name?></td>
          <td><?= $user->user_email ?></td>
          <td><?php
            foreach($user->roles as $role) {
              echo "<div class='bg-gray-700 text-white rounded-3xl text-center capitalize'>$role</div>";
            }
          ?></td>
          <td><?= ($user->allcaps['publish_pages'] == '') ? 0: $user->allcaps['publish_pages']?></td>
          <td><?= ($user->allcaps['publish_posts'] == '') ? 0 : $user->allcaps['publish_posts']?></td>
          <td><?= ($user->allcaps['upload_files'] == '') ? 0 : $user->allcaps['upload_files']?></td>
          <td><?= ($user->allcaps['read_private_pages'] == '') ? 0:$user->allcaps['read_private_pages'] ?></td>
          <td><?= ($user->allcaps['read_private_posts'] == '') ? 0:$user->allcaps['read_private_posts'] ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- table end here -->
</div>
<script>

  const main_post_counts = [<?= '"'.implode('","', $post_counts).'"' ?>].map(num => Number(num));
  const main_post_dates =  [<?= '"'.implode('","', $post_dates).'"' ?>];

  var postActivitesOptions = {
    chart: {
      type: "line",
    },
    markers: {
      size: 0,
    },
    stroke: {
      curve: 'smooth',
    },
    series: [
      {
        name: "posts",
        data: main_post_counts,
      },
    ],
    xaxis: {
      categories: main_post_dates,
    },
  };

  var postByCategoriesOptions = {
    chart: {
      type: "donut",
    },
    series: [<?= '"'.implode('","', $categoriesCount).'"' ?>].map(num => Number(num)),
    labels: [<?= '"'.implode('","', $categoriesName).'"' ?>],
    plotOptions: {
      pie: {
        expandOnClick: true,
      },
    },
  };

  var postActivitesChart = new ApexCharts(
    document.querySelector("#post-activites-chart"),
    postActivitesOptions
  );
  var postByCategories = new ApexCharts(
    document.querySelector("#post-by-catagories-chart"),
    postByCategoriesOptions
  );

  postActivitesChart.render();
  postByCategories.render();

  var dataTable = new DataTable("#table");
</script>