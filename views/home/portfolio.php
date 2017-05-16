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
                <td><?php echo htmlspecialchars($project['projectName']); ?></td>
                <td><?php echo htmlspecialchars($project['description']); ?></td>
                <td><?php echo htmlspecialchars($project['sampleSite_Link']); ?></td>
                <td><form action="." method="post">
                        <input type="hidden" name="action"
                               value="get_project">
                        <input type="submit" value="Select">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php include '../views/shared/footer.php'; ?>
