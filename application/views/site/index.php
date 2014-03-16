<div class="row">
	<div class="col-md-12">
		<img src="/static/images/bemtor.jpg"/>
	</div>
</div>

<div class="row" style="margin-top:10px">
	<div class="col-md-7">
		<div>
			<p>Seja bem-vindo ao Bemtor, o site para quem procura a melhor solução em serviços bancários e seguros.</p>
			<p>No Bemtor você poderá pesquisar e comparar inúmeras opções de seguros e créditos, tendo assim, a garantia da escolha certa.</p>
			<p>Visite o nosso site e rapidamente perceberá que não há nada no mundo financeiro como Bemtor.</p>
			<p>Aqui você encontra todas as ferramentas que necessita para escolher o melhor seguro ou crédito do mercado.</p>
			<p>O Bemtor será o seu melhor parceiro para aliar o menor custo com a melhor qualidade!</p>
		</div>
		<div id="imagesOnIndex">
			<span style="display:inline-block; margin-right:50px">
				<a href="/seguro/seguro-de-carro/" title="Seguro de Carro" >
					<img src="/static/uploads/seguro-de-carro.jpg" alt="Seguro de Carro" />
				</a>
			</span>
			<span style="display:inline-block; margin-right:50px">
				<a href="/seguro/seguro-de-casa/" title="Seguro de Casa">
					<img src="/static/uploads/seguro-de-casa.jpg" alt="Seguro de Casa" />
				</a>
			</span>
			<span style="display:inline-block">
				<a href="/seguro/seguro-de-saude/" title="Seguro de Saude">
					<img src="/static/uploads/seguro-de-saude.jpg" alt="Seguro de Saude" />
				</a>
			</span>
			<span style="display:inline-block; margin-right:50px">
				<a href="/seguro/seguro-de-viagem/" title="Seguro de Viagem">
					<img src="/static/uploads/seguro-de-viagem.jpg" alt="Seguro de Viagem" />
				</a>
			</span>
			<span style="display:inline-block; margin-right:50px">
				<a href="/seguro/seguro-de-vida/" title="Seguro de Vida">
					<img src="/static/uploads/seguro-de-vida.jpg" alt="Seguro de Vida" />
				</a>
			</span>
			<span style="display:inline-block;">
				<a href="/cartao-de-credito/" title="Cartões de Crédito">
					<img src="/static/uploads/cartoes-de-credito.jpg" alt="Cartões de Crédito" />
				</a>
			</span>
		</div>
	</div>
	<div class="col-md-5">

		<div id="accordion">
                    
                        {articles}
                        <h3>{title}</h3>
                        <div>
                            {excerpt}
                            <br/>
                            <a href ="/blog/article/{url}" style="float: right">
                            	<button type="button" class="btn btn-default btn-sm">Leia Mais</button>
                            </a>
                        </div>
                        {/articles}
		</div>
	<div id="outroBtn">
		<a href="/blog"><button type="button" class="btn btn-success">Outro</button></a>
	</div>

		<form method="POST" action="/subscribe" role="form">
			<div class="form-group">
				<label for="subscribeEmail">Newsletter</label>
				<input type="email" class="form-control" name="subscribeEmail" placeholder="SEU ENDEREÇO DE E-MAIL">
			</div>
			<button type="submit" class="btn btn-info">Subscrever</button>
		</form>

	</div>

</div>





