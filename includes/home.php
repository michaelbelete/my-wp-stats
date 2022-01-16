<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Stats</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
    />
  </head>

  <body>
    <div class="flex flex-col gap-8 px-2 py-4 ml-32">
      <div class="text-3xl font-medium">My Wordpress Analytics</div>
      <div id="overview" class="">
        <div class="grid grid-cols-4 grid-rows-2 gap-4">
          <div class="row-span-2">
            <div
              class="flex flex-col content-center items-center bg-sky-700 w-full h-full rounded-xl gap-2 py-5"
            >
              <div
                class="bg-sky-600 rounded-full px-4 py-2 shadow-lg text-center"
              >
                <i class="fas fa-thumbtack text-4xl text-white"></i>
              </div>
              <h1 class="text-6xl text-white font-bold">5</h1>
              <p class="text-white">Today Posts</p>
            </div>
          </div>
          <div>
            <!-- card start here -->
            <div
              class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4"
            >
              <h4 class="font-semibold text-gray-500 text-xs uppercase">
                Total Posts
              </h4>
              <div class="flex flex-row gap-3">
                <div
                  class="bg-sky-200 rounded-full px-4 py-2 shadow text-center"
                >
                  <i class="fas fa-thumbtack text-2xl text-sky-600"></i>
                </div>
                <h1 class="text-4xl font-semibold">200</h1>
              </div>
            </div>
            <!-- card end here -->
          </div>
          <div>
            <!-- card start here -->
            <div
              class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4"
            >
              <h4 class="font-semibold text-gray-500 text-xs uppercase">
                Total Comments
              </h4>
              <div class="flex flex-row gap-3">
                <div
                  class="bg-indigo-300 rounded-full px-3 py-2 shadow text-center"
                >
                  <i class="fas fa-comments text-2xl text-indigo-600"></i>
                </div>
                <h1 class="text-4xl font-semibold">200</h1>
              </div>
            </div>
            <!-- card end here -->
          </div>
          <div>
            <!-- card start here -->
            <div
              class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4"
            >
              <h4 class="font-semibold text-gray-500 text-xs uppercase">
                Total Pages
              </h4>
              <div class="flex flex-row gap-3">
                <div
                  class="bg-red-300 rounded-full px-3 py-2 shadow text-center"
                >
                  <i class="fas fa-copy text-2xl text-red-600"></i>
                </div>
                <h1 class="text-4xl font-semibold">200</h1>
              </div>
            </div>
            <!-- card end here -->
          </div>
          <div>
            <!-- card start here -->
            <div
              class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4"
            >
              <h4 class="font-semibold text-gray-500 text-xs uppercase">
                Total Users
              </h4>
              <div class="flex flex-row gap-3">
                <div
                  class="bg-orange-300 rounded-full p-2 shadow text-center"
                >
                  <i class="fas fa-users text-2xl text-orange-600"></i>
                </div>
                <h1 class="text-4xl font-semibold">200</h1>
              </div>
            </div>
            <!-- card end here -->
          </div>
          <div>
            <!-- card start here -->
            <div
              class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4"
            >
              <h4 class="font-semibold text-gray-500 text-xs uppercase">
                Total Media
              </h4>
              <div class="flex flex-row gap-3">
                <div
                  class="bg-teal-300 rounded-full px-3 py-2 shadow text-center"
                >
                  <i class="fa fa-images text-2xl text-teal-600"></i>
                </div>
                <h1 class="text-4xl font-semibold">200</h1>
              </div>
            </div>
            <!-- card end here -->
          </div>
          <div>
            <!-- card start here -->
            <div
              class="flex flex-col gap-2 bg-white drop-shadow hover:drop-shadow-lg rounded-xl px-5 py-4"
            >
              <h4 class="font-semibold text-gray-500 text-xs uppercase">
                Total Tags and Catagories
              </h4>
              <div class="flex flex-row gap-3">
                <div
                  class="bg-pink-300 rounded-full p-2 shadow text-center"
                >
                  <i class="fas fa-tags text-2xl text-pink-600"></i>
                </div>
                <h1 class="text-4xl font-semibold">200</h1>
              </div>
            </div>
            <!-- card end here -->
          </div>
          <!-- <div class="row-span-3">
                <div class="bg-black w-full h-full rounded-xl">1</div>
            </div>
            <div class="col-span-2 ...">
                <div class="bg-red-700 w-full h-full rounded-xl">2</div>
            </div>
            <div class="row-span-2 col-span-2 ...">
                <div class="bg-blue-700 w-full h-full rounded-xl">3</div>
            </div> -->
        </div>
      </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  </body>
</html>
