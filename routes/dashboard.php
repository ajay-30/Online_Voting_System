<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../login.html");
    }
    $userdata=$_SESSION['userdata'];
    $groupsdata=$_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status='<b style="color:red">Not Voted</b>';
    }
    else{
        $status='<b style="color:green">Voted</b>';
    }
?> 

<html>
    <head>
        <title>Online Voting System</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
            #backbtn{
                padding: 5px;
                border-radius: 15px;
                background-color: rgb(111, 144, 194);
                color: whitesmoke;
                border-radius: 5px;
                float: left;
            }
            #logoutbtn{
                padding: 5px;
                border-radius: 15px;
                background-color: rgb(111, 144, 194);
                color: whitesmoke;
                border-radius: 5px;
                float: right;
            }
            #Profile{
                background-color: white;
                width: 30%;
                padding: 15px;
                float:left;
            }
            #Group{
                background-color: white;
                width: 60%;
                padding: 15px;
                float:right;
            }
            #votebtn{
                padding: 5px;
                border-radius: 15px;
                background-color: rgb(111, 144, 194);
                color: whitesmoke;
                border-radius: 5px;
            }
            #mainpanel{
                padding:10px;
            }
            #voted{
                padding: 5px;
                border-radius: 15px;
                background-color: green;
                color:black;
                border-radius: 5px;   
            }
        </style>
        <div id="headersection">
            <a href="../login.html"><button id="backbtn">Back</button></a>
            <a href="logout.php"><button id="logoutbtn">Logout</button></a>
            <center><h1>Online Voting System</h1></center>
        <div>
        <hr>
        <div id="mainpanel">
        <div id="Profile">
            <center><img src="../uploads/<?php echo $userdata['photo']?>" height="100" widht="100"></center><br><br>
            <b>Name:</b><?php echo $userdata['name']?><br><br>
            <b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
            <b>Address:</b><?php echo $userdata['address']?><br><br>
            <b>Status:</b><?php echo $status?>
        </div>
        <div id="Group">
            <?php
                if($_SESSION['groupsdata']){
                    for($i=0;$i<count($groupsdata);$i++){
                        ?>
                        <div>
                            <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                            <b>Group Name:</b><?php echo $groupsdata[$i]['name']?><br><br>
                            <b>Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                                <?php
                                    if($_SESSION['userdata']['status']==0){
                                        ?>
                                        <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                        <?php
                                    }
                                ?>
                            </form>
                        </div>
                        <hr>
                        <?php
                    }
                }
                else{

                }
                ?>
        </div>
        </div>
    </body>
</html>  