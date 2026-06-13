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
            <title>FedShipment | Settings</title>
        </header>
        <div class="nix-main">
            <div class="main-body-flex">
                <Aside :navtoggle="togglecontroller"/>
                <topHeader :toggle="togglecontroller"/>

                  <div class="main-body-column">
                    <div class="card-outline">
                                
                    </div>
                  </div>
                </div>


        </div>
    </div>
</template>