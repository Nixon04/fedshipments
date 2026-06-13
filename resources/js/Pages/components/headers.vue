<script lang="ts" setup>
 import { Link } from '@inertiajs/vue3'; 
import { useToggleBurger } from '../reactive-component/toggle-burger';
 const AssetImage = (filename: any) => `/asset_images/${filename}`;
 const toggle = useToggleBurger();

</script>
<template>

    <div>
            <div  class="nix-headers-container">
                <div class="nix-headers-content w-100">
                     <div class="d-flex justify-content-between w-100 p-3">
                       <Link href="/">
                        <div class="d-flex flex-row">
                            <img :src="AssetImage('feds-large-logo.png')" class="logo-icon" alt="">
                        </div>
                       </Link>
    
                        <ul class="nix-flex-lists d-mobile-disable">
                            <Link href="/about-us" class="nix-li">
                                <li>
                                    <div>
                                        <span>About us</span>
                                    </div>
                                </li>
                            </Link>
    
                            <Link href="/services" class="nix-li">
                                <li>
                                    <div>
                                        <span>Services</span>
                                    </div>
                                </li>    
                            </Link>
    
                            <Link href="/tracker" class="nix-li">
                                <li >
                                    <div>
                                        <span>Track</span>
                                    </div>
                                </li>
                            </Link>
    
                           <Link href="/contact" class="nix-li">
                            <li >
                                <div>
                                    <span>Contact</span>
                                </div>
                            </li>
                           </Link>
                        </ul>


                        <ul class="nix-flex-mobile-list d-desktop-disable" v-if="toggle.toggle_active">
                            <Link href="/about-us" class="nix-li" @click="toggle.dismissTap">
                                <li>
                                    <div>
                                        <span>About us</span>
                                    </div>
                                </li>
                            </Link>
    
                            <Link href="/services" class="nix-li" @click="toggle.dismissTap">
                                <li>
                                    <div>
                                        <span>Services</span>
                                    </div>
                                </li>    
                            </Link>
    
                            <Link href="/tracker" class="nix-li" @click="toggle.dismissTap">
                                <li >
                                    <div>
                                        <span>Track</span>
                                    </div>
                                </li>
                            </Link>
    
                           <Link href="/contact" class="nix-li" @click="toggle.dismissTap">
                            <li >
                                <div>
                                    <span>Contact</span>
                                </div>
                            </li>
                           </Link>
                              
                        </ul>
    
                        <div class="d-flex flex-row align-items-center">
                            <!-- <div class="nix-border-outline-card d-mobile-disable">
                               <span>Get Started</span>
                            </div> -->

                            <span class="d-desktop-disable" @click="toggle.updateToggle">
                                <svg class="text-white pointer" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from coolicons by Kryston Schwarze - https://creativecommons.org/licenses/by/4.0/ --><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17h18M3 12h18M3 7h18"/></svg>
                            </span>
                        </div>
                     </div>
                       
                </div>
            </div>
    </div>
</template>