<?php
    require_once "conn.php";
   $return ='';
   if(isset($_POST['query'])){
        $search =mysqli_real_escape_string($conn,$_POST['query']);
        $query ="SELECT * FROM client
        WHERE ID LIKE '%".$search."%'
        OR LNAME LIKE '%".$search."%'
        OR MI LIKE '%".$search."%'
        OR FNAME LIKE '%".$search."%'
        ";
   }else{
        $query ="SELECT * FROM client";
   }

   $result =mysqli_query($conn, $query);
   
   if(mysqli_num_rows($result) >0){
        $return .='
        <table border="1" width="100%" id="table">
        <tr style="background:rgba(0, 148, 50,1.0);color:#fff">
            <th align="left">ID</th>
            <th align="left">FIRST NAME</th>
            <th align="left">MI</th>
            <th align="left">LAST NAME</th>
            <th align="right">ACTIONS</th>
            <th align="right">ALL<input type="checkbox" id="checkAl"></th>
        </tr> <tbody>';

        while($row =mysqli_fetch_array($result)){
            $return .='
                <tr>
                    <td>'.$row['ID'].'</td>
                    <td>'.$row['FNAME'].'</td>
                    <td>'.$row['MI'].'</td>
                    <td>'.$row['LNAME'].'</td>
                    <td align="right">
                    <a href="edit.php?edit='.$row['ID'].'"><span class="fa fa-edit"></span></a>
                    <a href="delete.php?delete='.$row['ID'].'"><span class="fa fa-trash" style="color:red"></span></a>
                    </td>
                    <td align="right"><input type="checkbox" name="check[]" value="'.$row['ID'].'"></td>
                </tr>
            ';
        }
        '</table>';
        echo $return;
   }else{
        echo '<span style="color:#fff;background:red;padding:5px;width:100%;">No results containing all your search teerms were found!</span>';
   }

?>

 <script>
    $("#checkAl").click(function(){
        $('input:checkbox').not(this).prop('checked',this.checked);
    });
</script>