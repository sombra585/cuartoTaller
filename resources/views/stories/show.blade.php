<x-app-layout>

<style>
    /* =========================================================
       STORY VIEW — STORYVERSE
    ========================================================= */

    .story-page {
        position: relative;
        min-height: 100vh;
        padding: 45px 20px 100px;
        overflow: hidden;
        background:
            radial-gradient(circle at 10% 5%, rgba(16,185,129,.10), transparent 28%),
            radial-gradient(circle at 90% 15%, rgba(59,130,246,.09), transparent 30%),
            #050814;
    }

    .story-page::before {
        content: "";
        position: absolute;
        width: 600px;
        height: 600px;
        top: 300px;
        left: -300px;
        background: rgba(16,185,129,.055);
        filter: blur(120px);
        border-radius: 50%;
        pointer-events: none;
    }

    .story-page::after {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        right: -250px;
        bottom: 100px;
        background: rgba(59,130,246,.045);
        filter: blur(120px);
        border-radius: 50%;
        pointer-events: none;
    }

    .story-container {
        position: relative;
        z-index: 2;
        max-width: 1180px;
        margin: 0 auto;
    }

    /* =========================================================
       TOP LABEL
    ========================================================= */

    .story-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
        padding: 0 8px;
    }

    .story-brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .story-brand-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: rgba(16,185,129,.10);
        border: 1px solid rgba(16,185,129,.25);
        color: #34d399;
        font-weight: 900;
        font-size: 13px;
        box-shadow: 0 0 25px rgba(16,185,129,.08);
    }

    .story-brand-text {
        color: #64748b;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .18em;
    }

    .story-open-status {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 13px;
        border-radius: 999px;
        background: rgba(16,185,129,.06);
        border: 1px solid rgba(16,185,129,.14);
        color: #6ee7b7;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .14em;
    }

    .story-open-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #34d399;
        box-shadow: 0 0 12px rgba(52,211,153,.8);
    }

    /* =========================================================
       MAIN STORY
    ========================================================= */

    .story-main {
        overflow: hidden;
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 2.5rem;
        background: rgba(255,255,255,.025);
        box-shadow:
            0 30px 80px rgba(0,0,0,.38),
            inset 0 1px 0 rgba(255,255,255,.025);
        backdrop-filter: blur(24px);
    }

    /* =========================================================
       COVER
    ========================================================= */

    .story-cover {
        position: relative;
        height: 470px;
        overflow: hidden;
        background: #0a0f1c;
    }

    .story-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        filter: brightness(.72) saturate(.9);
        transition: transform 1s ease, filter .7s ease;
    }

    .story-main:hover .story-cover img {
        transform: scale(1.025);
        filter: brightness(.78) saturate(1);
    }

    .story-cover::after {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(
                to bottom,
                rgba(5,8,20,.05) 0%,
                rgba(5,8,20,.05) 35%,
                rgba(5,8,20,.55) 72%,
                #050814 100%
            );
    }

    .story-cover-label {
        position: absolute;
        z-index: 3;
        top: 25px;
        left: 25px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        border-radius: 999px;
        background: rgba(5,8,20,.62);
        border: 1px solid rgba(255,255,255,.12);
        backdrop-filter: blur(15px);
        color: #d1fae5;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .16em;
    }

    .story-cover-label span {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #34d399;
        box-shadow: 0 0 10px rgba(52,211,153,.8);
    }

    .story-cover-info {
        position: absolute;
        z-index: 4;
        left: 50px;
        right: 50px;
        bottom: 44px;
    }

    .story-genre {
        display: inline-flex;
        align-items: center;
        padding: 7px 12px;
        margin-bottom: 16px;
        border-radius: 999px;
        background: rgba(16,185,129,.12);
        border: 1px solid rgba(16,185,129,.25);
        color: #6ee7b7;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .17em;
    }

    .story-cover-title {
        max-width: 850px;
        color: white;
        font-size: clamp(2.5rem, 6vw, 5.2rem);
        line-height: .98;
        font-weight: 900;
        letter-spacing: -.045em;
        text-shadow: 0 8px 35px rgba(0,0,0,.45);
    }

    /* =========================================================
       STORY META
    ========================================================= */

    .story-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
        padding: 28px 48px;
        border-top: 1px solid rgba(255,255,255,.06);
        background: rgba(255,255,255,.015);
    }

    .story-author {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .story-avatar {
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: linear-gradient(
            135deg,
            rgba(16,185,129,.18),
            rgba(59,130,246,.10)
        );
        border: 1px solid rgba(16,185,129,.25);
        color: #34d399;
        font-size: 14px;
        font-weight: 900;
    }

    .story-author-label {
        color: #64748b;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .16em;
        margin-bottom: 3px;
    }

    .story-author-name {
        color: white;
        font-size: 14px;
        font-weight: 800;
    }

    .story-date {
        color: #64748b;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .12em;
        font-weight: 700;
    }

    /* =========================================================
       ORIGINAL STORY CONTENT
    ========================================================= */

    .story-content {
        padding: 62px 48px 72px;
        border-top: 1px solid rgba(255,255,255,.055);
        background: rgba(5,8,20,.20);
    }

    .story-content-inner {
        max-width: 850px;
        margin: 0 auto;
    }

    .story-section-label {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        color: #34d399;
        font-size: 10px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .2em;
    }

    .story-section-label::before {
        content: "";
        width: 28px;
        height: 2px;
        border-radius: 10px;
        background: #34d399;
        box-shadow: 0 0 12px rgba(52,211,153,.5);
    }

    .story-text {
        color: #d1d5db;
        font-size: 17px;
        line-height: 2;
        letter-spacing: .005em;
        white-space: pre-line;
    }

    .story-text::first-letter {
        color: #34d399;
        font-size: 4rem;
        font-weight: 900;
        float: left;
        line-height: .78;
        padding-right: 10px;
        padding-top: 7px;
    }

    /* =========================================================
       CONTINUATIONS
    ========================================================= */

    .continuations {
        margin-top: 55px;
    }

    .continuations-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
        padding: 0 5px;
    }

    .continuations-kicker {
        color: #34d399;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .2em;
        margin-bottom: 8px;
    }

    .continuations-title {
        color: white;
        font-size: 34px;
        line-height: 1;
        font-weight: 900;
        letter-spacing: -.035em;
    }

    .fragment-count {
        padding: 9px 14px;
        border-radius: 999px;
        background: rgba(59,130,246,.07);
        border: 1px solid rgba(59,130,246,.16);
        color: #60a5fa;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .14em;
        white-space: nowrap;
    }

    /* =========================================================
       FRAGMENT CARDS
    ========================================================= */

    .fragment-list {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .fragment-card {
        position: relative;
        overflow: hidden;
        padding: 27px 30px 30px;
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 1.8rem;
        background:
            linear-gradient(
                135deg,
                rgba(255,255,255,.035),
                rgba(255,255,255,.012)
            );
        box-shadow: 0 15px 35px rgba(0,0,0,.18);
        transition:
            transform .35s ease,
            border-color .35s ease,
            box-shadow .35s ease;
    }

    .fragment-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(
            to bottom,
            #34d399,
            rgba(52,211,153,0)
        );
        opacity: .65;
    }

    .fragment-card:hover {
        transform: translateY(-4px);
        border-color: rgba(16,185,129,.20);
        box-shadow:
            0 20px 45px rgba(0,0,0,.25),
            0 0 35px rgba(16,185,129,.035);
    }

    .fragment-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 22px;
    }

    .fragment-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .fragment-avatar {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: rgba(16,185,129,.08);
        border: 1px solid rgba(16,185,129,.17);
        color: #34d399;
        font-size: 13px;
        font-weight: 900;
    }

    .fragment-name {
        color: white;
        font-size: 13px;
        font-weight: 800;
    }

    .fragment-date {
        margin-top: 3px;
        color: #64748b;
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: .12em;
        font-weight: 700;
    }

    .fragment-label {
        padding: 7px 11px;
        border-radius: 9px;
        background: rgba(16,185,129,.07);
        border: 1px solid rgba(16,185,129,.14);
        color: #6ee7b7;
        font-size: 8px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .16em;
    }

    .fragment-text {
        padding-left: 54px;
        color: #cbd5e1;
        font-size: 15px;
        line-height: 1.9;
        white-space: pre-line;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 65px 30px;
        text-align: center;
        border: 1px dashed rgba(255,255,255,.10);
        border-radius: 2rem;
        background: rgba(255,255,255,.018);
    }

    .empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: rgba(16,185,129,.07);
        border: 1px solid rgba(16,185,129,.14);
        color: #34d399;
        font-size: 21px;
    }

    .empty-title {
        color: white;
        font-size: 21px;
        font-weight: 900;
        margin-bottom: 8px;
    }

    .empty-text {
        max-width: 420px;
        margin: 0 auto;
        color: #64748b;
        font-size: 13px;
        line-height: 1.7;
    }

    /* =========================================================
       CONTINUE STORY
    ========================================================= */

    .continue-section {
        margin-top: 55px;
    }

    .continue-card {
        overflow: hidden;
        border: 1px solid rgba(16,185,129,.12);
        border-radius: 2.2rem;
        background:
            radial-gradient(
                circle at 100% 0%,
                rgba(16,185,129,.07),
                transparent 35%
            ),
            rgba(255,255,255,.025);
        box-shadow:
            0 25px 65px rgba(0,0,0,.25),
            inset 0 1px 0 rgba(255,255,255,.025);
    }

    .continue-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 30px 34px;
        border-bottom: 1px solid rgba(255,255,255,.06);
    }

    .continue-kicker {
        color: #34d399;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .2em;
        margin-bottom: 8px;
    }

    .continue-title {
        color: white;
        font-size: 29px;
        font-weight: 900;
        letter-spacing: -.03em;
    }

    .continue-description {
        margin-top: 5px;
        color: #64748b;
        font-size: 12px;
    }

    .continue-icon {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: rgba(16,185,129,.09);
        border: 1px solid rgba(16,185,129,.18);
        color: #34d399;
        font-size: 18px;
    }

    .continue-body {
        padding: 30px 34px 34px;
    }

    .continue-label {
        display: block;
        margin-bottom: 10px;
        color: #6ee7b7;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .18em;
    }

    .continue-textarea {
        width: 100%;
        min-height: 240px;
        margin: 0 !important;
        padding: 20px !important;
        resize: vertical;
        border-radius: 1.2rem !important;
        background: #0a0f1b !important;
        border: 1px solid rgba(255,255,255,.09) !important;
        color: #e5e7eb !important;
        font-family: 'Inter', sans-serif !important;
        font-size: 15px !important;
        line-height: 1.8 !important;
        outline: none !important;
        transition: border-color .25s ease, box-shadow .25s ease;
    }

    .continue-textarea::placeholder {
        color: #475569 !important;
    }

    .continue-textarea:focus {
        border-color: rgba(16,185,129,.45) !important;
        box-shadow: 0 0 0 4px rgba(16,185,129,.05) !important;
    }

    .continue-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 18px;
    }

    .continue-hint {
        color: #475569;
        font-size: 10px;
        line-height: 1.5;
    }

    .continue-button {
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .story-page {
            padding: 25px 12px 70px;
        }

        .story-topbar {
            margin-bottom: 15px;
        }

        .story-brand-text {
            display: none;
        }

        .story-main {
            border-radius: 1.7rem;
        }

        .story-cover {
            height: 370px;
        }

        .story-cover-info {
            left: 25px;
            right: 25px;
            bottom: 30px;
        }

        .story-cover-title {
            font-size: 2.7rem;
        }

        .story-meta {
            align-items: flex-start;
            flex-direction: column;
            padding: 22px 25px;
        }

        .story-content {
            padding: 40px 25px 50px;
        }

        .story-text {
            font-size: 15px;
            line-height: 1.9;
        }

        .continuations {
            margin-top: 40px;
        }

        .continuations-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .fragment-card {
            padding: 23px 20px 25px;
        }

        .fragment-header {
            align-items: flex-start;
        }

        .fragment-text {
            padding-left: 0;
            margin-top: 15px;
        }

        .continue-section {
            margin-top: 40px;
        }

        .continue-header {
            padding: 25px;
        }

        .continue-body {
            padding: 25px;
        }

        .continue-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .continue-button {
            width: 100%;
        }
    }

    @media (max-width: 480px) {

        .story-cover {
            height: 320px;
        }

        .story-cover-label {
            top: 16px;
            left: 16px;
        }

        .story-cover-title {
            font-size: 2.25rem;
        }

        .story-genre {
            margin-bottom: 11px;
        }

        .continuations-title {
            font-size: 28px;
        }

        .continue-title {
            font-size: 24px;
        }

        .continue-icon {
            display: none;
        }

        .fragment-label {
            display: none;
        }
    }
</style>


<div class="story-page">

    <div class="story-container">

        {{-- =====================================================
             TOP BAR
        ====================================================== --}}

        <div class="story-topbar">

            <div class="story-brand">
                <div class="story-brand-icon">
                    SV
                </div>

                <span class="story-brand-text">
                    Creative writing space
                </span>
            </div>

            <div class="story-open-status">
                <span class="story-open-dot"></span>
                Historia abierta
            </div>

        </div>


        {{-- =====================================================
             HISTORIA ORIGINAL
        ====================================================== --}}

        <article class="story-main">

            {{-- PORTADA --}}
            @if($story->cover)

                <div class="story-cover">

                    <img
                        src="{{ asset('storage/' . $story->cover) }}"
                        alt="Portada de {{ $story->title }}"
                    >

                    <div class="story-cover-label">
                        <span></span>
                        Historia original
                    </div>

                    <div class="story-cover-info">

                        <div class="story-genre">
                            {{ $story->genre }}
                        </div>

                        <h1 class="story-cover-title">
                            {{ $story->title }}
                        </h1>

                    </div>

                </div>

            @else

                <div class="story-cover">

                    <div class="story-cover-info">

                        <div class="story-genre">
                            {{ $story->genre }}
                        </div>

                        <h1 class="story-cover-title">
                            {{ $story->title }}
                        </h1>

                    </div>

                </div>

            @endif


            {{-- AUTOR --}}
            <div class="story-meta">

                <div class="story-author">

                    <div class="story-avatar">
                        {{ strtoupper(substr($story->user->name, 0, 1)) }}
                    </div>

                    <div>
                        <div class="story-author-label">
                            Historia creada por
                        </div>

                        <div class="story-author-name">
                            {{ $story->user->name }}
                        </div>
                    </div>

                </div>

                <div class="story-date">
                    Publicada {{ $story->created_at->diffForHumans() }}
                </div>

            </div>


            {{-- CONTENIDO --}}
            <div class="story-content">

                <div class="story-content-inner">

                    <div class="story-section-label">
                        Comienzo de la historia
                    </div>

                    <div class="story-text">
                        {{ $story->content }}
                    </div>

                </div>

            </div>

        </article>


        {{-- =====================================================
             CONTINUACIONES
        ====================================================== --}}

        <section class="continuations">

            <div class="continuations-header">

                <div>

                    <div class="continuations-kicker">
                        La historia continúa
                    </div>

                    <h2 class="continuations-title">
                        Continuaciones
                    </h2>

                </div>

                <div class="fragment-count">
                    {{ $story->fragments->count() }}
                    {{ $story->fragments->count() === 1 ? 'Fragmento' : 'Fragmentos' }}
                </div>

            </div>


            @if($story->fragments->count() > 0)

                <div class="fragment-list">

                    @foreach($story->fragments as $fragment)

                        <article class="fragment-card">

                            <div class="fragment-header">

                                <div class="fragment-user">

                                    <div class="fragment-avatar">
                                        {{ strtoupper(substr($fragment->user->name, 0, 1)) }}
                                    </div>

                                    <div>

                                        <div class="fragment-name">
                                            {{ $fragment->user->name }}
                                        </div>

                                        <div class="fragment-date">
                                            {{ $fragment->created_at->diffForHumans() }}
                                        </div>

                                    </div>

                                </div>

                                <div class="fragment-label">
                                    Fragmento
                                </div>

                            </div>


                            <div class="fragment-text">
                                {{ $fragment->content }}
                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        +
                    </div>

                    <div class="empty-title">
                        La historia está esperando
                    </div>

                    <p class="empty-text">
                        Todavía nadie ha escrito la siguiente parte.
                        Puedes ser la primera persona en decidir hacia dónde continúa.
                    </p>

                </div>

            @endif

        </section>


        {{-- =====================================================
             CONTINUAR HISTORIA
        ====================================================== --}}

        <section class="continue-section">

            <div class="continue-card">

                <div class="continue-header">

                    <div>

                        <div class="continue-kicker">
                            Tu turno
                        </div>

                        <h2 class="continue-title">
                            Continúa la historia
                        </h2>

                        <p class="continue-description">
                            Añade tu fragmento y deja que otro escritor continúe después de ti.
                        </p>

                    </div>

                    <div class="continue-icon">
                        →
                    </div>

                </div>


                <div class="continue-body">

                    <form
                        method="POST"
                        action="/stories/{{ $story->id }}/fragment"
                    >

                        @csrf

                        <label
                            for="content"
                            class="continue-label"
                        >
                            Tu continuación
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            class="continue-textarea"
                            rows="8"
                            maxlength="5000"
                            required
                            placeholder="Escribe lo que sucede a continuación..."
                        ></textarea>


                        <div class="continue-footer">

                            <p class="continue-hint">
                                Escribe con libertad.
                                <br>
                                Tu fragmento pasará a formar parte de la historia.
                            </p>

                            <button
                                type="submit"
                                class="btn-primary continue-button"
                            >
                                Publicar continuación
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </div>

</div>

</x-app-layout>