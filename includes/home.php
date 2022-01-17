<?php
global $wpdb;
$todayDate    = new DateTime();
$stringDate = $todayDate->format('Y-m-d');
$today_post_count = $wpdb->get_var(
    $wpdb->prepare(
        "
            SELECT COUNT(*)
            FROM $wpdb->posts
            WHERE DATE(post_date) = %s
        ",
        $stringDate
    )
);

$total_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post'");
$total_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments");
$total_pages = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='page'");
$total_users = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users");
$total_media = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts where post_type='attachment'");
$total_tags_catgories = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->term_taxonomy");


$categories = get_terms('category');
$categoriesName = [];
$categoriesCount = [];

foreach($categories as $cat){
    array_push($categoriesName, $cat->name);
    array_push($categoriesCount, $cat->count);
}

?>
<main class="bg-gray-200">
  <div class="flex flex-col gap-8 px-2 py-4">
    <div class="text-3xl font-medium">My Wordpress Analytics </div>

    <div id="overview" class="">
      <div class="grid grid-cols-4 grid-rows-2 gap-4">
        <div class="row-span-2">
          <div
            class="flex flex-col content-center items-center shadow-xl bg-sky-700 w-full h-full rounded-xl gap-2 py-5">
            <div class="bg-sky-600 rounded-full px-4 py-2 shadow-lg text-center">
              <i class="fas fa-thumbtack text-4xl text-white"></i>
            </div>
            <h1 class="text-6xl text-white font-bold"><?= $today_post_count ?></h1>
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
              <h1 class="text-4xl font-semibold"><?= $total_posts?></h1>
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
              <h1 class="text-4xl font-semibold"><?= $total_comments?></h1>
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
              <h1 class="text-4xl font-semibold"><?= $total_pages ?></h1>
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
              <h1 class="text-4xl font-semibold"><?=  $total_users?></h1>
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
              <h1 class="text-4xl font-semibold"><?= $total_media ?></h1>
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
              <h1 class="text-4xl font-semibold"><?= $total_tags_catgories ?></h1>
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
        <h3 class="font-semibold text-lg text-gray-500">
          Post By Catagories
        </h3>
        <div id="post-by-catagories-chart" class="py-16"></div>
      </div>
      <!-- Post By Catagories end here -->
      <!-- Top users start here -->
      <div class="bg-white shadow w-full rounded-lg col-span-2">
        <h3 class="font-semibold text-lg text-gray-500 px-5 pt-4">
          Top Users
        </h3>
        <ul class="pt-3">
          <li class="shadow-sm py-2 px-5">
            <div class="flex flex-row gap-3">
              <img class="h-10"
                src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight2&accessoriesType=Sunglasses&hairColor=BlondeGolden&facialHairType=BeardLight&facialHairColor=Black&clotheType=ShirtScoopNeck&clotheColor=Red&eyeType=Surprised&eyebrowType=FlatNatural&mouthType=Smile&skinColor=Tanned" />
              <h3 class="pt-1 text-lg">Michael Belete</h3>
            </div>
          </li>
          <li class="shadow-sm py-2 px-5">
            <div class="flex flex-row gap-3">
              <img class="h-10"
                src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairBigHair&accessoriesType=Prescription02&hairColor=Red&facialHairType=MoustacheMagnum&facialHairColor=Red&clotheType=BlazerShirt&clotheColor=Blue03&eyeType=Squint&eyebrowType=AngryNatural&mouthType=Disbelief&skinColor=Light" />
              <h3 class="pt-1 text-lg">Michael Belete</h3>
            </div>
          </li>
          <li class="shadow-sm py-2 px-5">
            <div class="flex flex-row gap-3">
              <img class="h-10"
                src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight2&accessoriesType=Sunglasses&hairColor=BlondeGolden&facialHairType=BeardLight&facialHairColor=Black&clotheType=ShirtScoopNeck&clotheColor=Red&eyeType=Surprised&eyebrowType=FlatNatural&mouthType=Smile&skinColor=Tanned" />
              <h3 class="pt-1 text-lg">Michael Belete</h3>
            </div>
          </li>
        </ul>
      </div>
      <!-- Top users start here -->
    </div>
    <!-- table start here -->
    <div class="bg-white shadow rounded-lg px-5 py-2">
      <h3 class="font-semibold text-lg text-gray-500 pb-5">Top Users</h3>

      <table id="table">
        <thead>
          <tr>
            <th>Year</th>
            <th>Total Posts</th>
            <th>Total Comments</th>
            <th>Total Media</th>
            <th>Total Word</th>
            <th>Average Comment Per Post</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2000</td>
            <td>20</td>
            <td>400</td>
            <td>40</td>
            <td>800</td>
            <td>2000</td>
          </tr>
          <tr>
            <td>2000</td>
            <td>20</td>
            <td>400</td>
            <td>40</td>
            <td>800</td>
            <td>2000</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- table end here -->
  </div>
  <script>
    var postActivitesOptions = {
      chart: {
        type: "line",
      },
      markers: {
        size: 0,
      },
      series: [
        {
          name: "posts",
          data: [30, 40, 45, 50, 49, 60, 70, 91, 125],
        },
      ],
      xaxis: {
        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
      },
    };

    var postByCategoriesOptions = {
      chart: {
        type: "donut",
      },
      series: [<?php echo '"'.implode('","', $categoriesCount).'"' ?>].map(num => Number(num)),
      labels: [<?php echo '"'.implode('","', $categoriesName).'"' ?>],
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
</main>