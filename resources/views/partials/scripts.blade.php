{{-- =========================================================
     JAVASCRIPT
========================================================== --}}

<script>


    /* =========================================================
       FEATURED REGION SLIDER
    ========================================================== */

    let featuredCurrent = 0;

    const featuredSlides =
        document.querySelectorAll('.featured-slide');

    const featuredDots =
        document.querySelectorAll('.featured-dot');

    let featuredAutoSlide;


    function showFeaturedSlide(index) {

        if (featuredSlides.length === 0) {
            return;
        }


        if (index >= featuredSlides.length) {

            featuredCurrent = 0;

        } else if (index < 0) {

            featuredCurrent =
                featuredSlides.length - 1;

        } else {

            featuredCurrent = index;

        }


        featuredSlides.forEach(
            (slide, i) => {

                slide.classList.toggle(
                    'active',
                    i === featuredCurrent
                );

            }
        );


        featuredDots.forEach(
            (dot, i) => {

                dot.classList.toggle(
                    'active',
                    i === featuredCurrent
                );

            }
        );

    }


    function changeFeaturedSlide(direction) {

        showFeaturedSlide(
            featuredCurrent + direction
        );

        resetFeaturedAutoSlide();

    }


    function goToFeaturedSlide(index) {

        showFeaturedSlide(index);

        resetFeaturedAutoSlide();

    }


    function startFeaturedAutoSlide() {

        featuredAutoSlide =
            setInterval(
                () => {

                    showFeaturedSlide(
                        featuredCurrent + 1
                    );

                },
                5000
            );

    }


    function resetFeaturedAutoSlide() {

        clearInterval(
            featuredAutoSlide
        );

        startFeaturedAutoSlide();

    }


    startFeaturedAutoSlide();



    /* =========================================================
       PAUSE FEATURED SLIDER ON HOVER
    ========================================================== */

    const featuredWrapper =
        document.querySelector('.featured-wrapper');


    if (featuredWrapper) {

        featuredWrapper.addEventListener(
            'mouseenter',
            () => {

                clearInterval(
                    featuredAutoSlide
                );

            }
        );


        featuredWrapper.addEventListener(
            'mouseleave',
            () => {

                startFeaturedAutoSlide();

            }
        );

    }



    /* =========================================================
       REGION SLIDER
    ========================================================== */

    let regionCurrent = 0;

    const regionTrack =
        document.getElementById('regionTrack');

    const regionDots =
        document.querySelectorAll('.region-dot');


    function showRegionPage(index) {

        if (!regionTrack) {
            return;
        }


        const totalPages =
            regionTrack.children.length;


        if (totalPages === 0) {
            return;
        }


        if (index >= totalPages) {

            regionCurrent = 0;

        } else if (index < 0) {

            regionCurrent =
                totalPages - 1;

        } else {

            regionCurrent = index;

        }


        regionTrack.style.transform =
            `translateX(-${regionCurrent * 100}%)`;


        regionDots.forEach(
            (dot, i) => {

                dot.classList.toggle(
                    'active',
                    i === regionCurrent
                );

            }
        );

    }


    function changeRegionPage(direction) {

        showRegionPage(
            regionCurrent + direction
        );

    }


    function goToRegionPage(index) {

        showRegionPage(index);

    }



    /* =========================================================
       KEYBOARD NAVIGATION
    ========================================================== */

    document.addEventListener(
        'keydown',
        function(event) {

            const activeElement =
                document.activeElement;

            const isTyping =
                activeElement &&
                (
                    activeElement.tagName === 'INPUT' ||
                    activeElement.tagName === 'TEXTAREA'
                );


            if (isTyping) {
                return;
            }


            if (event.key === 'ArrowLeft') {

                changeFeaturedSlide(-1);

            }


            if (event.key === 'ArrowRight') {

                changeFeaturedSlide(1);

            }

        }
    );


</script>
