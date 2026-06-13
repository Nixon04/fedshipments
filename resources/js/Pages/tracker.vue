<script lang="ts" setup>
import headers from './components/headers.vue';
import Footer from './components/footer.vue';
import { useToggleBurger } from './reactive-component/toggle-burger';
import General_ads_info from './components/general_ads_info.vue';
import { useAuthController } from './reactive-component/auth-controller';
import { usePage } from '@inertiajs/vue3';
import { Toaster } from 'vue-sonner';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const togglecontroller = useToggleBurger();
const auth_controller = useAuthController();
const pages = usePage();

</script>

<template>
    
    <div>
        <Toaster position="top-right"/>
        <header>
            <title>Fedshipments |  Tracker Your Product Today</title>
        </header>
        <div class="nix-main">
            <headers/>
                <section class="nix-flex-container-all-hero">
                    <div class="nix-main-content-hero">

                        <div class="min-auto-flex-hero">
                            <div class="min-nix-center">
                                <h1 class="text-white">Track Your Product Today</h1>
                            </div>
                        </div>

                        <div class="nix-main-float-right">
                            <img :src="AssetImage('feds-dark-logo.png')" class="img-fluid" alt="">
                        </div>
                    </div>
                </section>

                <section class="section-border py-3 p-3 background-grey">
                    <div class="min-auto-flex">   
                    <div class="row gx-4 gy-1 py-5 p-1">
                    
                        <div class="col-lg-6 col-12">
                            <div class="d-flex flex-column gap-3">
                                <span class="fs-1 text-dark">Track Your Domestic and International Shipments Easily</span>
                                <span class="text-dark">
                                    Enter your shipment's waybill number to get real-time updates
                                </span>
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-12">
                            <div class="call-border-card">
                                <div class="form-container">
                                    <div class="mb-5">
                                        <label for="email" class="text-muted">Tracker ID</label>
                                        <input type="text" v-model="auth_controller.trackingid" id="email" class="form-control-x py-3" placeholder="Code Number">
                    
                                    <div v-if="auth_controller.errors">
                                        <span class="text-danger">{{(auth_controller.errors as any).tracking_code?.[0]}}</span>
                                    </div>
                                    </div>
                    
                                    <button class="action-main-button"  :disabled="auth_controller.trackingloader" @click="auth_controller.TrackingID(pages.props?.csrf_token as string)" >
                                            <template v-if="auth_controller.trackingloader">Loading...</template>
                                            <template v-else>Track</template>
                                    </button>
                    
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