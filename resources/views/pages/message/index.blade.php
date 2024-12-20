@extends('layouts.app')

@section('content')

@vite('resources/css/message.css')


<!-- Animation de neige -->
<div id="snowflakes">
    <div class="snowflake">❄️</div>
    <div class="snowflake">❄️</div>
    <div class="snowflake">❄️</div>
</div>


<!-- Titre -->
<h1 class="main-title">
    🎄 Bienvenue sur votre Messagerie de Noël 🎄
</h1>

<div class="main-container">
    <!-- Messages -->
    <div class="message-list">
        <h2>Liste des Messages</h2>

        @if (!empty($messages) && count($messages) > 0)
            <ul>
                @foreach ($messages as $message)
                    <li class="message-bubble {{ $message->is_sent ? 'sent' : 'received' }}">
                        <!-- Expéditeur -->
                        <div class="message-header left">
                            <span class="label">E:</span>
                            <img src="{{ $message->sender->picture ? asset($message->sender->picture) : asset('images/default-profile.png') }}" 
                                 alt="Photo de {{ $message->sender->firstname }}">
                            <strong>{{ $message->sender->firstname }} {{ $message->sender->lastname }}</strong>
                        </div>

                        <!-- Destinataire -->
                        <div class="message-header right">
                            <span class="label">R:</span>
                            <img src="{{ $message->receiver->picture ? asset($message->receiver->picture) : asset('images/default-profile.png') }}" 
                                 alt="Photo de {{ $message->receiver->firstname }}">
                            <strong>{{ $message->receiver->firstname }} {{ $message->receiver->lastname }}</strong>
                        </div>

                        <!-- Contenu -->
                        <div class="message-content">
                            🎁 {{ $message->content }}
                        </div>

                        <!-- Date -->
                        <div class="message-bottom left">
                            <small>Envoyé le : {{ $message->created_at }}</small>
                        </div>

                        <!-- Bouton Supprimer -->
                        <form action="{{ route('message.destroy', $message->id) }}" method="POST" style="margin-top: 10px;">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="message-bottom right">
                                🗑️ Supprimer
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucun message à afficher.</p>
        @endif
    </div>

    <!-- Envoi -->
    <div class="send-form-container">
        <form action="{{ route('message.store') }}" method="POST" class="send-form">
            @csrf
            <h2>🎄 Envoyer un message 🎄</h2>
            <div>
                <label for="receiver_id">Destinataire</label>
                <select name="receiver_id" id="receiver_id" required>
                    <option value="">Sélectionnez un utilisateur</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="content">Message</label>
                <textarea name="content" id="content" rows="4" required></textarea>
            </div>
            <button type="submit">🎅 Envoyer 🎅</button>
        </form>
    </div>
</div>
@endsection
