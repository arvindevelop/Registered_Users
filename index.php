<?php
error_reporting(0);
include_once('includes/config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>HOME | Registered_Users</title>
  </head>
  <body>
			
		<div class="container">
				
			<?php 
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } 
                else {
                    $pageno = 1;
                }

                //pagination
                $no_of_records_per_page = 3;
                $offset = ($pageno-1) * $no_of_records_per_page;
                $total_pages_sql = "SELECT COUNT(*) FROM users";
                $ret1=mysqli_query($con,"select COUNT(*) from users");
                $total_rows = mysqli_fetch_array($ret1)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $query=mysqli_query($con,"select * from users LIMIT $offset, $no_of_records_per_page");
            ?>
            <table class="table table-hover mt-5 text-center" border="2px">
                <thead>
                    <tr  align="center">
                        <th colspan="5">REGISTERED USERS</th>
                    </tr>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">password</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                while ($row=mysqli_fetch_array($query)) {
            ?>
					<tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                    </tr>
            <?php }?>
                </tbody>
            </table>
			
			</div>
            <div class="pagination-container">
                <table class="pagination1 table-bordered">
                    <th><a href="?pageno=1"><strong>First></strong></a></th>
                    <th class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
                    </th>
                    <th class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
                    </th>
                    <th><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></th>
                </table>
            </div>
		</div>

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>