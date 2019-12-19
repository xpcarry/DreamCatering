<?php 
    if (!isset($_SESSION)) session_start();
?>
<div class="topbar">
    <div class="topbarL">
        <img src="content/pictures/logo.png" />
    </div>
    <div class="topbarR">
        <span class="bigtitle">Dream Catering</span>
        <div style="height: 15px;"></div>
        Zamów swoje wymarzone jedzenie!
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mollis odio eu bibendum.
    </div>
    <div style="clear:both;"></div>
</div>

<div id="menu">
    <div class="option"><a href="./index.php">Strona główna</a></div>
    <div class="option"><a href="./DGlowne.php">Dania Główne</a></div>
    <div class="option"><a href="./Przystawki.php">Przystawki</a></div>

    <!-- wyswietlanie loginu-->
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="option"><?= $_SESSION['username'];?></div>
    <?php endif; ?>
    <!-- /wyswietlanie loginu-->

    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="option"><a href="./Logout.php">Wyloguj sie</a></div>
    <?php else: ?>
        <div class="option"><a href="./Login.php">Zaloguj sie</a></div>
    <?php endif; ?>
    <?php if (!isset($_SESSION['user_id'])): ?>
        <div class="option"><a href="./Register.php">Zarejestruj sie</a></div>
    <?php endif; ?>
    <div class="option"><a href="./koszyk.php">Koszyk</a></div>
    <div style="clear:both;"></div>
</div>