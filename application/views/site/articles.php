<div class="row">
	<div class="col-md-9">
		{articles}
		<h2><a href="/{category_url}/{url}">{title}</a></h2>
		<p>{publish_date} | <a href="category/{category_url}"/>{category_name}</a></p>
		<img src="{image_url}" style="float:left; margin:10px"/>
		{text}
		<div style="float:right">
			<a href="/{category_url}/{url}"><button type="button" class="btn btn-primary">Читать далее</button></a>
		</div>
		<div style="clear:both"></div>
		{/articles}
		<div class="alignCenter">
			<ul class="pagination">
			  {pages} 
			    <li class="{active}"><a href="{url}">{text}</a></li>
			  {/pages} 
			</ul>
		</div>
	</div>
	<div class="col-md-3">
		<h1>Категории</h1>
		{categories}
		<p><a href="/category/{category_url}">{category_name}</a></p>
		{/categories}	
	</div>
</div>