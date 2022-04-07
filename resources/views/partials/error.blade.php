

@if(session()->has('error'))
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-reject">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="material-icons">&#xE888;</i>
				</div>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                 </span>
			</div>
			<div class="modal-body text-center">
				<h4>Ooops!</h4>
				<p>{{ session()->get('error') }}</p>
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
