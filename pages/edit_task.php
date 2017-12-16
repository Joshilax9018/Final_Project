<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <!--<link rel="stylesheet" href="css/styles.css?v=1.0">-->

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <![endif]-->
</head>

<body>

        <div class="container">
            <form action="index.php?page=tasks&action=edit" method="post">



                <input type="datetime" placeholder="Created Date" name="createddate"><br>


                <input type="datetime" placeholder="Due Date" name="duedate"><br>


                <input type="text" placeholder="Message" name="message"><br>


                <input type="number" placeholder="Is Done" name="isdone"><br>

                <button type="submit" name="update">Update</button>
            </form>
        </div>


<script src="js/scripts.js"></script>
</body>
</html>