<?php
require '../../config/Connect.php';

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    // Check if input is not empty
    if (!empty($input)) {
        $query = "SELECT projects.*, users.UserName, GROUP_CONCAT(tags.tag_name) AS project_tags
                  FROM projects
                  INNER JOIN users ON projects.UserID = users.UserID
                  LEFT JOIN projects_tags ON projects.ProjectID = projects_tags.ProjectID
                  LEFT JOIN tags ON projects_tags.TagID = tags.Tag_id
                  WHERE UserName LIKE '%$input%' OR ProjectTitle LIKE '%$input%' 
                  GROUP BY projects.ProjectID";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['ProjectID'];
                $Title = $row['ProjectTitle'];
                $Desc = $row['Description'];
                $Date = $row['Created'];
                $owner = $row['UserName'];
                $tags = explode(',', $row['project_tags']);
                $deadline = $row['deadline'];
                $price = $row['price'];
            ?>

                <div id="project_data" class="lg:w-1/4 md:w-1/2 p-4 w-full ring-1 rounded-lg mt-5 ring-gray-300 dark:ring-gray-700 bg-white dark:bg-gray-900">
                    <div class="flex justify-between">
                        <h3 class="text-gray-900 font-bold text-lg p-2 lg:p-4 lg:text-xl tracking-widest title-font mb-1 dark:text-white">
                            <a href="./single_page.php?id=<?= $id ?>"><?= $Title ?> </a>
                        </h3>
                        <p class="text-sm text-gray-400 pl-2 lg:pl-4">
                            Posted by <?= $owner ?>
                        </p>
                    </div>
                    <p class="text-sm text-gray-400 pl-2 lg:pl-4">
                        <?= $Date ?>
                    </p>
                    <ul class="pl-2 py-4 lg:pt-4 lg:py-6 flex gap-20">
                        <li>
                            <p class="text-black font-semibold dark:text-white">
                                Fixed-price
                            </p>
                            <p class="text-sm pt-1 dark:text-gray-400">
                                <?= $price . ' $' ?>
                            </p>
                        </li>
                        <li>
                            <p class="text-black font-semibold dark:text-white">
                                Deadline
                            </p>
                            <p class="text-sm pt-1 dark:text-gray-400">
                                <?= $deadline ?>
                            </p>
                        </li>
                    </ul>
                    <div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" class="text-gray-400 truncate  pl-2 lg:pl-4">
                        <?= $Desc ?>
                    </div>
                    <div>
                        <ul class="pl-2 py-4 lg:pt-4 lg:py-10 flex gap-5">
                            <?php foreach ($tags as $tag) : ?>
                                <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                    <?= $tag ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="pl-2 py-4 lg:pt-4 lg:py-10">
                            <a href="./single_page.php?id=<?= $id ?>" class="bg-orange-600 text-white rounded-3xl py-2 px-4 text-sm font-semibold">See more</a>
                        </div>
                    </div>
                </div>


        <?php
            }
        }
    }
}
?>