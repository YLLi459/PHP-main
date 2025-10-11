<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-wirth, initial-scale=1.0">
        <title>Document</title>
        <style>
            table,td,th{
                border:1px solid black;
                border-collapse:collapse;
            }

            td.th{
                padding:10px 20px;
            }
            </style>
         </head>
         <body>
            <?php
            include_once("config.php");
            $sql="SELECT * FROM users";
            $getUsers=$conn->prepare($sql);
            $getUsers->execute();
            $user=$getUsers->fetchAll();
            ?>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>      
                    <th>Email</th>
        </thead>
        <tbody>
        <?php
        foreach($users as $user){
        ?>
            <tr>
                <td><?= $users['id']?></td>      
                <td><?= $users['name']?></td>      
                <td><?= $users['surname']?></td>      
                <td><?= $users['email']?></td>      
                
        </tr>
        <?php
        }
        ?>
</table>
</body>
 </html>     