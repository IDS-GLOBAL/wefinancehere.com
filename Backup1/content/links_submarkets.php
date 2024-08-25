<div id="marketvwcontainer" style="display:none;">

                 <h1 id="submarkettitle">Vehicles In Sub Markets</h1>


				<?php do { ?>

                
                    <div id="marketlinks">
                     
                     
                    <a href="../used-cars.php?markets=<?php echo $statemrkt; ?>"><?php echo $row_querymrktStateabrv['market']; ?></a>

                
                    </div>
                <?php } while ($row_querymrktStateabrv = mysqli_fetch_assoc($querymrktStateabrv)); ?>



	<div class="clear"></div>
</div>