<form METHOD="POST" ACTION="/admin/change_category/{category_id}">
	<p><strong>ID:</strong> {category_id}</p>
	<label for="categoryName">Category Name:</label>
	<input type="text" name="categoryName" id="categoryName" value="{category_name}"/>
	<br/>
    <button type="submit" class="btn btn-warning">Submit</button>
    <a href="/admin/categories">
    	<button type="button" class="btn btn-default">Back to Categories</button>
    </a>
</form>
