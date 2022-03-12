<body>
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/violet-master/models/functions.php";
     
    ?>
    
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
                <div class="header-right">
                    <img src="img/icons/search.png" alt="" class="search-trigger">
                    <img src="img/icons/man.png" alt="">
                    <a href="cart.php">
                        <img src="img/icons/bag.png" alt="">
                        <span>2</span>
                    </a>
                </div>
                <!--<div class="user-access">
                    <a href="#">Register</a>
                    <a href="#" class="in">Sign in</a>
                </div>-->
                <nav class="main-menu mobile-menu">
                    <ul>
                    <?php
                                //session_start();
                                //echo "11111111111111111111";
                                
                                //echo "11111111111111111111";
                                try{
                                echo dinamickoPrikazivanjeMenija();
                                
                                }
                                catch(PDOException $e)
                                {
                                    echo "greska:".$e->getMessage();
                                }
                                
                                /*if(isset($_SESSION['korisnik'])){
                                    echo "<a href='login.php'>Logout</a>";
                                }
                                else echo "<a href='login.php' class='logButton'>Login</a>";*/
                            ?>
                            
                            <li>
                                <?php
                                if(isset($_SESSION['korisnik'])){
                                    
                                    echo "<a href='odjavljivanje.php'>Logout</a>";
                                    
                                }
                                else
                                { 
                                    echo "<a href='login.php' class='logButton'>Login</a>";
                                    echo "<li>
                                    <a href='register.php' class='logButton'>Register</a>";
                                    echo "</li>";
                                }
                                //echo "<a href='login.php'>reg</a>";
                                ?>
                            </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    