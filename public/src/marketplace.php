<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Find A Work</title>
  <link rel="stylesheet" href="../assets/dist/output.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css" />
  <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
  <?php require '../../includes/header.php'; ?>

  <div class="bg-gray-100 dark:bg-gray-900">
    <div>
      <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">
          <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl dark:bg-gray-900">
            <div class="flex items-center justify-between px-4">
              <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                Filters
              </h2>
              <button type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400 dark:bg-gray-900">
                <span class="sr-only dark:text-white">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <!-- Filters -->
            <form class="mt-4 border-t border-gray-200">
              <h3 class="sr-only">Categories</h3>
              <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                <li>
                  <a href="#" class="block px-2 py-3 dark:text-white">It & Development</a>
                </li>
                <li>
                  <a href="#" class="block px-2 py-3 dark:text-white">Design</a>
                </li>
                <li>
                  <a href="#" class="block px-2 py-3 dark:text-white">Video Editing</a>
                </li>
                <li>
                  <a href="#" class="block px-2 py-3 dark:text-white">Translation</a>
                </li>
                <li>
                  <a href="#" class="block px-2 py-3 dark:text-white">Micro Services</a>
                </li>
              </ul>

              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-0" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Payment Terms</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-0">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-color-0" name="color[]" value="all" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">All</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-2" name="color[]" value="hourly" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Hourly</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-3" name="color[]" value="fixed-price" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Fixed Price</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-0" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Level</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-0">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-color-0" name="color[]" value="all" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">Expert</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-2" name="color[]" value="hourly" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Intermediate</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-color-3" name="color[]" value="fixed-price" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Beginner</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-1" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Quotes Received</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-1">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-category-0" name="category[]" value="any" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">Any</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-1" name="category[]" value="below-10" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Below 10</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-2" name="category[]" value="below-20" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Below 20</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-3" name="category[]" value="below-30" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Below 30</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-category-4" name="category[]" value="below-50" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Below 50</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500 dark:bg-gray-900" aria-controls="filter-section-mobile-2" aria-expanded="false">
                    <span class="font-medium text-gray-900 dark:text-white">Location</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-mobile-2">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-mobile-size-0" name="size[]" value="united-states" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">United States (57)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-1" name="size[]" value="india" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">India (22)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-2" name="size[]" value="united-kingdom" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">United Kingdom (8)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-3" name="size[]" value="canada" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">
                        Canada (7)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-4" name="size[]" value="philippines" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">Philippines (5)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-mobile-size-5" name="size[]" value="moroccco" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                      <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500">Morocco (2)</label>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
            Find Freelance Jobs
          </h1>

          <div class="relative inline-block text-left">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-2" class="inline-flex py-2 pr-4 pl-3 cursor-pointer text-black lg:p-0 dark:text-white" type="button">
              Sort
              <svg class="h-5 w-5 ml-2.5 mt-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown-2" class="absolute right-0 hidden z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl focus:outline-none dark:bg-gray-800">
              <div class="py-1">
                <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm dark:text-white" role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>
                <a href="#" class="text-gray-500 dark:text-gray-400 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</a>
                <a href="#" class="text-gray-500 dark:text-gray-400 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Newest</a>
                <a href="#" class="text-gray-500 dark:text-gray-400 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</a>
                <a href="#" class="text-gray-500 dark:text-gray-400 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</a>
              </div>
            </div>

            <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
              <span class="sr-only">View grid</span>
              <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z" clip-rule="evenodd" />
              </svg>
            </button>
            <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
              <span class="sr-only">Filters</span>
              <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>

        <section aria-labelledby="products-heading" class="pb-24 pt-6">
          <h2 id="products-heading" class="sr-only">Products</h2>

          <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
            <!-- Filters -->
            <form class="hidden lg:block">
              <h3 class="sr-only dark:text-white">Categories</h3>
              <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900 dark:text-white">
                <li>
                  <a href="#">IT & Development</a>
                </li>
                <li>
                  <a href="#">Design</a>
                </li>
                <li>
                  <a href="#">Video Editing</a>
                </li>
                <li>
                  <a href="#">Translation</a>
                </li>
                <li>
                  <a href="#">Micro Services</a>
                </li>
              </ul>

              <div class="mt-12 space-y-8">
                <!-- payment -->
                <details class="group [&_summary::-webkit-details-marker]:hidden" open>
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg text-gray-900 dark:text-white">
                    <h3 class="font-medium">Payment Terms</h3>

                    <svg class="h-5 w-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                  </summary>

                  <div class="pt-6 pl-3 dark:text-white" id="filter-section-0">
                    <div class="space-y-4">
                      <div class="flex items-center">
                        <input id="filter-mobile-color-0" name="color[]" value="all" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">All</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-color-2" name="color[]" value="hourly" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Hourly</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-color-3" name="color[]" value="fixed-price" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Fixed Price</label>
                      </div>
                    </div>
                  </div>
                </details>
                <!-- level -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg text-gray-900 dark:text-white">
                    <h3 class="font-medium">Level</h3>

                    <svg class="h-5 w-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                  </summary>
                  <div class="pt-6 pl-3 dark:text-white" id="filter-section-0">
                    <div class="space-y-4">
                      <div class="flex items-center">
                        <input id="filter-mobile-category-0" name="category[]" value="any" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">Expert</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-category-1" name="category[]" value="below-10" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Intermediate</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-category-2" name="category[]" value="below-20" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Beginner</label>
                      </div>
                    </div>
                  </div>
                </details>
                <!-- quotes -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg text-gray-900 dark:text-white">
                    <h3 class="font-medium">Quotes Received</h3>

                    <svg class="h-5 w-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                  </summary>
                  <div class="pt-6 pl-3 dark:text-white" id="filter-section-0">
                    <div class="space-y-4">
                      <div class="flex items-center">
                        <input id="filter-mobile-category-0" name="category[]" value="any" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">Any</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-category-1" name="category[]" value="below-10" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Below 10</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-category-2" name="category[]" value="below-20" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Below 20</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-category-3" name="category[]" value="below-30" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Below 30</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-category-4" name="category[]" value="below-50" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Below 50</label>
                      </div>
                    </div>
                  </div>
                </details>
                <!-- location -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg text-gray-900 dark:text-white">
                    <h3 class="font-medium">Location</h3>
                    <svg class="h-5 w-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                  </summary>

                  <div class="pt-6 pl-3 dark:text-white" id="filter-section-0">
                    <div class="space-y-4">
                      <div class="flex items-center">
                        <input id="filter-mobile-size-0" name="size[]" value="united-states" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">United States (57)</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-size-1" name="size[]" value="india" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">India (22)</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-size-2" name="size[]" value="united-kingdom" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">United Kingdom (8)</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-size-3" name="size[]" value="canada" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">
                          Canada (7)</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-size-4" name="size[]" value="philippines" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">Philippines (5)</label>
                      </div>
                      <div class="flex items-center">
                        <input id="filter-mobile-size-5" name="size[]" value="moroccco" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500" />
                        <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500">Morocco (2)</label>
                      </div>
                    </div>
                  </div>
                </details>
              </div>
            </form>

            <!-- Product grid -->
            <?php
            $Query = 'SELECT * FROM projects';
            $result = mysqli_query($conn, $Query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $Title = $row['ProjectTitle'];
                $Desc = $row['Description'];
                $Date = $row['Created'];
            ?>
                <div class="lg:col-span-3">
                  <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-wrap -m-4">
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full ring-1 rounded-lg ring-gray-300 dark:ring-gray-700 bg-white dark:bg-gray-900">
                          <h3 class="text-gray-900 font-bold text-lg p-2 lg:p-4 lg:text-xl tracking-widest title-font mb-1 dark:text-white">
                            <a href="./error404.php"><?= $Title ?> </a>
                          </h3>
                          <p class="text-sm text-gray-400 pl-2 lg:pl-4">
                            <?= $Date ?>
                          </p>
                          <ul class="pl-2 py-4 lg:pt-4 lg:py-6 flex gap-20">
                            <li>
                              <p class="text-black font-semibold dark:text-white">
                                $1,000
                              </p>
                              <p class="text-sm pt-1 dark:text-gray-400">
                                Fixed-price
                              </p>
                            </li>
                            <li>
                              <p class="text-black font-semibold dark:text-white">
                                Intermediate
                              </p>
                              <p class="text-sm pt-1 dark:text-gray-400">
                                Experience level
                              </p>
                            </li>
                          </ul>
                          <p class="text-gray-400 truncate pl-2 lg:pl-4">
                          <?= $Desc ?> 
                          </p>
                          <div>
                            <ul class="pl-2 py-4 lg:pt-4 lg:py-10 flex gap-5">
                              <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                website
                              </li>
                              <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                HTML
                              </li>
                              <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                CSS
                              </li>
                              <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                JavaScript
                              </li>
                              <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                Web Flow
                              </li>
                              <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                User Experience
                              </li>
                            </ul>
                            <div class="pl-2 py-4 lg:pt-4 lg:py-10">
                              <a href="./error404.php" class="bg-orange-600 text-white rounded-3xl py-2 px-4 text-sm font-semibold">See more</a>
                            </div>
                          </div>
                        </div>
                    <?php
                  }
                } else {
                  echo '<h3> NONE FOUND </h3>';
                }
                    ?>
                      </div>
                    </div>
                  </section>
                  <div class="flex">
                    <!-- Previous Button -->
                    <a href="#" class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                      Previous
                    </a>

                    <!-- Next Button -->
                    <a href="#" class="flex items-center justify-center px-4 h-10 ml-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                      Next
                    </a>
                  </div>
                </div>
          </div>
        </section>
      </main>
    </div>
  </div>
  <?php include '../../includes/footer.php'; ?>

  <script src="../assets/js/theme.js"></script>
</body>

</html>