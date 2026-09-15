<x-app-layout>

    <style>
        /* =========================================================
           STORYVERSE — CREATE STORY
        ========================================================= */

        .story-create-page {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            background:
                radial-gradient(circle at 15% 10%, rgba(16,185,129,.10), transparent 30%),
                radial-gradient(circle at 85% 25%, rgba(59,130,246,.08), transparent 28%),
                #050814;
        }

        .ambient-light {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 999px;
            filter: blur(120px);
            pointer-events: none;
            opacity: .16;
        }

        .ambient-light.one {
            top: 100px;
            left: -250px;
            background: #10b981;
        }

        .ambient-light.two {
            top: 700px;
            right: -300px;
            background: #6366f1;
        }

        .story-container {
            position: relative;
            z-index: 2;
            max-width: 1250px;
            margin: auto;
            padding: 55px 24px 100px;
        }

        .story-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 35px;
        }

        .story-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .story-brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #10b981, #34d399);
            color: #04130e;
            font-weight: 900;
            box-shadow: 0 10px 35px rgba(16,185,129,.25);
        }

        .story-brand-text strong {
            display: block;
            font-size: 13px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: white;
        }

        .story-brand-text span {
            display: block;
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
        }

        .story-status {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 14px;
            border: 1px solid rgba(255,255,255,.07);
            background: rgba(255,255,255,.025);
            border-radius: 999px;
            font-size: 11px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .1em;
            backdrop-filter: blur(20px);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #34d399;
            box-shadow: 0 0 14px rgba(52,211,153,.8);
        }

        .story-hero {
            position: relative;
            min-height: 300px;
            border-radius: 32px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.08);
            background: #080d19;
            margin-bottom: 28px;
        }

        .story-hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .24;
            filter: saturate(.75);
        }

        .story-hero-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    0deg,
                    #0a0b0a 0%,
                    transparent 100%
                );
        }

        .story-hero-content {
            position: relative;
            z-index: 2;
            padding: 55px;
            max-width: 780px;
        }

        .story-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(16,185,129,.09);
            border: 1px solid rgba(52,211,153,.2);
            color: #34d399;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .story-eyebrow span {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #34d399;
        }

        .story-hero h1 {
            margin: 0;
            font-size: clamp(42px, 6vw, 76px);
            line-height: .95;
            letter-spacing: -.065em;
            font-weight: 900;
            color: white;
        }

        .story-hero h1 em {
            font-style: normal;
            color: #34d399;
        }

        .story-hero-description {
            margin-top: 20px;
            max-width: 620px;
            color: #94a3b8;
            font-size: 15px;
            line-height: 1.8;
        }

        .story-workspace {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;
            gap: 28px;
            align-items: start;
        }

        .story-editor {
            border: 1px solid rgba(255,255,255,.075);
            border-radius: 30px;
            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.045),
                    rgba(255,255,255,.018)
                );
            box-shadow:
                0 30px 90px rgba(0,0,0,.25),
                inset 0 1px 0 rgba(255,255,255,.035);
            backdrop-filter: blur(25px);
            overflow: hidden;
        }

        .editor-header {
            padding: 28px 32px;
            border-bottom: 1px solid rgba(255,255,255,.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .editor-header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .step-number {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(16,185,129,.1);
            border: 1px solid rgba(52,211,153,.16);
            color: #34d399;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 12px;
        }

        .editor-header strong {
            color: white;
            font-size: 14px;
        }

        .editor-header small {
            display: block;
            color: #64748b;
            font-size: 11px;
            margin-top: 3px;
        }

        .draft-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .13em;
            color: #64748b;
        }

        .editor-body {
            padding: 38px;
        }

        .field {
            margin-bottom: 30px;
        }

        .field-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 11px;
        }

        .field-label-main {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #e2e8f0;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .13em;
        }

        .field-number {
            color: #34d399;
            opacity: .7;
        }

        .field-help {
            color: #475569;
            font-size: 10px;
        }

        .story-input,
        .story-select,
        .story-textarea {
            width: 100%;
            border: 1px solid rgba(255,255,255,.09);
            background: rgba(5,8,20,.72);
            color: white;
            transition: .25s ease;
            outline: none;
        }

        .story-input {
            height: 72px;
            border-radius: 18px;
            padding: 0 22px;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -.025em;
        }

        .story-input::placeholder,
        .story-textarea::placeholder {
            color: #334155;
        }

        .story-input:focus,
        .story-select:focus,
        .story-textarea:focus {
            border-color: rgba(52,211,153,.65);
            background: rgba(13,20,34,.95);
            box-shadow:
                0 0 0 4px rgba(16,185,129,.07),
                0 15px 40px rgba(0,0,0,.15);
        }

        .genre-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 9px;
        }

        .genre-option {
            position: relative;
        }

        .genre-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .genre-option label {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 10px;
            border-radius: 14px;
            border: 1px solid rgba(255,255,255,.07);
            background: rgba(255,255,255,.018);
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
            text-align: center;
        }

        .genre-option label:hover {
            border-color: rgba(52,211,153,.3);
            color: #cbd5e1;
            transform: translateY(-2px);
        }

        .genre-option input:checked + label {
            background: rgba(16,185,129,.10);
            border-color: rgba(52,211,153,.5);
            color: #34d399;
            box-shadow: inset 0 0 20px rgba(16,185,129,.04);
        }

        .cover-upload {
            position: relative;
            border: 1px dashed rgba(255,255,255,.14);
            border-radius: 20px;
            min-height: 170px;
            overflow: hidden;
            background: rgba(5,8,20,.45);
            transition: .25s ease;
        }

        .cover-upload:hover {
            border-color: rgba(52,211,153,.45);
            background: rgba(16,185,129,.025);
        }

        .cover-upload-label {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-align: center;
            z-index: 2;
        }

        .upload-icon {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            background: rgba(255,255,255,.04);
            border: 1px solid rgba(255,255,255,.08);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            color: #34d399;
            font-size: 20px;
        }

        .upload-title {
            color: #cbd5e1;
            font-weight: 700;
            font-size: 12px;
        }

        .upload-subtitle {
            color: #475569;
            font-size: 10px;
            margin-top: 5px;
        }

        #cover-preview {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            z-index: 1;
        }

        .cover-upload.has-preview::after {
            content: "Cambiar portada";
            position: absolute;
            z-index: 3;
            right: 14px;
            bottom: 14px;
            padding: 8px 12px;
            border-radius: 10px;
            background: rgba(5,8,20,.82);
            border: 1px solid rgba(255,255,255,.1);
            color: white;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .content-wrapper {
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,.09);
            overflow: hidden;
            background: rgba(5,8,20,.72);
        }

        .content-toolbar {
            height: 46px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 15px;
            border-bottom: 1px solid rgba(255,255,255,.06);
            color: #475569;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .1em;
        }

        .toolbar-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #34d399;
            box-shadow: 0 0 10px rgba(52,211,153,.5);
        }

        .story-textarea {
            min-height: 340px;
            resize: vertical;
            border: none;
            border-radius: 0;
            padding: 25px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 17px;
            line-height: 1.9;
            background: transparent;
        }

        .story-textarea:focus {
            box-shadow: none;
            background: rgba(255,255,255,.008);
        }

        .content-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 18px;
            border-top: 1px solid rgba(255,255,255,.05);
            color: #475569;
            font-size: 10px;
        }

        .character-count {
            color: #64748b;
        }

        .editor-footer {
            padding: 25px 32px;
            border-top: 1px solid rgba(255,255,255,.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .save-note {
            color: #475569;
            font-size: 10px;
            line-height: 1.5;
        }

        .publish-button {
            position: relative;
            min-width: 190px;
            height: 54px;
            border: 0;
            border-radius: 15px;
            background: linear-gradient(135deg, #10b981, #34d399);
            color: #03120d;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .1em;
            text-transform: uppercase;
            cursor: pointer;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(16,185,129,.2);
            transition: .25s ease;
        }

        .publish-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 45px rgba(16,185,129,.3);
        }

        .publish-button:active {
            transform: translateY(0);
        }

        .publish-button::after {
            content: "";
            position: absolute;
            top: -100%;
            left: -30%;
            width: 30%;
            height: 300%;
            transform: rotate(25deg);
            background: rgba(255,255,255,.2);
            transition: .6s ease;
        }

        .publish-button:hover::after {
            left: 120%;
        }

        .story-sidebar {
            position: sticky;
            top: 25px;
        }

        .side-card {
            border: 1px solid rgba(255,255,255,.075);
            border-radius: 26px;
            background: rgba(255,255,255,.025);
            backdrop-filter: blur(20px);
            overflow: hidden;
            margin-bottom: 18px;
        }

        .side-card-header {
            padding: 22px 22px 16px;
            border-bottom: 1px solid rgba(255,255,255,.055);
        }

        .side-card-header small {
            display: block;
            color: #34d399;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .15em;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .side-card-header strong {
            color: white;
            font-size: 16px;
            letter-spacing: -.02em;
        }

        .side-card-body {
            padding: 20px;
        }

        .tip {
            display: flex;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid rgba(255,255,255,.05);
        }

        .tip:first-child {
            padding-top: 0;
        }

        .tip:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .tip-icon {
            flex: 0 0 32px;
            height: 32px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(16,185,129,.08);
            color: #34d399;
            font-size: 12px;
            font-weight: 900;
        }

        .tip strong {
            display: block;
            color: #cbd5e1;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .tip span {
            color: #475569;
            font-size: 10px;
            line-height: 1.5;
        }

        .quote-card {
            position: relative;
            padding: 24px;
            border-radius: 24px;
            background:
                linear-gradient(
                    145deg,
                    rgba(16,185,129,.08),
                    rgba(255,255,255,.015)
                );
            border: 1px solid rgba(52,211,153,.12);
            overflow: hidden;
        }

        .quote-card::before {
            content: "“";
            position: absolute;
            right: 15px;
            top: -15px;
            font-size: 100px;
            line-height: 1;
            color: rgba(52,211,153,.07);
            font-family: Georgia, serif;
        }

        .quote-card p {
            position: relative;
            z-index: 1;
            margin: 0;
            color: #94a3b8;
            font-family: Georgia, serif;
            font-size: 15px;
            line-height: 1.7;
        }

        .story-error {
            color: #fb7185;
            font-size: 11px;
            margin-top: 7px;
        }

        @media (max-width: 1000px) {

            .story-workspace {
                grid-template-columns: 1fr;
            }

            .story-sidebar {
                position: static;
            }

            .genre-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 700px) {

            .story-container {
                padding: 25px 14px 70px;
            }

            .story-topbar {
                margin-bottom: 20px;
            }

            .story-status {
                display: none;
            }

            .story-hero {
                min-height: 340px;
                border-radius: 24px;
            }

            .story-hero-content {
                padding: 35px 25px;
            }

            .story-hero h1 {
                font-size: 46px;
            }

            .story-editor {
                border-radius: 24px;
            }

            .editor-body {
                padding: 25px 20px;
            }

            .editor-header {
                padding: 22px 20px;
            }

            .editor-footer {
                padding: 22px 20px;
                flex-direction: column;
                align-items: stretch;
            }

            .publish-button {
                width: 100%;
            }

            .genre-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .story-input {
                font-size: 19px;
            }
        }
    </style>

    <div class="story-create-page">

        <div class="ambient-light one"></div>
        <div class="ambient-light two"></div>

        <div class="story-container">

            <!-- =====================================================
                 TOP BAR
            ====================================================== -->

            <div class="story-topbar">

                <div class="story-brand">

                    <div class="story-brand-mark">
                        SV
                    </div>

                    <div class="story-brand-text">

                        <strong>
                            StoryVerse
                        </strong>

                        <span>
                            Creative writing space
                        </span>

                    </div>

                </div>

                <div class="story-status">

                    <span class="status-dot"></span>

                    Editor listo

                </div>

            </div>


            <!-- =====================================================
                 HERO
            ====================================================== -->

            <section class="story-hero">

                <img
                    src="{{ asset('img/8.gif') }}"
                    class="story-hero-image"
                    alt=""
                >

                <div class="story-hero-overlay"></div>

                <div class="story-hero-content">

                    <div class="story-eyebrow">

                        <span></span>

                        Nueva narrativa

                    </div>

                    <h1>

                        Tu historia

                        <br>

                        <em>
                            comienza aquí.
                        </em>

                    </h1>

                    <p class="story-hero-description">

                        Crea el universo, define su esencia y escribe
                        el primer fragmento de una historia que puede
                        continuar mucho más allá de ti.

                    </p>

                </div>

            </section>


            <!-- =====================================================
                 WORKSPACE
            ====================================================== -->

            <div class="story-workspace">


                <!-- =================================================
                     EDITOR
                ================================================== -->

                <div class="story-editor">


                    <!-- EDITOR HEADER -->

                    <div class="editor-header">

                        <div class="editor-header-left">

                            <div class="step-number">
                                01
                            </div>

                            <div>

                                <strong>
                                    Construye el comienzo
                                </strong>

                                <small>
                                    Define los elementos principales de tu historia
                                </small>

                            </div>

                        </div>

                        <span class="draft-label">
                            Nuevo manuscrito
                        </span>

                    </div>


                    <!-- EDITOR BODY -->

                    <div class="editor-body">

                        <form
                            method="POST"
                            action="/stories"
                            enctype="multipart/form-data"
                            id="story-form"
                        >

                            @csrf


                            <!-- =====================================
                                 TÍTULO
                            ====================================== -->

                            <div class="field">

                                <div class="field-label">

                                    <div class="field-label-main">

                                        <span class="field-number">
                                            01
                                        </span>

                                        Título

                                    </div>

                                    <span class="field-help">
                                        Dale identidad
                                    </span>

                                </div>


                                <input
                                    type="text"
                                    name="title"
                                    class="story-input"
                                    value="{{ old('title') }}"
                                    maxlength="120"
                                    placeholder="Escribe el título de tu historia..."
                                    required
                                >


                                @error('title')

                                    <div class="story-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- =====================================
                                 GÉNERO
                            ====================================== -->

                            <div class="field">

                                <div class="field-label">

                                    <div class="field-label-main">

                                        <span class="field-number">
                                            02
                                        </span>

                                        Género

                                    </div>

                                    <span class="field-help">
                                        ¿Qué tipo de mundo estás creando?
                                    </span>

                                </div>


                                <div class="genre-grid">

                                    @php

                                        $genres = [
                                            'Terror',
                                            'Fantasía',
                                            'Romance',
                                            'Ciencia Ficción',
                                            'Misterio',
                                            'Drama',
                                            'Acción'
                                        ];

                                    @endphp


                                    @foreach($genres as $genre)

                                        <div class="genre-option">

                                            <input
                                                type="radio"
                                                id="genre-{{ Str::slug($genre) }}"
                                                name="genre"
                                                value="{{ $genre }}"
                                                {{ old('genre') === $genre ? 'checked' : '' }}
                                                required
                                            >

                                            <label
                                                for="genre-{{ Str::slug($genre) }}"
                                            >
                                                {{ $genre }}
                                            </label>

                                        </div>

                                    @endforeach

                                </div>


                                @error('genre')

                                    <div class="story-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- =====================================
                                 PORTADA
                            ====================================== -->

                            <div class="field">

                                <div class="field-label">

                                    <div class="field-label-main">

                                        <span class="field-number">
                                            03
                                        </span>

                                        Portada

                                    </div>

                                    <span class="field-help">
                                        Opcional
                                    </span>

                                </div>


                                <div
                                    class="cover-upload"
                                    id="cover-upload"
                                >

                                    <img
                                        id="cover-preview"
                                        alt="Vista previa de portada"
                                    >


                                    <label
                                        for="cover"
                                        class="cover-upload-label"
                                    >

                                        <div class="upload-icon">
                                            ↑
                                        </div>

                                        <div class="upload-title">
                                            Elige una portada
                                        </div>

                                        <div class="upload-subtitle">
                                            PNG, JPG, WEBP · Recomendado 16:9
                                        </div>

                                    </label>


                                    <input
                                        type="file"
                                        name="cover"
                                        id="cover"
                                        accept="image/*"
                                        hidden
                                    >

                                </div>


                                @error('cover')

                                    <div class="story-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- =====================================
                                 PRIMER FRAGMENTO
                            ====================================== -->

                            <div class="field">

                                <div class="field-label">

                                    <div class="field-label-main">

                                        <span class="field-number">
                                            04
                                        </span>

                                        Primer fragmento

                                    </div>

                                    <span class="field-help">
                                        Abre la puerta a tu mundo
                                    </span>

                                </div>


                                <div class="content-wrapper">


                                    <div class="content-toolbar">

                                        <span class="toolbar-dot"></span>

                                        Editor narrativo

                                    </div>


                                    <textarea
                                        name="content"
                                        id="story-content"
                                        class="story-textarea"
                                        maxlength="5000"
                                        placeholder="Todo comienza con una primera frase..."
                                        required
                                    >{{ old('content') }}</textarea>


                                    <div class="content-footer">

                                        <span>
                                            Escribe libremente
                                        </span>

                                        <span class="character-count">

                                            <strong id="character-counter">
                                                0
                                            </strong>

                                            / 5000

                                        </span>

                                    </div>

                                </div>


                                @error('content')

                                    <div class="story-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </form>

                    </div>


                    <!-- =============================================
                         EDITOR FOOTER
                    ============================================== -->

                    <div class="editor-footer">

                        <div class="save-note">

                            Tu historia quedará disponible para continuarla
                            <br>
                            y construirla junto a otros escritores.

                        </div>


                        <button
                            type="submit"
                            form="story-form"
                            class="publish-button"
                        >

                            Publicar historia →

                        </button>

                    </div>

                </div>


                <!-- =================================================
                     SIDEBAR
                ================================================== -->

                <aside class="story-sidebar">


                    <!-- =============================================
                         GUÍA RÁPIDA
                    ============================================== -->

                    <div class="side-card">

                        <div class="side-card-header">

                            <small>
                                Guía rápida
                            </small>

                            <strong>
                                Haz que quieran continuar
                            </strong>

                        </div>


                        <div class="side-card-body">


                            <div class="tip">

                                <div class="tip-icon">
                                    01
                                </div>

                                <div>

                                    <strong>
                                        Empieza con algo
                                    </strong>

                                    <span>
                                        Una situación interesante puede ser
                                        mejor que una larga explicación.
                                    </span>

                                </div>

                            </div>


                            <div class="tip">

                                <div class="tip-icon">
                                    02
                                </div>

                                <div>

                                    <strong>
                                        Deja preguntas
                                    </strong>

                                    <span>
                                        Un pequeño misterio hace que el lector
                                        quiera descubrir más.
                                    </span>

                                </div>

                            </div>


                            <div class="tip">

                                <div class="tip-icon">
                                    03
                                </div>

                                <div>

                                    <strong>
                                        Abre posibilidades
                                    </strong>

                                    <span>
                                        Recuerda que otros usuarios podrán
                                        continuar tu historia.
                                    </span>

                                </div>

                            </div>


                        </div>

                    </div>


                    <!-- =============================================
                         CONSEJOS
                    ============================================== -->

                    <div class="side-card">

                        <div class="side-card-header">

                            <small>
                                Consejos
                            </small>

                            <strong>
                                Construye tu narrativa
                            </strong>

                        </div>


                        <div class="side-card-body">


                            <div class="tip">

                                <div class="tip-icon">
                                    ✦
                                </div>

                                <div>

                                    <strong>
                                        Crea una atmósfera
                                    </strong>

                                    <span>
                                        Haz que el lector pueda imaginar
                                        dónde comienza la historia.
                                    </span>

                                </div>

                            </div>


                            <div class="tip">

                                <div class="tip-icon">
                                    ◆
                                </div>

                                <div>

                                    <strong>
                                        Presenta un conflicto
                                    </strong>

                                    <span>
                                        Una situación que necesite resolverse
                                        puede darle dirección al relato.
                                    </span>

                                </div>

                            </div>


                            <div class="tip">

                                <div class="tip-icon">
                                    →
                                </div>

                                <div>

                                    <strong>
                                        Piensa en el siguiente escritor
                                    </strong>

                                    <span>
                                        Deja suficientes posibilidades para que
                                        alguien pueda continuar tu historia.
                                    </span>

                                </div>

                            </div>


                        </div>

                    </div>


                    <!-- =============================================
                         FRASE
                    ============================================== -->

                    <div class="quote-card">

                        <p>

                            Una historia no necesita comenzar
                            perfecta. Solo necesita comenzar.

                        </p>

                    </div>


                </aside>

            </div>

        </div>

    </div>


    <!-- =============================================================
         JAVASCRIPT
    ============================================================= -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /* =====================================================
               ELEMENTOS
            ====================================================== */

            const content =
                document.getElementById('story-content');

            const counter =
                document.getElementById('character-counter');

            const cover =
                document.getElementById('cover');

            const preview =
                document.getElementById('cover-preview');

            const uploadBox =
                document.getElementById('cover-upload');


            /* =====================================================
               CONTADOR DE CARACTERES
            ====================================================== */

            function updateCounter() {

                const length =
                    content.value.length;

                counter.textContent =
                    length;

            }


            content.addEventListener(
                'input',
                updateCounter
            );


            updateCounter();


            /* =====================================================
               VISTA PREVIA DE PORTADA
            ====================================================== */

            cover.addEventListener(
                'change',
                function () {

                    const file =
                        this.files[0];


                    if (!file) {
                        return;
                    }


                    const reader =
                        new FileReader();


                    reader.onload =
                        function (event) {

                            preview.src =
                                event.target.result;

                            preview.style.display =
                                'block';

                            uploadBox.classList.add(
                                'has-preview'
                            );

                        };


                    reader.readAsDataURL(file);

                }
            );

        });

    </script>

</x-app-layout>