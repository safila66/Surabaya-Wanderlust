@php
    $min    = 0;
    $max    = $max  ?? 1000000;
    $step   = $step ?? 10000;
    $curMin = max($min, min((int) request('price_min', $min), $max));
    $curMax = max($min, min((int) request('price_max', $max), $max));
@endphp

<div class="price-slider" data-min="{{ $min }}" data-max="{{ $max }}">
    <label style="display:block; font-size:13px; font-weight:bold; margin-bottom:8px; color:var(--text-primary);">
        Range Harga / Budget
    </label>
    <div style="font-size:13px; margin-bottom:6px; color:var(--text-primary);">
        <span class="ps-min-text"></span> – <span class="ps-max-text"></span>
    </div>
    <div class="ps-track">
        <div class="ps-fill"></div>
        <input type="range" class="ps-min" name="price_min"
               min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" value="{{ $curMin }}">
        <input type="range" class="ps-max" name="price_max"
               min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" value="{{ $curMax }}">
    </div>
</div>

@once
<style>
    .ps-track { position: relative; height: 24px; }
    .ps-track::before {
        content: ''; position: absolute; left: 0; right: 0; top: 50%;
        height: 4px; margin-top: -2px; border-radius: 2px; background: var(--border);
    }
    .ps-fill {
        position: absolute; top: 50%; height: 4px; margin-top: -2px;
        border-radius: 2px; background: var(--gold);
    }
    .ps-track input[type=range] {
        position: absolute; left: 0; top: 0; width: 100%; height: 24px; margin: 0;
        background: none; pointer-events: none;
        -webkit-appearance: none; appearance: none;
    }
    .ps-max { z-index: 2; }
    .ps-track input[type=range]::-webkit-slider-runnable-track { background: transparent; }
    .ps-track input[type=range]::-moz-range-track { background: transparent; }
    .ps-track input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none; pointer-events: auto; cursor: pointer;
        width: 18px; height: 18px; border-radius: 50%;
        background: var(--gold); border: 2px solid #fff;
    }
    .ps-track input[type=range]::-moz-range-thumb {
        pointer-events: auto; cursor: pointer;
        width: 14px; height: 14px; border-radius: 50%;
        background: var(--gold); border: 2px solid #fff;
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.price-slider').forEach(function (box) {
        var lo = box.querySelector('.ps-min'), hi = box.querySelector('.ps-max');
        var fill = box.querySelector('.ps-fill');
        var lowText = box.querySelector('.ps-min-text');
        var highText = box.querySelector('.ps-max-text');
        var MIN = +box.dataset.min, MAX = +box.dataset.max;

        function update(e) {
            var a = +lo.value, b = +hi.value;
            if (a > b) {                       // handle tidak boleh saling melewati
                if (e && e.target === lo) { a = b; lo.value = a; }
                else { b = a; hi.value = b; }
            }
            fill.style.left  = ((a - MIN) / (MAX - MIN) * 100) + '%';
            fill.style.width = ((b - a) / (MAX - MIN) * 100) + '%';
            lowText.textContent  = 'Rp ' + a.toLocaleString('id-ID');
            highText.textContent = 'Rp ' + b.toLocaleString('id-ID') + (b === MAX ? '+' : '');
            lo.style.zIndex = a > (MIN + MAX) / 2 ? 3 : 1;  // supaya handle tidak "terkunci" di ujung
        }
        lo.addEventListener('input', update);
        hi.addEventListener('input', update);

        function submitForm() {
            var form = box.closest('form');
            if (form) { form.submit(); }
        }
        lo.addEventListener('change', submitForm);
        hi.addEventListener('change', submitForm);
        update();
    });
});
</script>
@endonce