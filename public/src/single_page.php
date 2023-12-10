<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia">
    <meta name="author" content="Soulaiman Bouhlal">
    <meta name="description" content="this page is an html project was given in a bootcamp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dist/output.css" />
    <title></title>
</head>

<body class="dark:bg-gray-900">
    <?php include '../../includes/header.php' ?>
    <?php
    if (isset($_GET['id'])) {
        $id_project = $_GET['id'];
        $query = 'SELECT projects.*, users.UserName, users.profile_picture, GROUP_CONCAT(tags.tag_name) AS project_tags
                   FROM projects
                   LEFT JOIN Projects_tags ON projects.ProjectID = Projects_tags.projectID
               LEFT JOIN tags ON Projects_tags.tagID = tags.id
               WHERE projects.ProjectID = ?
               GROUP BY projects.ProjectID';
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id_project);
        mysqli_stmt_execute($stmt);

        // Fetch the data from the result set
        $res = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($res)) :
            $tags = explode(',', $row['project_tags']);

    ?>
            <div id="Project_title" class="container mx-auto my-32 p-5">
                <div id="title" class="bg-white dark:bg-gray-800 border mt-5 rounded-xl border-gray-300 p-5 dark:border-gray-700 shadow-md flex flex-col " id="Project_title">
                    <h3 class="text-left mr-96 text-3xl text-gray-700 tracking-widest dark:text-white font-mono font-bold "><?= $row['ProjectTitle']; ?></h3>
                </div>
                <div class="bg-white dark:bg-gray-800 border mt-5 rounded-xl border-gray-300 p-5 dark:border-gray-700 shadow-md flex flex-col ">
                    <div class="text-gray-700 dark:text-gray-400">
                        <div class="grid md:grid-cols-1 text-sm ">
                            <div class="grid grid-cols-1 ">
                                <div class="px-4 py-2 font-semibold text-xl text-gray-700 dark:text-gray-300">Description</div>
                                <div class="px-4 py-2 text-gray-700 dark:text-gray-400 text-lg "><?= $row['Description']; ?></div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-300">Created At</div>
                                <div class="px-4 py-2 text-gray-700 dark:text-gray-400 text-lg "><?= $row['Created']; ?></div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-300">Deadline</div>
                                <div class="px-4 py-2 text-gray-700 dark:text-gray-400 text-lg "><?= $row['deadline']; ?></div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-300">Demanded Price</div>
                                <div class="px-4 py-2 text-gray-700 dark:text-gray-400 text-lg "><?= $row['price'] . ' $'; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 border mt-5 rounded-xl border-gray-300 p-5 dark:border-gray-700 shadow-md flex flex-col ">
                    <h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">TARGETED TAGS</h3>
                    <div>
                        <ul class="pl-2 py-4 lg:pt-4 lg:py-10 flex gap-5">
                            <?php foreach ($tags as $tag) : ?>
                                <li class="bg-orange-300 text-orange-600 rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                    <?= $tag ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
    <?php
        endif;
    }

    ?>


</body>
<script src="../assets/js/theme.js"></script>

</html>