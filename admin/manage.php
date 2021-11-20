<?php
    include_once("gem/header.php");
?>
<style>
    th{
        border-right:4px solid rgb(216, 216, 216);
    }
</style>
<!-- manage admin  -->
        <div class="con">
            <div class="conTitle bold">Manage Admin</div>
            <?php 
                if(checkSession('username')){
                    echo "<div style='color:green; margin-bottom:20px;'>Register is successful.</div>";
                    unsetSession('username');
                }
                if(checkSession('delete')){
                    echo $_SESSION['delete'];
                    unsetSession('delete');
                }
                if(checkSession('update')){
                    echo $_SESSION['update'];
                    unsetSession('update');
                }
                if(checkSession('change_pass')){
                    echo $_SESSION['change_pass'];
                    unsetSession('change_pass');
                }
                
            ?>
            <a href="addAdmin.php?tag=admin" class="btn-sm btn-primary">Add Admin</a>
            <div>
                <table>
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    
                        <?php 
                            $result = getData('tbl_admin');
                            $list="";
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $fullName = $row['full_name'];
                                $userName = $row['username'];
                                $list++;
                                echo "<tr>";
                                echo "<td>".$list." .</td>";
                                echo "<td>".$fullName."</td>";
                                echo "<td>".$userName."</td>";
                                echo "<td>
                                <a href='updateData.php?id=$id&tag=admin' class='btn-sm btn-success'>Edit</a>
                                <a href='pass_change.php?id=$id&tag=admin' class='btn-sm btn-primary'>Password Change</a>
                                <a href='confirmDelete.php?id=$id' class='btn-sm btn-danger'>Delete</a>
                                </td>";
                                echo "</tr>";
                            }
                        ?>
                      
                    
                </table>
            </div>
        </div>
<!-- manage admin  -->


<?php
    include_once("gem/footer.php");
?>