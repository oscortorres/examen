@csrf

<label for="">Nombre</label>
<input type="text" name="name" value="{{ old('name', $post->name) }}">

<label for="">Slug</label>
<input type="text" name="slug" value="{{ old('slug', $post->slug) }}">

<label for="">Categoria</label>
<select name="category_id">

    <option value=""></option>
    @foreach ($categories as $title => $id)
        <option {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }} value="{{ $id }}">
            {{ $title }}</option>
    @endforeach
</select>

<label for="">Posteado</label>
<select name="posted">
    <option {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }} value="not">no</option>
    <option {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }} value="yes">si</option>
</select>

<label for="">Comentario</label>
<textarea name="comment" id="" cols="30" rows="10">{{ old('comment', $post->comment) }}</textarea>

<button type="submit">
    Enviar
</button>
