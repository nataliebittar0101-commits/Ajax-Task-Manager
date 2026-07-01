<?php require ("db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Lists Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</head>
<body>
    <div class="container mt-5">
    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTaskForm" action="api/add.php" method="post">
                        <div class="form-group">
                            <label for="taskTitle">Task Title</label>
                            <input type="text" class="form-control" name="taskTitle" id="taskTitle" placeholder="Enter task title" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <h2 class="">Task Lists</h2>
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addTaskModal">
            Add Task
        </button>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Title</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td class=""><input type="checkbox" class="form-check-input status"></td>
                    <td>Buy groceries</td>
                </tr> -->
                <?php 
                $sql = "SELECT * FROM tasks";
                $results = $conn->query($sql);
                ?>
                <?php while ($row = $results->fetch_assoc()):?>
                <tr>
                    <?php if ($row['status']==1):?>
                        <td class=""><input type="checkbox" class="form-check-input status"  data-id="<?=$row['id'];?>" checked ></td>
                    <?php else:?>
                        <td class=""><input type="checkbox" class="form-check-input status" data-id="<?=$row['id'];?>"></td>
                    <?php endif;?>
                    <td><?=$row['title'];?></td>
                </tr>
                <?php endwhile;?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
