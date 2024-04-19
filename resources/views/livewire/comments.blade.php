<div class="space-y-2">
        @if ($comments->count() > 0)
            @foreach($comments as $comment)
                <x-front.comment :comment="$comment"/>
                <!-- Vous pouvez accéder aux autres propriétés du commentaire ici -->
            @endforeach
        @else
            <p>No comments available.</p>
        @endif
</div>
