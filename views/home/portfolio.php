<?php include '../views/shared/header.php'; ?>
<main>
 <h2>Select Project</h2>


    <!-- display a table of technicians -->
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($projects as $project) : ?>
            <tr>
                <td><?php echo htmlspecialchars($project->getprojectName()); ?></td>
                <td><?php echo htmlspecialchars($project->getdescription()); ?></td>
                <td><?php echo htmlspecialchars($project->getsampleLink()); ?></td>
                <td><form action="." method="post">
                        <input type="hidden" name="action"
                               value="get_project">
                        <input type="hidden" name="Name"
                               value="<?php echo htmlspecialchars($project->getprojectName()); ?>">
                        <input type="hidden" name="Description"
                               value="<?php echo htmlspecialchars($project->getdescription()); ?>">
                        <input type="hidden" name="Image"
                               value="<?php echo htmlspecialchars($project->getsampleLink()); ?>">
                        <input type="submit" value="Select">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="?action=display_customer_get">Make an Incident</a></p>
</main>
<?php include '../views/shared/footer.php'; ?>
