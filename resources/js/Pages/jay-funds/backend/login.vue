<script lang="ts" setup>
import headers from '../../components/headers.vue';
import Footer from '../../components/footer.vue';
import { useToggleBurger } from '../../reactive-component/toggle-burger';
import General_ads_info from '../../components/general_ads_info.vue';
import { useAuthController } from '../../reactive-component/auth-controller';
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
            <title>Fedshipment | Contact Us</title>
        </header>
        <div class="nix-main">
               <headers/>
                <section class="nix-flex-container-all-hero">
                    <div class="nix-main-content-admin">
                        <div class="min-auto-flex-hero">
                            <div class="min-nix-center-admin">
                                <h1 class="text-white">Login Page</h1>
                            </div>
                        </div>

                        <div class="nix-main-float-right">
                            <img :src="AssetImage('feds-dark-logo.png')" class="img-fluid" alt="">
                        </div>
                    </div>
                </section>

                <section class="section-border py-5 p-3 background-grey">
                    <div class="min-auto-flex">
                
                        <div class="row justify-content-center align-items-center gy-4">
                
                            <!-- Left Side -->
                            <div class="col-lg-5 d-none d-lg-block">
                                <div class="call-border-card h-100">
                                    <div class="text-center p-4">
                
                                        <img
                                            :src="AssetImage('feds-dark-logo.png')"
                                            class="img-fluid mb-4"
                                            style="max-width:200px;"
                                        >
                
                                        <div class="badge-mask bg-success-x mb-3">
                                            Secure Admin Portal
                                        </div>
                
                                        <h2 class="fw-bold mb-3">
                                            Welcome Back
                                        </h2>
                
                                        <p class="text-muted">
                                            Manage shipments, monitor tracking updates,
                                            create consignments, view customer records,
                                            and oversee logistics operations from one dashboard.
                                        </p>
                
                                        <hr>
                
                                        <div class="d-flex flex-column gap-3 text-start">
                
                                            <div class="d-flex gap-3 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <path d="M3 7L12 13L21 7"/>
                                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                                </svg>
                
                                                <span>Email Authentication</span>
                                            </div>
                
                                            <div class="d-flex gap-3 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <rect x="3" y="11" width="18" height="10" rx="2"/>
                                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                                </svg>
                
                                                <span>Protected Access</span>
                                            </div>
                
                                            <div class="d-flex gap-3 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="9"/>
                                                    <path d="M12 7v5l3 3"/>
                                                </svg>
                
                                                <span>24/7 Shipment Monitoring</span>
                                            </div>
                
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                
                            <!-- Login Form -->
                            <div class="col-lg-5 col-md-8 col-12">
                                <div class="call-border-card">
                
                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold mb-2">
                                            Admin Login
                                        </h3>
                
                                        <p class="text-muted mb-0">
                                            Sign in to access your dashboard
                                        </p>
                                    </div>
                
                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label class="text-muted mb-2">
                                            Email Address
                                        </label>
                
                                        <div class="position-relative">
                
                                            <input
                                                type="email"
                                                v-model="auth_controller.email_address"
                                                class="form-control-x py-3"
                                                placeholder="Enter Email Address"
                                            >
                
                                        </div>
                
                                        <div v-if="auth_controller.errors">
                                            <span class="text-danger">
                                                {{ (auth_controller.errors as any).email?.[0] }}
                                            </span>
                                        </div>
                                    </div>
                
                                    <!-- Password -->
                                    <div class="mb-5">
                
                                        <label class="text-muted mb-2">
                                            Password
                                        </label>
                
                                        <input
                                            type="password"
                                            v-model="auth_controller.password"
                                            class="form-control-x py-3"
                                            placeholder="Enter Password"
                                        >

                                        <div v-if="auth_controller.errors">
                                            <span class="text-danger">
                                                {{ (auth_controller.errors as any).password?.[0] }}
                                            </span>
                                        </div>
                                    </div>
                
                               
                
                                    <!-- Button -->
                                    <button
                                        class="action-main-button"
                                        :disabled="auth_controller.loginloader"
                                        @click="auth_controller.LoginCreation(pages.props?.csrf_token as string)">
                                        <template v-if="auth_controller.loginloader">
                                            Signing In...
                                        </template>
                
                                        <template v-else>
                                            Login To Dashboard
                                        </template>
                
                                    </button>
                
                                </div>
                            </div>
                
                        </div>
                
                    </div>
                </section>

        </div>
    </div>
</template>