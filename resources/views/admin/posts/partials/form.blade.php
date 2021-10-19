<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($post->id))
        <option value="0" @if ($post->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($post->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ $post->title ?? ''}}"
       required="">

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{ $post->slug ?? ''}}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
    @include('admin.posts.partials.categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" id="description" name="description">{{$post->description ?? '' }}</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" id="body" name="body">{{$post->body ?? '' }}</textarea>

<label class="btn btn-default btn-file">Изображение</label>
<input type="file" class="form-control" id="image" name="image" value="{{ $post->image ?? ''}}" required="">

<hr/>

<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок"
       value="{{ $post->meta_title ?? ''}}" required="">

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание"
       value="{{ $post->meta_description ?? ''}}" required="">

<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую"
       value="{{ $post->meta_keyword ?? ''}}" required="">

<hr/>

<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>
