<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Culinary by Free Css Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    </head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><a href="#">Culinary</a></h1>
        </div>
    </div>
    <div id=menu>
        <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div id="page">
        <div id="page-bgtop">
            <div id="content">


                <?php foreach ($newsList as $newsItem):?>
                <div class="post">
                    <h2 class="title"><a href="/news/<?php echo $newsItem['id'];?>" ><?php echo $newsItem['title'];?></a> </h2>
                    <p class="byline"><?php echo $newsItem['date'];?> </p>
                    <div class="entry">
                        <p><?php echo $newsItem['short_content'];?></p>
                        <div class="meta">
                            <p class="links"><a href="/news/<?php echo $newsItem['id'];?>" class="comments">Reda more</a> </p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </div>
</div>


</body>
</head>

</head>
</html