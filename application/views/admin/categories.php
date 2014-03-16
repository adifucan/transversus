<p>
	<a href="/admin/create_category">
        <button type="button" class="btn btn-primary">Create New Category</button>
    </a>
</p>
<table class="table">
	<thead>
		<th>ID</th>
		<th>Categories</th>
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		{categories}
		<tr>
			<td>{category_id}</td>
			<td>{category_name}</td>
			<td><a href="/admin/category/{category_id}"><button type="button" class="btn btn-default">Edit</button></a></td>
    		<td><a href="/admin/delete_category/{category_id}"><button type="button" class="btn btn-danger">Delete</button></a></td>
		</tr>
		{/categories}
	</tbody>
</table>