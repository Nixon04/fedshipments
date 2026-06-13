<script lang="ts" setup>
import headers from './components/headers.vue';
import Footer from './components/footer.vue';
import { useToggleBurger } from './reactive-component/toggle-burger';
import General_ads_info from './components/general_ads_info.vue';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const togglecontroller = useToggleBurger();

import { ref, onMounted, onBeforeUnmount } from 'vue';

const activeStep = ref(0);

const handleScroll = () => {
    const steps = document.querySelectorAll('.nix-step-item');
    steps.forEach((step, index) => {
        const rect = step.getBoundingClientRect();
        if (rect.top <= window.innerHeight * 0.45 &&
            rect.bottom >= window.innerHeight * 0.45) {
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
            <title>FedShipments | About Us.</title>
        </header>
        <div class="nix-main">
            <headers/>
                <section class="nix-flex-container-all-hero">
                    <div class="nix-main-content-hero">

                        <div class="min-auto-flex-hero">
                            <div class="min-nix-center">
                                <h1 class="text-white">About Fedshipment</h1>
                            </div>
                        </div>

                        <div class="nix-main-float-right">
                            <!-- <img :src="AssetImage('feds-logo.png')" class="img-fluid" alt=""> -->
                        </div>
                    </div>
                </section>

                <section class="section-border py-3 p-3 ">
                    <div class="min-auto-flex">
                     <div class="row gx-4 gy-1 py-5 p-1">
                        <div class="col-lg-12 col-12">
                            <div>
                                <img :src="AssetImage('about-us-logis.png')" class="img-fluid pointer-events-none" alt="">
                            </div>
                        </div>

                         <div class="nix-top-letters d-flex flex-column mb-2">
                            <span class="fs-3 text-center d-flex justify-content-center">We deliver top-notch with</span>
                            <span class="fs-5 text-muted">Clarity and Prompt reachout</span>
                         </div>

                         <div class="nix-top-letters d-flex flex-column mb-2">
                            <span class="fs-3 text-center">
                                we simplify shipping for individuals, e-commerce businesses, and enterprises. From small parcels to large freight, we ensure every delivery is handled with care, speed, and transparency.
                                We combine technology-driven logistics with a strong delivery network to give you complete visibility from pickup to drop-off.
                            </span>
                         </div>
                       </div>
                    </div>
                </section>

                <section class="section-border py-3 p-3 nix-main-background">
                    <div class="min-auto-flex">
                        <div class="row gx-1 gy-1 py-5 p-1">
                            
                            <div class="col-lg-3">
                                <span class="fs-3 text-white"></span>
                            </div>
                
                            <div class="col-lg-9">
                
                                <div class="d-flex flex-column gap-3 mb-5">
                                    <h1 class="text-white">
                                        How to get started with Fedshipment.
                                    </h1>
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
                                                Create Account
                                            </span>
                
                                            <span class="fs-2 fw-bold"
                                                :class="activeStep === 0 ? 'text-white' : 'nix-muted-text'">
                                                Sign up on Fedshipment to access global shipping services.
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
                                                Book Shipment.
                                            </span>
                
                                            <span class="fs-2 fw-bold"
                                                :class="activeStep === 1 ? 'text-white' : 'nix-muted-text'">
                                                Choose your delivery type and schedule a pickup instantly.
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
                                                Track & Receive
                                            </span>
                
                                            <span class="fs-2 fw-bold"
                                                :class="activeStep === 2 ? 'text-white' : 'nix-muted-text'">
                                                Monitor your shipment in real time until it is safely delivered.
                                            </span>
                                        </div>
                                    </div>
                
                                </div>
                
                            </div>
                        </div>
                    </div>
                </section>


                <General_ads_info/>
            <Footer/>
        </div>
    </div>
</template>