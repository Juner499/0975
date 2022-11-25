<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Авторизация / Регистрация</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Домашняя</a></li>
						<li class="breadcrumb-item active" aria-current="page">Авторизация / Регистрация</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Вы зареганы?</h4>
						<p>Для доступа к скидкам, стоит это сделать щас!</p>
						<a class="button button-account" href=/register">Создать акк</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Залогиниться</h3>
					<form class="row login_form">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Пароль'">
						</div>

						<p id="info"></p>

						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="button button-login w-100">Вход</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->

<!-- Модальное окно -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Успешно авторизовались</h5>
			</div>
			<div class="modal-body">Направляю в личный кабинет</div>
		</div>
	</div>
</div>

<script>
	async function sendForm(form) {

		let formData = new FormData(form);

		let response = await fetch("authUser", {
			method: "POST",
			body: formData,
		});
		let res = await response.json();

		if (res.result == "ok") {
			$("#myModal").modal("show");
			setTimeout(() => {
				location.href = "/users/profile";
			}, 3000);
		} else if ((res.result = "rejected")) {
			info.innerText = "Не верные данные";
		} else {
			alert("Ошибка, повторите вход")
		}
	}
</script>