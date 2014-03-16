<form METHOD="POST" ACTION="/admin/change_article/{id}" enctype="multipart/form-data">

    <label for="title">Title:</label> 
    <input type="text" value="{title}" name="title" id="title" size="100"/> <br/>

    <label for="url">URL (english letters or '-'):</label>
    <input type="text" value="{url}" name="url" id="url" maxlength="128" size="64"/> <br/>

    <label for="keywords">Keywords:</label> 
    <input type="text" value="{keywords}" id="keywords" name="keywords" size="100"/><br/>

    <label for="description">Description:</label> 
    <input type="text" value="{description}" id="description" name="description" size="100"/><br/> 

    <label for="text">Text:</label> 
    <textarea id="text" style="width:100%;min-height:250px" name="text">{text}</textarea><br/>

    <label for="">Image:</label>
    <input type="file" name="image" id="image"/>
    <img src="{image_url}" /><br/><br/>

    <label for="is_published">Is published:</label> <br/>
    <input type="radio" name="is_published" value="1" {published}/> Yes<br/>
    <input type="radio" name="is_published" value="0" {unpublished}/> No<br/><br/>

    <label for="category">Category:</label>
    <select name="category" id="category">
    <option value="0"></option>  
    {categories}
    <option value="{category_id}" {selected}>{category_name}</option>
    {/categories}
	</select>
	<br/>
	<br/>

    <button type="submit" class="btn btn-warning">Submit</button>
    <a href="/admin/blog"><button type="button" class="btn btn-default">Back to Articles</button></a>
</form>
<script type="text/javascript" src="/static/scripts/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	CKEDITOR.replace('text',
	    {  
		language: 'ru',
		uiColor: '#eee',
		height: '450px',
		width: '800px',
		filebrowserUploadUrl: '/admin/func/upload',
		toolbar :
		    [
		    { name: 'document', items : [ 'Source','-','Save','Preview','Print','-' ] },
		    { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		    { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },    
		    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		    '/',
		    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		    { name: 'links', items : [ 'Link','Unlink','Anchor' ] },   
		    { name: 'colors', items : [ 'TextColor','BGColor' ] },
		    { name: 'tools', items : [ 'Maximize', 'ShowBlocks' ] },
		    '/',
		    { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
		    { name: 'insert', items : [ 'Image','Table','HorizontalRule','PageBreak', 'MediaEmbed' ] },
		]
	});
})    
</script>