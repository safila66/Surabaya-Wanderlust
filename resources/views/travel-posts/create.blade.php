<style>
    .experience-page {
        min-height: calc(100vh - 80px);
        background: #f7f5f0;
        padding: 50px 20px 70px;
    }

    .experience-container {
        max-width: 920px;
        margin: 0 auto;
    }

    .experience-header {
        margin-bottom: 32px;
    }

    .experience-header .eyebrow {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #9a7654;
        margin-bottom: 10px;
    }

    .experience-header h1 {
        font-family: Georgia, serif;
        font-size: 42px;
        line-height: 1.15;
        color: #26352c;
        margin: 0 0 12px;
    }

    .experience-header p {
        color: #6f756f;
        font-size: 16px;
        max-width: 650px;
        margin: 0;
        line-height: 1.7;
    }

    .experience-card {
        background: #ffffff;
        border: 1px solid #e8e4dc;
        border-radius: 20px;
        padding: 34px;
        box-shadow: 0 12px 35px rgba(38, 53, 44, 0.06);
    }

    .form-section {
        margin-bottom: 28px;
    }

    .form-label-custom {
        display: block;
        font-size: 14px;
        font-weight: 700;
        color: #26352c;
        margin-bottom: 9px;
    }

    .form-help {
        font-size: 13px;
        color: #8a8f89;
        margin-top: 7px;
    }

    .form-control,
    .form-select {
        border: 1px solid #ddd9d0;
        border-radius: 11px;
        padding: 12px 14px;
        font-size: 14px;
        color: #303a34;
        box-shadow: none;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #9a7654;
        box-shadow: 0 0 0 3px rgba(154, 118, 84, 0.10);
    }

    textarea.form-control {
        min-height: 190px;
        resize: vertical;
        line-height: 1.7;
    }

    /* =========================
       RATING
    ========================= */

    .rating-box {
        border: 1px solid #e5e1d9;
        background: #faf9f6;
        border-radius: 14px;
        padding: 18px;
    }

    .rating-options {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 4px;
    }

    .rating-options input {
        display: none;
    }

    .rating-options label {
        font-size: 32px;
        color: #d6d2c9;
        cursor: pointer;
        line-height: 1;
        transition: 0.2s ease;
    }

    .rating-options label:hover,
    .rating-options label:hover ~ label,
    .rating-options input:checked ~ label {
        color: #d99a35;
    }

    .rating-text {
        margin-top: 9px;
        font-size: 13px;
        color: #777d77;
    }

    /* =========================
       PHOTO UPLOAD
    ========================= */

    .upload-box {
        border: 2px dashed #d8d2c7;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        background: #fbfaf7;
        transition: 0.2s ease;
    }

    .upload-box:hover {
        border-color: #9a7654;
        background: #faf8f3;
    }

    .upload-icon {
        width: 50px;
        height: 50px;
        margin: 0 auto 12px;
        border-radius: 50%;
        background: #eee9df;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #806449;
        font-size: 20px;
    }

    .upload-title {
        font-weight: 700;
        color: #303a34;
        margin-bottom: 5px;
    }

    .upload-desc {
        font-size: 13px;
        color: #8a8f89;
        margin-bottom: 16px;
        line-height: 1.6;
    }

    .upload-input {
        max-width: 100%;
        font-size: 13px;
    }

    /* =========================
       PREVIEW
    ========================= */

    .preview-wrapper {
        margin-top: 20px;
        display: none;
    }

    .preview-title {
        font-size: 14px;
        font-weight: 700;
        color: #26352c;
        margin-bottom: 12px;
    }

    .preview-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    .preview-item {
        position: relative;
        aspect-ratio: 1 / 1;
        border-radius: 12px;
        overflow: hidden;
        background: #eee;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .preview-number {
        position: absolute;
        top: 7px;
        left: 7px;
        background: rgba(0, 0, 0, 0.65);
        color: white;
        font-size: 11px;
        padding: 4px 7px;
        border-radius: 20px;
    }

    .remove-photo {
        position: absolute;
        top: 7px;
        right: 7px;
        width: 28px;
        height: 28px;
        border: none;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        font-size: 18px;
        line-height: 28px;
        padding: 0;
        cursor: pointer;
        z-index: 5;
        transition: 0.2s ease;
    }

    .remove-photo:hover {
        background: #000;
        transform: scale(1.05);
    }

    /* =========================
       BUTTON
    ========================= */

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        border-top: 1px solid #eeeae3;
        padding-top: 25px;
        margin-top: 10px;
    }

    .btn-cancel {
        color: #686f69;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-cancel:hover {
        color: #26352c;
    }

    .btn-publish {
        border: none;
        background: #26352c;
        color: white;
        padding: 12px 23px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        transition: 0.2s ease;
        cursor: pointer;
    }

    .btn-publish:hover {
        background: #17231c;
        transform: translateY(-1px);
    }

    /* =========================
       ALERT
    ========================= */

    .alert-custom {
        border: none;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 768px) {

        .experience-page {
            padding: 35px 15px 50px;
        }

        .experience-card {
            padding: 23px;
        }

        .experience-header h1 {
            font-size: 32px;
        }

        .preview-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-publish {
            width: 100%;
        }

        .btn-cancel {
            text-align: center;
        }
    }
</style>


<div class="experience-page">

    <div class="experience-container">

        {{-- HEADER --}}

        <div class="experience-header">

            <div class="eyebrow">
                Surabaya Wanderlust Community
            </div>

            <h1>
                Share Your Travel Experience
            </h1>

            <p>
                Ceritakan pengalaman perjalananmu dan bantu traveler lain
                menemukan tempat yang menarik untuk dikunjungi.
            </p>

        </div>


        {{-- ERROR --}}

        @if ($errors->any())

            <div class="alert alert-danger alert-custom">

                <strong>Oops!</strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}

        <div class="experience-card">

            <form
                action="{{ route('travel-posts.store') }}"
                method="POST"
                enctype="multipart/form-data"
                id="travelExperienceForm"
            >

                @csrf


                {{-- DESTINATION --}}

                <div class="form-section">

                    <label class="form-label-custom">
                        Destination
                    </label>

                    <select
                        name="destination_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Choose the destination you visited
                        </option>

                        @foreach ($destinations as $destination)

                            <option
                                value="{{ $destination->id }}"
                                {{ old('destination_id') == $destination->id ? 'selected' : '' }}
                            >

                                {{ $destination->name }}
                                —
                                {{ $destination->regency->name }},
                                {{ $destination->regency->province->name }}

                            </option>

                        @endforeach

                    </select>

                    <div class="form-help">
                        Pilih destinasi yang sesuai dengan pengalaman perjalananmu.
                    </div>

                </div>


                {{-- TITLE --}}

                <div class="form-section">

                    <label class="form-label-custom">
                        Story Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        placeholder="Contoh: Sunset yang Indah di Pantai Klayar"
                        maxlength="150"
                        required
                    >

                    <div class="form-help">
                        Buat judul singkat yang menggambarkan pengalamanmu.
                    </div>

                </div>


                {{-- RATING --}}

                <div class="form-section">

                    <label class="form-label-custom">
                        Your Rating
                    </label>

                    <div class="rating-box">

                        <div class="rating-options">

                            <input
                                type="radio"
                                id="star5"
                                name="rating"
                                value="5"
                                {{ old('rating', 5) == 5 ? 'checked' : '' }}
                            >

                            <label for="star5" title="5 stars">
                                ★
                            </label>


                            <input
                                type="radio"
                                id="star4"
                                name="rating"
                                value="4"
                                {{ old('rating') == 4 ? 'checked' : '' }}
                            >

                            <label for="star4" title="4 stars">
                                ★
                            </label>


                            <input
                                type="radio"
                                id="star3"
                                name="rating"
                                value="3"
                                {{ old('rating') == 3 ? 'checked' : '' }}
                            >

                            <label for="star3" title="3 stars">
                                ★
                            </label>


                            <input
                                type="radio"
                                id="star2"
                                name="rating"
                                value="2"
                                {{ old('rating') == 2 ? 'checked' : '' }}
                            >

                            <label for="star2" title="2 stars">
                                ★
                            </label>


                            <input
                                type="radio"
                                id="star1"
                                name="rating"
                                value="1"
                                {{ old('rating') == 1 ? 'checked' : '' }}
                            >

                            <label for="star1" title="1 star">
                                ★
                            </label>

                        </div>

                        <div class="rating-text">
                            Berikan penilaian berdasarkan pengalamanmu sendiri.
                        </div>

                    </div>

                </div>


                {{-- STORY --}}

                <div class="form-section">

                    <label class="form-label-custom">
                        Your Story
                    </label>

                    <textarea
                        name="content"
                        class="form-control"
                        placeholder="Ceritakan pengalamanmu selama berada di destinasi ini. Apa yang paling kamu sukai? Ada tips untuk traveler lain?"
                        maxlength="5000"
                        required
                    >{{ old('content') }}</textarea>

                    <div class="form-help">
                        Maksimal 5.000 karakter.
                    </div>

                </div>


                {{-- PHOTOS --}}

                <div class="form-section">

                    <label class="form-label-custom">
                        Travel Photos
                    </label>

                    <div class="upload-box">

                        <div class="upload-icon">
                            <i class="fa-solid fa-images"></i>
                        </div>

                        <div class="upload-title">
                            Add photos from your journey
                        </div>

                        <div class="upload-desc">
                            Pilih beberapa foto sekaligus atau tambahkan foto
                            secara bertahap. Maksimal 10 foto, masing-masing 5 MB.
                        </div>

                        <input
                            type="file"
                            id="photos"
                            class="form-control upload-input"
                            multiple
                            accept="image/jpeg,image/png,image/webp"
                        >

                    </div>


                    {{-- PREVIEW --}}

                    <div
                        class="preview-wrapper"
                        id="previewWrapper"
                    >

                        <div class="preview-title">
                            Photo Preview
                        </div>

                        <div
                            class="preview-grid"
                            id="previewGrid"
                        ></div>

                    </div>

                </div>


                {{-- BUTTON --}}

                <div class="form-actions">

                    <a
                        href="{{ route('travel-posts.index') }}"
                        class="btn-cancel"
                    >
                        ← Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn-publish"
                    >

                        <i class="fa-solid fa-paper-plane me-2"></i>

                        Publish Story

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

    const photoInput =
        document.getElementById('photos');

    const previewWrapper =
        document.getElementById('previewWrapper');

    const previewGrid =
        document.getElementById('previewGrid');

    const form =
        document.getElementById('travelExperienceForm');


    /*
    |--------------------------------------------------------------------------
    | MENYIMPAN SEMUA FILE
    |--------------------------------------------------------------------------
    */

    let selectedFiles = [];


    /*
    |--------------------------------------------------------------------------
    | KETIKA FOTO DIPILIH
    |--------------------------------------------------------------------------
    */

    photoInput.addEventListener('change', function () {

        const newFiles =
            Array.from(this.files);


        /*
        |----------------------------------------------------------------------
        | Tambahkan foto baru ke daftar sebelumnya
        |----------------------------------------------------------------------
        */

        selectedFiles = [
            ...selectedFiles,
            ...newFiles
        ];


        /*
        |----------------------------------------------------------------------
        | Maksimal 10 foto
        |----------------------------------------------------------------------
        */

        if (selectedFiles.length > 10) {

            alert(
                'Maksimal 10 foto yang dapat diupload.'
            );

            selectedFiles =
                selectedFiles.slice(0, 10);
        }


        /*
        |----------------------------------------------------------------------
        | Tampilkan preview
        |----------------------------------------------------------------------
        */

        updatePreview();


        /*
        |----------------------------------------------------------------------
        | Reset input
        |
        | Supaya user dapat memilih foto lagi
        | tanpa menghilangkan foto sebelumnya.
        |----------------------------------------------------------------------
        */

        this.value = '';

    });


    /*
    |--------------------------------------------------------------------------
    | UPDATE PREVIEW
    |--------------------------------------------------------------------------
    */

    function updatePreview() {

        previewGrid.innerHTML = '';


        if (selectedFiles.length === 0) {

            previewWrapper.style.display = 'none';

            return;
        }


        previewWrapper.style.display = 'block';


        selectedFiles.forEach((file, index) => {

            if (!file.type.startsWith('image/')) {
                return;
            }


            const reader =
                new FileReader();


            reader.onload = function (event) {

                const item =
                    document.createElement('div');


                item.className =
                    'preview-item';


                item.innerHTML = `
                    <img
                        src="${event.target.result}"
                        alt="Preview ${index + 1}"
                    >

                    <span class="preview-number">
                        ${index + 1}
                    </span>

                    <button
                        type="button"
                        class="remove-photo"
                        onclick="removePhoto(${index})"
                        title="Hapus foto"
                    >
                        ×
                    </button>
                `;


                previewGrid.appendChild(item);

            };


            reader.readAsDataURL(file);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS FOTO
    |--------------------------------------------------------------------------
    */

    function removePhoto(index) {

        selectedFiles.splice(index, 1);

        updatePreview();

    }


    /*
    |--------------------------------------------------------------------------
    | SEBELUM FORM DIKIRIM
    |--------------------------------------------------------------------------
    */

    form.addEventListener('submit', function (event) {


        /*
        |----------------------------------------------------------------------
        | Minimal 1 foto
        |----------------------------------------------------------------------
        */

        if (selectedFiles.length === 0) {

            event.preventDefault();

            alert(
                'Silakan pilih minimal 1 foto.'
            );

            return;
        }


        /*
        |----------------------------------------------------------------------
        | Maksimal 10 foto
        |----------------------------------------------------------------------
        */

        if (selectedFiles.length > 10) {

            event.preventDefault();

            alert(
                'Maksimal 10 foto.'
            );

            return;
        }


        /*
        |----------------------------------------------------------------------
        | Gabungkan semua foto
        |----------------------------------------------------------------------
        */

        const dataTransfer =
            new DataTransfer();


        selectedFiles.forEach(file => {

            dataTransfer.items.add(file);

        });


        photoInput.files =
            dataTransfer.files;


        /*
        |----------------------------------------------------------------------
        | Nama input untuk Laravel
        |----------------------------------------------------------------------
        */

        photoInput.name =
            'photos[]';

    });

</script>
