<?php
	
	$page = 1;
	$elementsPerPage = 4;
	$indexCategorie = 0;
	
	$preparatDAO = new PreparatDAO();
	
	$paginate = $preparatDAO->getPage(CONSTANTS::$CATEGORI[$indexCategorie], $elementsPerPage, $page);
?>

<div class="row h-100 m-0 meniu-container">
	<div class="h-100 float-left flex-inline middle-center arrow-container">
		<div class="arrow-panel">
			<button type="button" onclick="prevCategorie()">
				<i class="glyphicon glyphicon-chevron-left"></i>
			</button>
		</div>
	</div>
	<div class="h-100 float-left meniu-content-container">
		<div class="meniu-content-panel">
			<div class="row m-0 flex-block middle-center title-container">
				<div class="col-2 h-100 flex-block middle-center title-panel">
					<span id="categorieText">Bauturi</span>
				</div>
			</div>
			<div id="itemsContainer" class="row m-0 items-container overflow-a">
				<?php foreach($paginate->content as $preparat){ ?>
				<div class="item-container">
					<div class="row m-0 flex-block middle-center image-container">
						<div class="image-panel">
							<?php echo "<img src='".$preparat->imaginePath."'/> "; ?>
						</div>
					</div>
					<div class="row m-0 flex-block middle-center name-container">
						<span><?php echo $preparat->denumire; ?></span>
					</div>
					<div class="row m-0 flex-block middle-center pret-container">
						<span class="pret-span"><?php echo $preparat->pret; ?></span>
						<span>lei</span>
					</div>
					<div class="row m-0 flex-block middle-center add-cart-container">
						<button type="button" onclick="adaugaProdusInCos(<?php echo $preparat->id ?>)">Adauga in cos</button>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="row m-0 flex-block middle-center footer-container">
				<ul class="pagination-list" id="meniuPagination">
					<?php for($i = 1; $i <= $paginate->totalPages; $i++){ ?> 
					<li><a <?php if($paginate->currentPage == $i) echo "class='active'" ?> onclick="<?php echo "meniuPagination(".$i.")" ?>">
						<?php echo $i; ?></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="h-100 float-left flex-inline middle-center arrow-container">
		<div class="arrow-panel">
			<button type="button" onclick="nextCategorie()">
				<i class="glyphicon glyphicon-chevron-right"></i>
			</button>
		</div>	
	</div>
</div>