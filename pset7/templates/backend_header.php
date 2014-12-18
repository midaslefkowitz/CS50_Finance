<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>
        
        

        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="/js/backend.js"></script>

    </head>

    <body>

        <div class="container">
			<div id="title" style="display: none;">
				<?php
					echo htmlspecialchars($title);
				?>
			</div>
            <div id="top">
                <a href="/"><img alt="C$50 Finance" src="/img/logo.gif"/></a>
            	
            	<ul class="nav nav-pills">
		        	<li id="portfolio" role="presentation"><a href="portfolio.php">Portfolio</a></li>
					<li id="quote" role="presentation"><a href="quote.php">Quote</a></li>
					<li id="buy" role="presentation"><a href="buy.php">Buy</a></li>
					<li id="sell" role="presentation"><a href="sell.php">Sell</a></li>
					<li id="hist" role="presentation"><a href="history.php">History</a></li>
					<li role="presentation"><a href="logout.php"><strong>Log Out</strong></a></li>
				</ul>
            </div>
            
            

            <div id="middle">
