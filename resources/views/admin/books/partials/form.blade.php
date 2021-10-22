<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($book->id))
        <option value="0" @if ($book->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($book->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Название</label>
<input type="text" class="form-control" name="title" placeholder="Название" value="{{ $book->title ?? ''}}"
       required="">

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{ $book->slug ?? ''}}" readonly="">

<label for="">Автор</label>
<input type="text" class="form-control" name="author" placeholder="Автор" value="{{ $book->author ?? ''}}"
       required="">

<label for="">Краткое описание</label>
<textarea class="form-control" id="description" name="description">{{$book->description ?? '' }}</textarea>

<label class="btn btn-file">Изображение</label>
<input type="file" class="form-control" id="image" name="image" value="{{ $book->image ?? ''}}">

<label class="btn btn-file">Файл</label>
<input type="file" class="form-control" id="file" name="file" value="{{ $book->file ?? ''}}">

<hr/>

<label for="">Тип</label>
<select class="form-control" name="type">
    @if (isset($book->id))
        <option value="arabic" @if ($book->type == 'arabic') selected="" @endif>На арабском</option>
        <option value="russian" @if ($book->type == 'russian') selected="" @endif>На русском</option>
        <option value="child" @if ($book->type == 'child') selected="" @endif>Для детей</option>
    @else
        <option value="arabic">На арабском</option>
        <option value="russian">На русском</option>
        <option value="child">Для детей</option>
    @endif
</select>

<hr/>

<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>
