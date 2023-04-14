<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 1.0.0
	</div>
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo base_url('home'); ?>"><?php echo $this->site_title; ?></a>.</strong> All rights
	reserved.

</footer>

<script>
	$(document).ready(function() {
		$(".slug-field").on("keyup", function() {
			var str = $(this).val();
			var slug_id = $(this).data('slug-id');
			str = str.trim().replace(/\s+/g, '-').toLowerCase();
			$(slug_id).val(str);
		});

		$('.delete_icon').parent('a').on('click', function(e) {
			e.preventDefault();
			var confirm = window.confirm('Are you sure you wanted to delete? This action cannot be undone.');

			if (confirm == true) {
				window.location.href = $(this).attr('href');
			}
		});
	});
</script>
<script src="<?php echo base_url(); ?>assets/admin/js/index.js"></script>