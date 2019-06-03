<body class="bgLogin">

<main class="mt-5">	

	<!-- <div class="bg"> -->
	<div class="row">
		<div class="col-md-4">
			<!-- 1 of 3 -->
		</div>

		<div class="col-md-4 z-depth-5 hoverable py-5">
			<!-- Material form login -->
			<div class="card">
				<h5 class="card-header pink accent-1 black-text text-center py-4">
					<strong>Login WO Dekorasi</strong>
				</h5>

				<br>
				<!--Card content-->
				<div class="card-body px-lg-5 pt-0">

					<!-- Form -->
					<form class="text-center" action="<?php echo base_url()?>login/auth" method="post" style="color: #757575;">

						<!-- Email -->
						<div class="md-form">
							<input oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="this.setCustomValidity('')" type="text" id="usernameLogin" name="username" class="form-control" required>
							<label for="usernameLogin">Username</label>

						</div>

						<!-- Password -->
						<div class="md-form">
							<input oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="this.setCustomValidity('')" type="password" id="passwordLogin" name="password" class="form-control" required>
							<label for="passwordLogin">Password</label>
						</div>

						<!-- Sign in button -->
						<button class="btn btn-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>
						<a href="<?php echo base_url('beranda')?>"><span>kembali ke WO Dekorasi</span></a>


					</form>
					<!-- Form -->

				</div>

			</div>
			<!-- Material form login -->
		</div>
		<div class="col-md-4">
			<!-- 3 of 3 -->
		</div>
	</div>
	<!-- </div> -->











