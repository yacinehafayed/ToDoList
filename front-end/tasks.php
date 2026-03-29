<?php
session_start();
require_once '../first-backeend/db.php';
require_once '../first-backeend/auth_check.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE UserId =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<title>My Tasks</title>
</head>
<body>
<!-- Navbar -->
<?php include 'navbar.php'; ?>
<!-- Sidebar -->
<?php include 'sidebar.php'; ?>
<main class="content">
    <div class="title">
    <h2>My Tasks</h2>
    <p>Create, edit, and manage your tasks below</p>
    </div>

    
    <div class="task-form" >
    <form class="task-form" action="../first-backeend/tasks.php" method="post">
    <input type="text" name="task_name" id="taskName" placeholder="Task name" required>
    <input type="date" name="task_date" id="taskDate" required>
    <textarea id="taskDesc" name="task_description" placeholder="Task description..." required></textarea>
    <button id="addTaskBtn" name="add_task_btn" type="submit"><i class="fa fa-plus"></i> Add Task</button>
    </form>
    </div>
    
   <ul id="taskList" class="task-list">

<?php if($result->num_rows == 0): ?>
    <p>No tasks yet.</p>
<?php endif; ?>

<?php while($row = $result->fetch_assoc()): ?>
    <li class="task-item">

        <div class="task-header">
            <h4><?= htmlspecialchars($row['TaskName']) ?></h4>
            <span class="task-date"><?= htmlspecialchars($row['TaskDate']) ?></span>
        </div>

        <p class="task-desc">
            <?= htmlspecialchars($row['TaskDescription']) ?>
        </p>

        <div class="task-actions">

            <!-- DELETE -->
            <form action="../first-backeend/action.php" method="POST">
                <input type="hidden" name="task_id" value="<?= $row['TaskId'] ?>">
                <button type="submit" name="action" value="delete">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>

            <!-- EDIT BUTTON -->
            <button type="button" onclick="showEditForm(<?= $row['TaskId'] ?>)">
                <i class="fa fa-pencil"></i> Edit
            </button>

            <form action="../first-backeend/action.php" method="POST">
    <input type="hidden" name="task_id" value="<?= $row['TaskId'] ?>">
    <button type="submit" name="action" value="finish">Finish</button>
            </form>


        </div>

        <!-- EDIT FORM -->
        <div id="edit-form-<?= $row['TaskId'] ?>" style="display:none;">
            <form action="../first-backeend/action.php" method="POST">

                <input type="hidden" name="task_id" value="<?= $row['TaskId'] ?>">

                <input type="text" name="task_name" value="<?= htmlspecialchars($row['TaskName']) ?>">
                <input type="date" name="task_date" value="<?= htmlspecialchars($row['TaskDate']) ?>">
                <textarea name="task_description"><?= htmlspecialchars($row['TaskDescription']) ?></textarea>

                <button type="submit" name="action" value="update">Save</button>

            </form>
        </div>
        <span class="task-status">
    <?= htmlspecialchars($row['status']) ?>
        </span>


    </li>
<?php endwhile; ?>

</ul>

    </ul>
</main>

<script src="./scripts.js"></script>
</body>
</html>
