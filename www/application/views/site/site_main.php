<link href="/static/site/style/styles.css" rel="stylesheet">

<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center">Купи-продайко</h1>
        <h2 class="text-center lato animate slideInDown">Зароби, якщо зможеш!</h2>
        <p class="text-center">
            <br>
            <a href="<?=$isLogged?"/orders/":"javascript:login.modal.show('signUpModal')"?>" class="btn btn-danger btn-lg btn-huge lato" role="button">Звісно!</a>
        </p>
    </div>
    <a href="#services" class="page-scroll"	>
		<div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
		</div>
        </a>
</section>

<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Можливості</h2>

                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Прибуток</h4>
                    <p class="text-muted">Пошук прибуткової операції.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-filter fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Фільтрація</h4>
                    <p class="text-muted">Гнучка фільтрація результатів для користувача.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-child fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Універсальність</h4>
                    <p class="text-muted">Універсальні інструментарії для отримання і обробки продуктів.</p>
                </div>
				<div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Величезність</h4>
                    <p class="text-muted">Велика продуктова база.</p>
                </div>
            </div>
			<a href="#team" class="page-scroll"	>
			<div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
			</div>
        </a>
        </div>
    </section>

<section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Developers of arbitrage</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="team-member">
                         <img src="/static/images/team/1.jpg" class="img-responsive img-circle" alt="">
                         <h4>Elena Zarubina</h4>
                         <p class="text-muted">Authorization subsystem</p>
                         <ul class="list-inline social-buttons">
                             <li><a href="#"><i class="fa fa-vk"></i></a></li>
                             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="#"><i class="fa fa-google"></i></a></li>
                         </ul>
                     </div>
                </div>
                <div class="col-sm-3">
                     <div class="team-member">
                         <img src="/static/images/team/2.jpg" class="img-responsive img-circle" alt="">
                         <h4>Dmitry Machulyansky</h4>
                         <p class="text-muted">Parsing subsystem</p>
                         <ul class="list-inline social-buttons">
                             <li><a href="#"><i class="fa fa-vk"></i></a></li>
                             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="#"><i class="fa fa-google"></i></a></li>
                         </ul>
                     </div>
                </div>
                <div class="col-sm-3">
                     <div class="team-member">
                         <img src="/static/images/team/3.jpg" class="img-responsive img-circle" alt="">
                         <h4>Oleg Rybalchenko</h4>
                         <p class="text-muted">Management subsystem</p>
                         <ul class="list-inline social-buttons">
                             <li><a href="#"><i class="fa fa-vk"></i></a></li>
                             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="#"><i class="fa fa-google"></i></a></li>
                         </ul>
                     </div>
                </div>
                <div class="col-sm-3">
                     <div class="team-member">
                         <img src="/static/images/team/4.jpg" class="img-responsive img-circle" alt="">
                         <h4>Kostya Suprun</h4>
                         <p class="text-muted">Order subsystem</p>
                         <ul class="list-inline social-buttons">
                             <li><a href="#"><i class="fa fa-vk"></i></a></li>
                             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="#"><i class="fa fa-google"></i></a></li>
                         </ul>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">A team of students from the group of IC-21 to create a system of arbitrage operations</p>
                </div>
            </div>
        </div>
    </section>

