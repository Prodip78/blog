﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
<?php  
if (isset($_GET['seenid'])) {
$seenid=$_GET['seenid'];
$query="UPDATE contact
                    SET 
                    status='1'
                   where id='$seenid' ";
    $updated_row=$db->update($query);
    if ($updated_row) {
         echo "<span class='success'>Message Sent in the seen box.</span>";
    }else{
       echo "<span class='error'>Somthing went wrong !!</span>"; 
    }


}


?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$query="select * from contact where status='0' order by id desc";
						$msg=$db->select($query);
						if ($msg) {
							$i=0;
							while ($result=$msg->fetch_assoc()) {
								$i++;
						?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' ' .$result['firstname'];?></td>
							<td><?php echo $result['lastname'];?></td>
							<td><?php echo $ft->textStren($result['body'],30);?></td>
							<td><?php echo $ft->formateDate($result['date']);?></td>							
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || 
								<a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a> || 
								<a onclick="return confirm('Are you sure to move this Messages');" href="?seenid=<?php echo $result['id'];?>">Seen</a>  								
							</td>
						</tr>
					<?php } }?>
					</tbody>
				</table>
               </div>
            </div>


   <div class="box round first grid">
       <h2>Message Seen</h2>

<?php 
if (isset($_GET['delid'])) {
	$delid=$_GET['delid'];
	$delquery="delete from contact where id='$delid'";
	$deldb=$db->delete($delquery);
	if ($deldb) {
         echo "<span class='success'>Message Delete Successfully.</span>";
    }else{
       echo "<span class='error'>Message Not Deleted !!</span>"; 
    }
}

?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$query="select * from contact where status='1' order by id desc";
						$msg=$db->select($query);
						if ($msg) {
							$i=0;
							while ($result=$msg->fetch_assoc()) {
								$i++;
						?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' ' .$result['firstname'];?></td>
							<td><?php echo $result['lastname'];?></td>
							<td><?php echo $ft->textStren($result['body'],30);?></td>
							<td><?php echo $ft->formateDate($result['date']);?></td>							
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
								<a onclick="return confirm('Are you sure to delete!');" href="?delid=<?php echo $result['id'];?>">Delete</a> 
							 								
							</td>
						</tr>
					<?php } }?>
					</tbody>
				</table>
               </div>
            </div>

        </div>
        
        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
<?php include 'inc/footer.php';?>
