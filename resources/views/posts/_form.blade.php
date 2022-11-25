@csrf

@include('partials.validation-request')
<div class="container">
    <form>
        <div class="mb-3">
            <label for="Titulo" class="form-label">Titulo*</label>
            <input type="text" id="Titulo" class="form-control" name="titulo"
                value="{{ old('titulo', $post->titulo) }}">
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Descripción*</label>
            <textarea class="form-control" name="cuerpo" id="des">{{ old('cuerpo', $post->cuerpo) }}</textarea>
        </div>

        <button class="btn btn-primary">{{ $btnText }}</button>
    </form>
</div>
