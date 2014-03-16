<p>
    <a href="/admin/create_article">
        <button type="button" class="btn btn-info">Create New Article</button>
    </a>
</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Publish Date</th>
            <th>Title</th>
            <th>Url</th>
            <th>Keywords</th>
            <th>Description</th>
            <th>Text</th>
            <th>Image</th>
            <th>Is published</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        {articles}
        <tr>
            <td>{id}</td>
            <td>{publish_date}</td>
            <td>{title}</td>
            <td>{url}</td>
            <td>{keywords}</td>
            <td>{description}</td>
            <td>{text}</td>
            <td>{image_url}</td>
            <td>{is_published}</td>
            <td>{category_id}</td>
            <td><a href="/admin/article/{id}"><button type="button" class="btn btn-default">Edit</button></a></td>
            <td><a href="/admin/delete_article/{id}"><button type="button" class="btn btn-danger">Delete</button></a></td>
        </tr>
        {/articles}
    </tbody>
</table>
