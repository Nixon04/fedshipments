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
            <title>Nivexia | Contact Us</title>
        </header>
        <div class="nix-main">
            <headers/>
                <section class="nix-flex-container-all-hero">
                    <div class="nix-main-content-hero">

                        <div class="min-auto-flex-hero">
                            <div class="min-nix-center">
                                <h1 class="text-white">Contact Us</h1>
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
                                <span class="fs-1 text-dark">Contact</span>
                                <span class="text-dark">
                                    Reach out to us with any questions or inquiries. We're here to help!Reach out to us with any questions or inquiries. We're here to help.
                                </span>
                            </div>
                    
                            <div class="py-3">
                                <div class="d-flex flex-column gap-1">
                                    <div class="d-flex gap-2 align-items-center mb-3">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><!-- Icon from Fluent UI System Icons by Microsoft Corporation - https://github.com/microsoft/fluentui-system-icons/blob/main/LICENSE --><path fill="currentColor" d="M7.427 10.516C7.046 8.002 8.82 5.74 11.53 4.91a1.976 1.976 0 0 1 2.429 1.197l.869 2.32a2 2 0 0 1-.521 2.175l-2.585 2.371a1 1 0 0 0-.304.94l.023.104l.064.261c.057.22.143.53.264.9c.24.735.623 1.723 1.193 2.71s1.234 1.813 1.75 2.388a15 15 0 0 0 .842.864l.08.074a1 1 0 0 0 .964.205l3.346-1.053a2 2 0 0 1 2.144.637l1.583 1.922c.66.8.582 1.976-.177 2.683c-2.074 1.933-4.926 2.33-6.91.734a25.5 25.5 0 0 1-6.048-7.057a24.9 24.9 0 0 1-3.109-8.77m6.086 3.529l2.146-1.968a4 4 0 0 0 1.042-4.35l-.87-2.32a3.976 3.976 0 0 0-4.886-2.408C7.58 4.029 4.878 7.046 5.45 10.815a26.9 26.9 0 0 0 3.357 9.477a27.5 27.5 0 0 0 6.523 7.61c2.975 2.39 6.949 1.575 9.528-.83a3.96 3.96 0 0 0 .357-5.417l-1.583-1.922a4 4 0 0 0-4.289-1.274l-2.777.874a13 13 0 0 1-.365-.391a12.5 12.5 0 0 1-1.507-2.053a12.5 12.5 0 0 1-1.025-2.332a13 13 0 0 1-.156-.512"/></svg>
                                        </span>
                                        <span>+1 7542514256</span>
                                    </div>
                                </div>
                    
                                <div class="d-flex flex-column.gap-2">
                                    <div class="d-flex gap-2 align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" d="M22 10c.018.727 0 1.054 0 2c0 3.771 0 5.657-1.172 6.828S17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172S2 15.771 2 12s0-5.657 1.172-6.828S6.229 4 10 4h3"/><path stroke-linecap="round" d="m6 8l2.159 1.8c1.837 1.53 2.755 2.295 3.841 2.295s2.005-.765 3.841-2.296"/><circle cx="19" cy="5" r="3"/></g></svg>
                                        </span>
                                        <span>info@fedshipments.com</span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-12">
                            <div class="call-border-card">
                                <div class="form-container">
                                    <div class="mb-3">
                                        <label for="email" class="text-muted">Email Address</label>
                                        <input type="text" v-model="auth_controller.email_address" id="email" class="form-control-x py-3" placeholder="Email Address">
                    
                                    <div v-if="auth_controller.errors">
                                        <span class="text-danger">{{(auth_controller.errors as any).email?.[0]}}</span>
                                    </div>
                                    </div>
                    
                                    <div class="mb-3">
                                        <label for="email" class="text-muted">Message</label>
                                        <textarea rows="7" v-model="auth_controller.message" class="form-control-x" id="" placeholder="Enter Description"></textarea>
                                    
                                        <div v-if="auth_controller.errors">
                                            <span class="text-danger">{{(auth_controller.errors as any).message?.[0]}}</span>
                                        </div>
                                    </div>
                    
                                    <button class="action-main-button"  :disabled="auth_controller.emailsenderloader" @click="auth_controller.EmailSender(pages.props?.csrf_token as string)" >
                                            <template v-if="auth_controller.emailsenderloader">Loading...</template>
                                            <template v-else>submit</template>
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