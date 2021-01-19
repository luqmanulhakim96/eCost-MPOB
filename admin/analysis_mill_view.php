<script>
function loadingAjax(div_id)
{
	$("#"+div_id).html('<img src="ajax-loader.gif"> saving...');
	$.ajax({
		type: "POST",
		url: "script.php",data: "name=John&id=28",
		success: function(msg){
			$("#"+div_id).html(msg);
		}
	});
}
</script>

<link rel="stylesheet" href="../css/buttons/css/buttons.css" type="text/css" media="screen" />
<h1>Mill </h1>
<ul>
  <li>
    <div id="grey-button"> <a href="home.php?id=analysis&amp;sub=linear_mill_process" class="grey-button pcb"> <span>Processing Cost</span> </a> </div>
    <br />
  </li>
  <li>
    <div id="grey-button"> <a href="home.php?id=analysis&amp;sub=linear_mill_other_cost" class="grey-button pcb"> <span>Other Cost</span> </a> </div>
    <br />
  </li>
</ul>
