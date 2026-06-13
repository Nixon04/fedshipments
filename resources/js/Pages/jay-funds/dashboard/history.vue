<script lang="ts" setup>
import headers from '../../components/headers.vue';
import Footer from '../../components/footer.vue';
import { useToggleBurger } from '../../reactive-component/toggle-burger';
import General_ads_info from '../../components/general_ads_info.vue';
import { useAuthController } from '../../reactive-component/auth-controller';
import { usePage } from '@inertiajs/vue3';
import { Toaster } from 'vue-sonner';
import Aside from '../components/aside.vue';
import topHeader from '../components/top-header.vue';
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
            <title>FedShipment | History</title>
        </header>
        <div class="nix-main">
            <div class="main-body-flex">
                <Aside :navtoggle="togglecontroller"/>
                <topHeader :toggle="togglecontroller"/>

                <div class="main-body-column">
                            <!-- Top Stats -->
                            <div class="row g-3 mb-4">
        
                                <div class="col-lg-3 col-md-6">
                                    <div class="call-border-card">
                                        <span class="text-muted">Total Shipments</span>
                                        <h2 class="fw-bold mt-2">1,248</h2>
                                    </div>
                                </div>
                    
                                <div class="col-lg-3 col-md-6">
                                    <div class="call-border-card">
                                        <span class="text-muted">In Transit</span>
                                        <h2 class="fw-bold text-warning mt-2">342</h2>
                                    </div>
                                </div>
                    
                                <div class="col-lg-3 col-md-6">
                                    <div class="call-border-card">
                                        <span class="text-muted">Delivered</span>
                                        <h2 class="fw-bold text-success mt-2">856</h2>
                                    </div>
                                </div>
                    
                                <div class="col-lg-3 col-md-6">
                                    <div class="call-border-card">
                                        <span class="text-muted">Warehouses</span>
                                        <h2 class="fw-bold text-primary mt-2">18</h2>
                                    </div>
                                </div>
                    
                            </div>
                    
                            <!-- Quick Actions -->
                            <div class="row g-3 mb-4">
                    
                                <div class="col-lg-12">
                                    <div class="call-border-card text-center">
                    
                                        <h5>Create Shipment</h5>
                    
                                        <p class="text-muted">
                                            Add new package
                                        </p>
                    
                                        <button class="action-main-button">
                                            New Shipment
                                        </button>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>


        </div>
    </div>
</template>