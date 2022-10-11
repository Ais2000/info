<?php
?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kanit">
<div id="record_container">
    <table class="table">
        <tr class="table_row logo">
            <td class="table_column logo">
                <img src="./assets/images/logo.png"/>
                <p id="title">Employee Records</p>
            </td>
        </tr>
        <tr class="table_row table_part">
            <td class="table_column" id="name">
                PERSONAL DATA
            </td>
        </tr>
        <tr class="table_row">
            <td class="table_column table_head s-column" id="data_name">
                Employee ID
            </td>
            <td class="table_column m-column"   id="input">
                <?php echo isset($id) ? $id : '' ?>
            </td>
            </tr>

            <td class="table_column p-column">
            <td class="table_column p-column" id="img">
            <img src="assets/uploads/<?php echo $avatar ?>" alt="User Avatar" >


        <tr class="table_row">
            <td class="table_column table_head s-column" id="data_name">
                Full Name
            </td>
            <td class="table_column m-column"  id="input">
                <?php echo isset($firstname) ? $firstname : '' ?> <?php echo isset($middlename) ? $middlename : '' ?> <?php echo isset($lastname) ? $lastname : '' ?>
            </td>
        </tr>
        <tr class="table_row clearfix">
            <td class="table_column table_head s-column" id="data_name">
                Job Type
            </td>
            <td class="table_column m-column"  id="input">
                <?php echo isset($designation) ? $designation : '' ?>
            </td>
            <tr class="table_row clearfix">
            <td class="table_column table_head s-column" id="data_name">
                Date Employed
            </td>
             <td class="table_column m-column"  id="input">
                <?php echo isset($date_created) ? $date_created : '' ?>
            </td>
        </tr>
        <tr class="table_row clearfix">
        <td class="table_column table_head s-column" id="data_name">
                School
            </td>
        <td class="table_column m-column"  id="input">
                <?php echo isset($school) ? $school : '' ?>
            </td>
        </tr>
        <tr class="table_row clearfix">
            <td class="table_column table_head s-column" id="data_name">
                Phone number
            </td>

            <td class="table_column m-column"  id="input">
                <?php echo isset($phone) ? $phone : '' ?>
            </td>

        </tr>
        <tr class="table_row clearfix">
            <td class="table_column table_head s-column" id="data_name">
                Residential Address
            </td>

            <td class="table_column m-column" id="input">
                <?php echo isset($address) ? $address : '' ?>
            </td>

        </tr>
    </table>

</div>

<div class="col-lg-12 text-right justify-content-right d-flex">
    <button id="printbtn" onclick="window.print()">Print Profile</button>
</div>

<style>
    @media print {
        #printbtn {
            visibility: hidden;
        }
    }

    #input {
        background-color: rgba(255, 255, 255, 0.4);
        color: white;
    }

    #printbtn {
        padding: 10px 25px 10px 25px;
        border-radius: 30px;
    }

    #printbtn:hover {
        padding: 8px 22px 8px 22px;
        background: linear-gradient(#15315b, #c6004d);
    }
    
    #data_name {
        text-align: center;
        
    }

    #name {
        text-align: center;
        font-size: 25px;
        font-family: Kanit;
    }
    
    .clearfix:after,
    .clearfix:before,
    .nav:after {
        content: "";
        display: table;
    }

    .clearfix:after,
    .nav:after {
        clear: both;
    }

    .record_container {
        width: 800px;
        margin: 10px auto;
        border: 1px solid #bbbbbb;
        position: relative;
    }

    table.table {
        width: 100%;
        border-collapse: collapse;
        position: relative;
    }

    tr.table_row.logo {
        width: 100%;
        text-align: center;
    }

    tr .table_column.logo {
        width: 300px;
        display: inline-block;
        font-weight: bold;
        height: 280px;
        border: none;
        color: black;
        font-size: 30px;
        text-transform: uppercase;
        font-family: Kanit;
    }

    tr .table_column.logo img {
        width: 50%;
        max-height: 50%;
    }

    .table_row {
        display: block;
        margin: 0 0 15px 0;
        
    }

    .table_column {
        display: inline-block;
        border: 2px solid black;
        padding: 5px 0 5px 10px;
    }

    .table_head {
        font-weight: bold;
        background: #eee;
        padding-left: 10;
        
    }

    .l-column {
        width: 786px;
    }

    .m-column {
        width: 530px;
    }

    .kin_row .m-column {
        width: 387px;
        float: left;
    }

    .s-column {
        width: 254px;
        float: left;
        border: solid 2px black;

    }

    .p-column {
        
        width: 129px;
        position: absolute;
        margin-top: -37px;
        height: 135px;
        right: 0;
        margin-right: 55px;
        padding: 0;
 
    }

    .p-column img {
        width: 100%;
        height: 100%;
        
    }

    #img {
        border: solid 2px black;
        
    }

    .table_part {
        display: block;
        color: black;
        margin-bottom: 15px;
    }

    .table_part td {
        display: block;
        padding: 5px 0px 5px 10px;
        border: solid 2px black;
    }
#title {
    font-size: 22px;
    font-family: Kanit;
}

</style>
