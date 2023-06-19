<?php
  include "conn.php";
 // include('pagination.php');
?>
<style>
    body{
        
        background-attachment: fixed;
        background: url(img/green2.jpg);
        font-family:arial;
    }
    #divheader{
        margin:auto;
        margin-top:100px;
        width:700px;
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
    #table{
        border-collapse:collapse;
        padding: 5px;
        font-size:10pt;
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
    #delete{
        padding: 10px;
        background:#d63031;
        color:#fff;
        border-radius:3px;
        border:none;
        cursor: pointer;
        width: 100%;
    }
    #delete:hover{
        background:#EA2027;
    }
</style>

<html>
    <head>
        <title>CRUD operation</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <body>
        <div id="divheader">
            <form action="insert.php" method="post">

                <h1 style="margin-left:270px;">Register Form</h1>    
         
                <table width="100%">
                    <tr>
                        <td>FIRST NAME</td>
                        <td><input type="text" name="FNAME" required></td>
                    </tr>
                    <tr>
                        <td>MIDDLE NAME</td>
                        <td><input type="text" name="MI" required></td>
                    </tr>
                    <tr>
                        <td>LAST NAME</td>
                        <td><input type="text" name="LNAME" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" id="submit" name="submit"> <span class="fa fa-save "></span> REGISTER</button></td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_SESSION['success'])){
                    echo  "<div style='background:green;color:#fff;padding:3px;border-radius:3px'>".$_SESSION['success']."</div>";
                    unset($_SESSION['success']);
                }
                if(isset($_SESSION['error'])){
                    echo  "<div style='background:red;color:#fff;padding:3px;border-radius:3px'>".$_SESSION['error']."</div>";
                    unset($_SESSION['error']);
                }
            ?>
            <p>SEARCH HERE</p>
            <input type="text" name="search" id="search" placeholder="search">
            <form action="deleteAll.php" method="post">
                <button style="float:right;width:100px" type="submit" name="deleteall" id="delete"><span class="fa fa-trash "></span> DELETE</button>
                <p>LIST OF RECORDS</p>
                <br>
            <div id="result"></div>
          
            </form>
            <script>
                $(document).ready(function(){
                    load_data();
                    function load_data(query){
                        $.ajax({
                        url:"search.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data){
                            $('#result').html(data);
                        }
                        });
                    }
                    
                    $('#search').keyup(function(){
                        var search =$(this).val();
                        if(search !=''){
                            load_data(search);
                        }else{
                            load_data();
                        }
                        
                    });
                });
            </script>
           
        </div>
    </body>
</html>