<x-app-layout>
    <link rel="stylesheet" href="{{asset('estilo.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Review para o Anime') }} {{ $anime->title }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="review-card">
            <form action="{{ route('review.store', ['id' => $anime->id]) }}" method="POST">
                @csrf
                <div class="text-center">
                    <div class="anime-image" style="background-image: url('{{ $anime->image_url }}');"></div>
                    <label for="comment">Review</label>
                    <textarea id="comment" name="comment" rows="4" class="form-control" maxlength="500" oninput="updateCharacterCount()"></textarea>
                    <div id="charCount" class="text-muted mt-2">0/500 caracteres</div>
                    <label for="rating" class="form-label mt-3">Classificação</label>
                    <input type="number" id="rating" name="rating" min="1" max="10" class="form-control" required style="margin: 0 auto; display: block;">


                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="button">Enviar Review</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateCharacterCount() {
            const commentField = document.getElementById('comment');
            const charCountDisplay = document.getElementById('charCount');
            const totalChars = commentField.value.length;
            charCountDisplay.textContent = `${totalChars}/500 caracteres`;
        }
    </script>
</x-app-layout>
