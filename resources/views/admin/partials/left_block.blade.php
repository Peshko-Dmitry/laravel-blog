    <a href="{{route('admin.edit')}}"  @if(Request::is('admin/edit')) id="active-link" @endif >Изменить данные </a>
    <a href="{{route('admin.posts.index')}}" @if(Request::is('admin/posts')) id="active-link" @endif>Все новости</a>
