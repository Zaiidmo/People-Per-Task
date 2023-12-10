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
        $query = 'SELECT projects.*, users.UserName, GROUP_CONCAT(tags.tag_name) AS project_tags
                  FROM projects
                  INNER JOIN users ON projects.UserID = users.UserID
                  LEFT JOIN projects_tags ON projects.ProjectID = projects_tags.ProjectID
                  LEFT JOIN tags ON projects_tags.TagID = tags.Tag_id
                  WHERE projects.ProjectID = ?
                  GROUP BY projects.ProjectID';
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id_project);
        mysqli_stmt_execute($stmt);

        // Fetch the data from the result set
        $res = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($res)) {
            $tags = explode(',', $row['project_tags']);
        }
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
                            <div class="px-4 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-300">Posted By</div>
                            <div class="px-4 py-2 text-gray-700 dark:text-gray-400 text-lg "><?= $row['UserName']; ?></div>
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
                <h3 class="text-left px-4 py-2 mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">TARGETED TAGS</h3>
                <div>
                    <ul class="pl-2 py-4 lg:pt-4 lg:py-10 flex gap-5">
                        <?php foreach ($tags as $tag) : ?>
                            <li class="bg-orange-300 text-black rounded-3xl py-1.5 px-3 text-xs font-semibold">
                                <?= $tag ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php if (isset($_SESSION['UserID']) && $_SESSION['UserType'] === 'Freelancer') : ?>
                <?php $freelanceIDQuery = "SELECT FreelanceID FROM freelances WHERE UserID = ?";
                $stmtFreelanceID = mysqli_prepare($conn, $freelanceIDQuery);
                mysqli_stmt_bind_param($stmtFreelanceID, "i", $_SESSION['UserID']);
                mysqli_stmt_execute($stmtFreelanceID);
                $resultFreelanceID = mysqli_stmt_get_result($stmtFreelanceID);

                // Fetch the FreelanceID
                $rowFreelanceID = mysqli_fetch_assoc($resultFreelanceID);
                $freelanceID = $rowFreelanceID['FreelanceID']; ?>
                <div class="bg-white dark:bg-gray-800 border mt-5 rounded-xl border-gray-300 p-5 dark:border-gray-700 shadow-md flex flex-col ">
                    <h3 class="px-4 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-300">Submit a Proposal</h3>
                    <div class="flex flex-col text-center justify-center items-center px-5 ">
                        <form action="../../app/controllers/process_proposal.php" method="post" class="space-y-8 flex flex-col justify-center w-full md:w-1/2 ">
                            <input type="hidden" name="project_id" value="<?= $id_project ?> ">
                            <input type="hidden" name="freelancer_id" value="<?= $freelanceID ?>">

                            <label for="amount" class="text-left px-4 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">AMOUNT:</label>
                            <input type="number" id="amount" name="amount" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder=" $$$$" required>

                            <!-- Deadline -->
                            <label for="deadline" class="text-left px-4 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">DEADLINE:</label>
                            <input type="date" id="deadline" name="deadline" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>

                            <label for="proposal" class="text-left px-4 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">PROPOSAL:</label>
                            <textarea id="proposal" name="proposal" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" rows="4"></textarea>

                            <!-- Submit Button -->
                            <button type="submit" class="self-center font-extrabold py-3 px-5 text-sm text-center text-white rounded-xl bg-primary-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">SUBMIT PROPOSAL</button>
                        </form>
                    </div>
                </div>
            <?php endif ?>
        </div>
    <?php
    }



    ?>


</body>
<script src="../assets/js/theme.js"></script>

</html>