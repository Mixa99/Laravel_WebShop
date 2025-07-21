@section('show-comments')
    <h1 class="comments-main-header">Komentari</h1> {{-- Ažuriran naslov klase --}}
        @if($comments->isNotEmpty())
            <div class="comments-list">
                @foreach($comments as $comment)
                    <div class="comment-item"> {{-- "Kvadrat" za svaki komentar --}}
                        <h2 class="comment-author">{{$comment->name}}</h2>
                        <div class="comment-rating-display">
                            Ocena: <span class="rating-stars">{{$comment->rating}} / 5</span> {{-- Bolji prikaz ocene --}}
                        </div>
                        <p class="comment-body-text">{{$comment->body}}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-comments-message">Nema komentara za ovaj proizvod.</p> {{-- Stilizovan paragraf --}}
        @endif

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
@endsection

@section('add-comments')
    <h2 class="add-comment-header">Oceni proizvod</h2> {{-- Ažuriran naslov klase --}}

    <div class="comment-form-container">
        <form action="{{ route('comment.store', ['id' => $product->id]) }}" method="post">
            @csrf
        <div class="form-group">
            <label for="rating">Ocena:</label>
            <select id="rating" name="rating" class="form-select">
                <option value="5">5 - Odličan</option>
                <option value="4">4 - Vrlo dobar</option>
                <option value="3">3 - Dobar</option>
                <option value="2">2 - Loš</option>
                <option value="1">1 - Vrlo loš</option>
            </select>
        </div>

        <div class="form-group">
            <label for="body">Komentar:</label>
            <textarea id="comment-body" name="body" placeholder="Vaša povratna informacija ovde..." rows="4" class="form-textarea"></textarea>
        </div>

        <button type="submit" class="submit-comment-button">Pošalji komentar</button>
            </form>
                @if (session('error'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
@endsection




