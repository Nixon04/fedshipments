<script lang="ts" setup>
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const togglecontroller = useToggleBurger();

import { ref, onMounted, onBeforeUnmount } from 'vue';
import General_ads_info from '../components/general_ads_info.vue';
import { useToggleBurger } from '../reactive-component/toggle-burger';
import Footer from '../components/footer.vue';
import Headers from '../components/headers.vue';
const ServiceImages = (filename: any) => `/splashimage/${filename}`;
const activeStep = ref(0);

const handleScroll = () => {
    const steps = document.querySelectorAll('.nix-step-item');
    steps.forEach((step, index) => {
        const rect = step.getBoundingClientRect();
        if (
            rect.top <= window.innerHeight * 0.45 &&
            rect.bottom >= window.innerHeight * 0.45
        ) {
            activeStep.value = index;
        }
    });
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
});

onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div>
        <header>
            <title>Fedshipment | Air Freight Service</title>
        </header>

        <div class="nix-main">
            <Headers />

            <!-- HERO SECTION -->
            <section class="nix-flex-container-all-hero">
                <div class="nix-main-content-hero">

                    <div class="min-auto-flex-hero">
                        <div class="min-nix-center">
                            <h1 class="text-white">Air Freight</h1>
                        </div>
                    </div>

                    <div class="nix-main-float-right">
                        <img :src="AssetImage('feds-dark-logo.png')" class="img-fluid" alt="">
                    </div>
                </div>
            </section>

            <!-- INTRO SECTION -->
            <section class="section-border py-3 p-3 background-grey">
                <div class="min-auto-flex">
                    <div class="row gx-4 gy-1 py-5 p-1">

                        <div class="col-lg-6 col-12">
                            <div class="d-flex flex-column gap-2">

                                <span class="fs-1 fw-bold text-dark">
                                    Fast, Secure & Global Air Freight Solutions for Time-Critical Shipments
                                </span>

                                <span class="text-dark">
                                    FedShipment provides reliable air freight services designed for speed and efficiency.
                                    Whether you're shipping urgent commercial goods, high-value cargo, perishable items,
                                    or lightweight shipments, our global airline partnerships ensure fast transit times
                                    and secure handling. We manage everything from pickup and packaging to customs clearance
                                    and final delivery.
                                </span>
                            </div>

                            <div class="nix-action-content-insurance">
                                <div class="d-flex flex-column gap-1">

                                    <!-- POINT 1 -->
                                    <div class="d-flex gap-2 align-items-center mb-3">
                                        <span>
                                            <!-- icon -->
                                        </span>
                                        <span class="text-dark">
                                            Access global airline networks for fast international cargo movement.
                                        </span>
                                    </div>

                                    <!-- POINT 2 -->
                                    <div class="d-flex gap-2 align-items-center mb-3">
                                        <span></span>
                                        <span class="text-dark">
                                            Flexible options including express air freight and consolidated shipments.
                                        </span>
                                    </div>

                                    <!-- POINT 3 -->
                                    <div class="d-flex gap-2 align-items-center mb-3">
                                        <span></span>
                                        <span class="text-dark">
                                            Full customs support, documentation, and cargo tracking in real time.
                                        </span>
                                    </div>

                                    <!-- POINT 4 -->
                                    <div class="d-flex gap-2 align-items-center mb-3">
                                        <span></span>
                                        <span class="text-dark">
                                            Safe handling of sensitive, urgent, and high-value goods worldwide.
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="position-relative z-1">
                                <img :src="ServiceImages('freight.png')" class="hero-main-image-cover" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- HOW IT WORKS -->
            <section class="section-border py-3 p-3 nix-main-background">
                <div class="min-auto-flex">
                    <div class="row gx-1 gy-1 py-5 p-1">

                        <div class="col-lg-3">
                            <span class="fs-3 text-white"></span>
                        </div>

                        <div class="col-lg-9">

                            <div class="d-flex flex-column gap-3 mb-5">
                                <h1 class="text-white">
                                    How Our Air Freight Service Works
                                </h1>
                                <span class="text-white">
                                    A fast and streamlined air cargo process designed to deliver your shipments quickly and safely worldwide.
                                </span>
                            </div>

                            <div class="d-flex flex-column gap-3">

                                <!-- STEP 1 -->
                                <div class="d-flex gap-5 mb-5 nix-step-item transition-step">
                                    <div class="fs-3 fw-bold"
                                        :class="activeStep === 0 ? 'text-white' : 'nix-muted-text'">
                                        01
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                        <span :class="activeStep === 0 ? 'text-white' : 'nix-muted-text'">
                                            step1
                                        </span>

                                        <span class="fs-2 fw-bold"
                                            :class="activeStep === 0 ? 'text-white' : 'nix-muted-text'">
                                            Submit Air Freight Request
                                        </span>
                                    </div>
                                </div>

                                <!-- STEP 2 -->
                                <div class="d-flex gap-5 mb-5 nix-step-item transition-step">
                                    <div class="fs-3 fw-bold"
                                        :class="activeStep === 1 ? 'text-white' : 'nix-muted-text'">
                                        02
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                        <span :class="activeStep === 1 ? 'text-white' : 'nix-muted-text'">
                                            step2
                                        </span>

                                        <span class="fs-2 fw-bold"
                                            :class="activeStep === 1 ? 'text-white' : 'nix-muted-text'">
                                            Flight Booking & Documentation
                                        </span>
                                    </div>
                                </div>

                                <!-- STEP 3 -->
                                <div class="d-flex gap-5 mb-5 nix-step-item transition-step">
                                    <div class="fs-3 fw-bold"
                                        :class="activeStep === 2 ? 'text-white' : 'nix-muted-text'">
                                        03
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                        <span :class="activeStep === 2 ? 'text-white' : 'nix-muted-text'">
                                            step3
                                        </span>

                                        <span class="fs-2 fw-bold"
                                            :class="activeStep === 2 ? 'text-white' : 'nix-muted-text'">
                                            Air Transportation
                                        </span>
                                    </div>
                                </div>

                                <!-- STEP 4 -->
                                <div class="d-flex gap-5 mb-5 nix-step-item transition-step">
                                    <div class="fs-3 fw-bold"
                                        :class="activeStep === 3 ? 'text-white' : 'nix-muted-text'">
                                        04
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                        <span :class="activeStep === 3 ? 'text-white' : 'nix-muted-text'">
                                            step4
                                        </span>

                                        <span class="fs-2 fw-bold"
                                            :class="activeStep === 3 ? 'text-white' : 'nix-muted-text'">
                                            Customs Clearance & Final Delivery
                                        </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <General_ads_info />
            <Footer />
        </div>
    </div>
</template>