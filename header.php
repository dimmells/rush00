<header>
		<div class="pools">
			<div class="pool_c pool">
				<button class="dropdown_c dropdown">Pets</button>
				<div class="challenge_c challenge">
                    <?php
                    function get_arr_csv()
                    {
                        $fd = fopen("db/categories.csv", 'r');
                        $info = array();
                        $i = 0;
                        while ($info[$i++] = fgetcsv($fd))
                            ;
                        foreach ($info as &$dogs)
                        {
                            if (!$dogs[0])
                                $dogs = NULL;
                            else if($dogs)
                                $dogs = explode(";", $dogs[0]);
                        }
                        $info = array_filter($info);

                        return $info;
                    }


                    $categories = get_arr_csv();
                    foreach ($categories as $val){

					echo "<a href='cats.php?cat=".$val[0]."'>".ucfirst($val[0])."</a>";
                    }
                    ?>
				</div>
			</div>
			<a href="index.php"><p>PetShop</p></a>
			<div class="pool_cpp pool">
                <button class="dropdown_cpp dropdown">menu</button>
				<div class="challenge_cpp challenge">

                  	<a href="create_account.php">Create account</a>
					<a href="#">About</a>

                    <?php echo key_exists('loged_on_user', $_SESSION) ? "<a href='basket.php'>Basket</a>" : " ";
                    if (key_exists('loged_on_user', $_SESSION)){
                        if ($_SESSION["loged_on_user"] == 'admin')
                        {
                            echo "<a href = 'admin/admin_panel.php' >Admin panel</a >";
                        }
                    }
                    ?>
                    <?php echo key_exists('loged_on_user', $_SESSION) ? "<a href='logout.php'>Logout</a>" : "<a href='login.php'>Sign in</a>";
                    ?>
				</div>
			</div>
		</div>
	</header>