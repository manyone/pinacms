<h1><span class="section-icon icon-book"></span>{lng lng="post_addition"}</h1>
<form action="api.php" method="POST" name="post_add_form" id="post_add_form">
	<input type="hidden" name="action" value="post.manage.add" />

	{include file="skin/admin/page-operations-create-cancel.tpl"}

	<div class="left-wide-column">
		{block view="post.manage.form-common"}
		{module action="menu.manage.form-menu" url_action="post.view" url_params="post_id="}
	</div>

</form>

{literal}
<script type="text/javascript">

$(document).ready(function(){
	$('#post_add_form').managePage({
		object: "post",
	});
});


</script>
{/literal}