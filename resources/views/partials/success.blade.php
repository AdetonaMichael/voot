

@if(session()->has('success'))
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                   <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                </span>
			</div>
			<div class="modal-body text-center">
				<h4>Great!</h4>
				<p>{{ session()->get('success') }}</p>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    window.onload = () =>{
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#myModal").modal('show');
    }
</script>

@endif
