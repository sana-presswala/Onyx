<h2 class="text-center mb-4">All Complaints</h2>
<table class="table table-bordered border-dark table-striped border-color-dark mt-5">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Name</th>
        <th>Email-address</th>
        <th>Subject</th>
        <th>Content</th>
        <th>Status</th>
        <th>Mark as resolved</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('../includes/connect.php');
    $get_complaint="SELECT * FROM complaints";
    $result=mysqli_query($con,$get_complaint);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $number++;
        $complaint_id=$row['complaint_id'];
        $name=$row['name'];
        $email=$row['email'];
        $subject=$row['subject'];
        $complaint=$row['complaint'];
        $complaint_status=$row['complaint_status'];
        $select_status="SELECT * FROM complaint_status WHERE id=$complaint_status";
        $result_status=mysqli_query($con,$select_status);
        $row1=mysqli_fetch_assoc($result_status);
        $status=$row1['status'];
        echo "
        <tr>
        <td>$number</td>
        <td>$name</td>
        <td>$email</td>
        <td>$subject</td>
        <td>$complaint</td>
        <td>$status</td>";
        if($complaint_status==1){
        echo "<td><a href='index.php?edit_complaint=$complaint_id' class='text-dark'><i class='fa-solid fa-check'></i></a></td>";}
        else{
        echo "<td><i class='fa-solid fa-check-double'></i></td>";}
        echo "</tr>";
    }
    ?>
    </tbody>
</table>