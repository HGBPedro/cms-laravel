@extends('layouts.app')

@section('content')
    <div class="cms-form">
        <h3 class="cms-form__header">Home</h3>
        <form method='POST' action='/cms/update' enctype="multipart/form-data">
        @csrf
        <h4 class="cms-form__section-header">Header</h4>
        <div class="cms-form__section-container">
            <div class="cms-form__field-container">
                <div class="cms-form__field">
                    <label for="title">Título</label>
                    <input class="cms-form__input" type="text" name="title" value="{{ $cms['title'] }}"/>
                    @error('title')
                        <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="cms-form__field">
                    <label for="subtitle">Subtítulo</label>
                    <input class="cms-form__input" type="text" name="subtitle" value="{{ $cms['subtitle'] }}"/>
                    @error('subtitle')
                        <span class="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="cms-form__field">
                <label for="image">Imagem de fundo</label>
                <input type="file" name="bgImage" accept="image" onchange="previewImage(event)" value="{{ Storage::get(asset($bgImage)) }}"/>
                <img id="preview" class="image-preview" src="{{ asset($bgImage) }}" width="550" height="200" alt="Aguardando envio da imagem"/>
                    @error('bgImage')
                        <span class="alert">{{ $message }}</span>
                    @enderror
            </div>
        </div>
        <h4 class="cms-form__section-header">Sobre o desafio</h4>
        <div class="cms-form__section-container">
            <div class="cms-form__field cms-form__field--textarea">
                <label for="content">Conteúdo</label>
                <textarea class="cms-form__input" name="content" rows="10"/>
                    {{ $cms['content'] }}
                </textarea>
                @error('content')
                    <span class="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="cms-form__button-section">
            <button type="submit" class="cms-form__button">
                Atualizar
            </button>
        </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
                preview.style.objectFit = 'contain';
            } else {
                preview.src = '#';
                preview.alt = 'Erro ao fazer upload de imagem';
            }
        }
    </script>
@endsection
