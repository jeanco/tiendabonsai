<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      @if(in_array('nueva-publicacion', $permissions_array))
      <button type="button" class="btn btn-primary" id="post__add" data-target="#post-modal" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nueva Publicación
      </button>
      @endif
    </div>

    <input type="hidden" id="blog_publish" value={{ in_array('publicar-blog', $permissions_array) }}>
    <input type="hidden" id="blog_edit" value={{ in_array('editar-blog', $permissions_array) }}>
    <input type="hidden" id="blog_add-images" value={{ in_array('anadir-imagenes-al-blog', $permissions_array) }}>
    <input type="hidden" id="blog_delete" value={{ in_array('eliminar-blog', $permissions_array) }}>

    <ul class="col-md-12" id="posts_grid">

    </ul>
  </div>
</div>
