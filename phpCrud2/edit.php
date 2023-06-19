<?php
    include "conn.php";

    $id =$_GET['edit'];
    
    $sql ="SELECT * FROM client WHERE ID ='$id'";
    $query=$conn->query($sql);
    $row =$query->fetch_assoc();
?>

<style>
body{
    background:url(img/green2.jpg);
    font-family: arial;
}
.container {
        margin:auto;
        margin-top:100px;
        width:700px;
        border:1px solid gray;
        border-radius:3px;
        padding:10px;
        background:#fff;
        font-size:10pt;
    
}
input[type=text]{
        width:100%;
       padding:10px;
        border: 1px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
        border-radius:3px;
    }
    input[type=text]:focus{
        border: 1px solid green;
        border-radius:3px;
    }
    tr td{
        padding: 5px;
        font-size:10pt;
    }
    #submit{
        padding: 10px;
        background:rgba(106, 176, 76,1.0);
        color:#fff;
        border-radius:3px;
        border:none;
        cursor: pointer;
        width: 100%;
    }
    #submit:hover{
        background:rgba(0, 148, 50,1.0);
    }

</style>



<div class="container">

<h1 style="margin-left:330px;">EDIT</h1>
<form action="update.php" method="post">
    <table width="100%">
    <tr>
            <td>ID NUMBER</td>
            <td><input type="text" value="<?=$row['ID'];?>" name="ID" required readonly></td>
        </tr>
        <tr>
            <td>FIRST NAME:</td>
            <td><input type="text" value="<?=$row['FNAME'];?>" name="FNAME" required></td>
        </tr>
        <tr>
            <td>MI:</td>
            <td><input type="text" value="<?=$row['MI'];?>" name="MI" required></td>
        </tr>
        <tr>
            <td>LAST NAME:</td>
            <td><input type="text" value="<?=$row['LNAME'];?>" name="LNAME" required></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit" id="submit">UPDATE</button></td>
        </tr>
    </table>
</form>



</div>

            
                        <!-- use value="=$row['FNAME'];" to get the value of the row you want to edit 
                    then show it in the input text above -->