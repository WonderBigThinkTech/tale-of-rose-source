<x-layout>
    <main id="MainContent" class="main-content">


        @include('menu-mobile')

        <div class="DrawerOverlay"></div>
        <section id="page-layout">
            <h2 class="hide">PageContent</h2>

            <div id="shopify-section-template--16529641930911__main" class="shopify-section">
                <!-- start main-page.liquid (SECTION) -->
                <div class="wrapper mb-5">
                    <h1 class="rte-h1 mb-3">Vision</h1>
                    <div class="rte">

                        At Tale of Roses, we envision a world where every flower tells a unique story and
                        becomes a
                        cherished memory. Our goal is to inspire people to celebrate and cherish life’s moments
                        with
                        bespoke floral designs that capture the heart and soul of every occasion.

                    </div>
                </div>
                <style scoped>
                    .template-page div.wrapper.main-content {
                        padding-top: 20px;
                    }

                    .template-page .main-content {
                        margin: 0 auto;
                        display: flex;
                        flex-direction: column;
                        float: none;
                        padding-bottom: 0;
                        width: 100%;
                    }

                    .template-page .rte-h1 {
                        margin-top: 20px;
                        font-weight: bold;
                        width: 100%;
                        border-bottom: 1px solid #e4e4e4;
                        padding-bottom: 15px;
                        color: var(--h1Color);
                        clear: both;
                        margin-bottom: 20px;
                        text-transform: uppercase;
                    }

                    .template-page .rte p {
                        margin: 0 0 15px 0;
                    }

                    .template-page .rte ul,
                    .template-page .rte ol {
                        margin: 0 0 15px 40px;
                        padding: 0;
                    }

                    .template-page .wrapper .rte {
                        margin-bottom: 20px;
                    }

                    @media (max-width: 1019px) {
                        .template-page .rte-h1 {
                            margin: 15px 0 13px;
                            padding: 0 0 13px;
                        }
                    }

                    @media (max-width: 767px) {
                        .template-page .rte-h1 {
                            width: 100%;
                            margin: 0 0 10px;
                            padding: 0 0 10px;
                        }

                        .template-page .rte img {
                            margin-bottom: 20px;
                            width: 100%;
                        }

                        .template-page div.wrapper.main-content {
                            padding-top: 5px;
                        }
                    }
                </style>
            </div>
            <div id="shopify-section-template--16529641930911__a8bb14f3-a52e-410e-ab35-c5f82e0e7c11"
                class="shopify-section custom-area"><!-- start custom-area.liquid (SECTION) -->
                <section id="shopify-section-template--16529641930911__a8bb14f3-a52e-410e-ab35-c5f82e0e7c11-content"
                    data-section-type="custom-area" class="judgeme-widget custom-area">
                    <h2 class="hide">Custom Area</h2><a href="https://clenchfitness.com/a/review/all">
                        <div id="stamped-reviews-widget" data-widget-type="site-badge" data-badge-type="badge"></div>
                    </a>
                </section>

                <style scoped>
                    #shopify-section-template--16529641930911__a8bb14f3-a52e-410e-ab35-c5f82e0e7c11 {

                        margin-top: 0px;
                        margin-bottom: 0px;
                        padding-top: 0px;
                        padding-bottom: 0px;

                    }

                    .wrapper.custom-area .section-title {
                        padding: 17px 0 10px;
                        margin-bottom: 0;
                    }
                </style>

            </div>
            <limespot></limespot>
        </section>


    </main>
</x-layout>
