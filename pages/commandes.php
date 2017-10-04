<?php
if(!isset($_SESSION['clef_de_session'])){
    header("Location: ./");
    exit();
}


if($_SESSION['idrole']==1){

	$sql = "SELECT c.util, c.mail, c.produit, c.quantite, c.nomentreprise, c.indications, c.dateCommande, p.id, p.titre
    FROM commande c
    	INNER JOIN produits p
    ON p.id = c.produit
    	WHERE p.id = c.produit
    ORDER BY dateCommande DESC
    ;";

	$recup_sql = mysqli_query($db, $sql)or die(mysqli_error($db));

}else{

	$id = $_SESSION['id'];

	$sql = "SELECT c.util, c.mail, c.produit, c.quantite, c.nomentreprise, c.indications, c.dateCommande, p.id, p.titre, u.id
    FROM commande c
    	INNER JOIN produits p
    ON p.id = c.produit
    	INNER JOIN util u
    	ON u.login = c.util
    WHERE u.id = $id
        ORDER BY dateCommande DESC
    ;";

	$recup_sql = mysqli_query($db, $sql)or die(mysqli_error($db));
}






?>
<style type="text/css">
	body {
	font-family: 'Open Sans', sans-serif;
	color: #353535;
}
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
.panel {
	border: 1px solid #ddd;
	background-color: #fcfcfc;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-filter {
	background-color: #fff;
	border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 35px;
}
.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.pagado {
	color: #5cb85c;
}
.table-filter .media .title span.pendiente {
	color: #f0ad4e;
}
.table-filter .media .title span.cancelado {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
}
</style>
<script type="text/javascript">
	$(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>
<div class="container"> 
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
</div>
<div class="container">
	<div class="row">
		<section class="content">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
					<?php while($order = mysqli_fetch_assoc($recup_sql)){ ?>
									<tr data-status="pagado">
										
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right"><?php echo "{$order['dateCommande']}" ?> </span>
													<h4 class="title">
														<?php echo "<p> {$order['util']} / {$order['mail']} / {$order['nomentreprise']} </p>" ?>
													</h4>
													<p class="summary">
														<?php echo "<h4> Produit: {$order['titre']} </h4>" ?>
														<?php echo "<h4> Quantite: {$order['quantite']} </h4>" ?>
														<?php echo "<h4> Instructions: {$order['indications']} </h4>" ?>
													</p>
												</div>
											</div>
										</td>
									</tr>
					<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
</div>