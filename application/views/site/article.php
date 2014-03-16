<div class="row">
	<div class="col-md-9">
		{article}
		<h1>{title}</h1>
		<p>{publish_date} | <a href="/category/{category_url}"/>{category_name}</a></p>
		<img src="{image_url}" style="float:left; margin:10px"/>
	    {text}
	    {/article}
    </div>
    <div class="col-md-3">
    	<h1>Категории</h1>
    	{categories}
		<p><a href="/category/{category_url}">{category_name}</a></p>
		{/categories}
    </div>
</div>
    