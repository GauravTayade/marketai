<?php $i = 0; ?> 
<?php foreach ($page_data as $page) { ?>

<div class="row">
<!-- compititors data start -->
	<div class="col-lg-4">
		<!-- Members online -->
		<div class="panel bg-teal-400">
			<div class="panel-body">
				<div class="heading-elements">
					<span class="heading-text badge bg-teal-800">+53,6%</span>
				</div>
				<h3 class="no-margin" id="total-page-followers-<?= $i ?>"></h3>
				Total Page Followers
				<div class="text-muted text-size-small">489 avg</div>
			</div>
		</div>
	</div>
	<!-- /members online -->

	<div class="col-lg-4">
		<!-- Members online -->
		<div class="panel bg-pink-400">
			<div class="panel-body">
				<div class="heading-elements">
					<span class="heading-text badge bg-pink-800">+53,6%</span>
				</div>
				<h3 class="no-margin" id="total-page-posts-<?= $i ?>"></h3>
				Total Page Posts
				<div class="text-muted text-size-small">489 avg</div>
			</div>
		</div>
	</div>
	<!-- compititors data end -->
</div>
	<script type="text/javascript">
	var fb_page_id = "<?php echo $page['compititor_link']  ?>";
	function getTotalFollowers(fb_page_id)
	{   
    	FB.api(fb_page_id+'?fields=fan_count',function(response){
        	$("#total-page-followers-<?= $i ?>").html(response.fan_count);
    	});
	}

	function getTotalPosts(fb_page_id)
	{
    	FB.api(fb_page_id+'/posts?fields=admin_creator,name',function(response){
        	var total_posts = response.data.length;
     		$("#total-page-posts-<?= $i ?>").html(total_posts);
    	});    
	}
		/*getTotalFollowers(fb_page_id);
		getTotalPosts(fb_page_id);*/
	</script>
<?php $i++ ?>
<?php } ?>