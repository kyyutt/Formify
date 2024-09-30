<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kuisioner</title>
</head>
<body>
    <h1>Data Kuisioner</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Field 1</th>
            <th>Field 2</th>
            <th>Field 3</th>
        </tr>
        <?php if(!empty($kuisioners)): ?>
            <?php foreach($kuisioners as $kuisioner): ?>
                <tr>
                    <td><?= $kuisioner['id']; ?></td>
                    <td><?= $kuisioner['field1']; ?></td>
                    <td><?= $kuisioner['field2']; ?></td>
                    <td><?= $kuisioner['field3']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No data found</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
