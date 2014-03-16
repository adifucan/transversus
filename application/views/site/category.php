<div class="row">
	<div class="col-md-9">
		<h1>Категория {category}</h1>
		{articles}
		<h2><a href="/{category_url}/{url}">{title}</a></h2>
		<p>{publish_date}</p>
		<img src="{image_url}" style="float:left; margin:10px"/>
		<p>{text}</p>
		<div style="float:right">
		<a href="/{category_url}/{url}"><button type="button" class="btn btn-primary">Читать далее</button></a>
		</div>
		<div style="clear:both"></div>
		{/articles}
	</div>
	<div class="col-md-3">
		<h1>Категории</h1>
		{categories}
		<p><a href="/category/{category_url}">{category_name}</a></p>
		{/categories}	
	</div>
</div>