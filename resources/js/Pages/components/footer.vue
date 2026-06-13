<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
</script>


<template>
    <div>
        <section class="footer-container py-5 p-3 position-relative z-1">
            <div class="footer-content min-auto-flex">
              <div class="row gx-5 gy-1">
                <div class="col-lg-6 mb-4">
                   <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-column gap-3">
                        <img :src="AssetImage('feds-large-logo.png')" class="logo-icon" alt="">
                        <span class="text-white fs-6 w-lg-75 w-75">
                          At Fedshipment we simplify shipping for individuals, e-commerce businesses,
                          and enterprises. From small parcels to large freight,
                          we ensure every delivery is handled with care,
                          speed, and transparency.
                        </span>
                    </div>
                   </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <div class="col-lg-12">
                        <div class="row gy-1 ">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column gap-3">
                                    <span class="fs-5 fw-bold text-white">Company</span>
                                    <ul class="d-flex flex-column gap-3">
                                        <Link href="/" class="nix-li">
                                            <li >
                                                <span>About us</span>
                                            </li>
                                        </Link>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="d-flex flex-column gap-3">
                                    <span class="fs-5 fw-bold text-white">Resources</span>
                                    <ul class="d-flex flex-column gap-3">
                                        <Link href="/services/ocean-freight" class="nix-li">
                                            <li >
                                                <span>Ocean Freight</span>
                                            </li>
                                        </Link>

                                        <Link href="/services/air-freight" class="nix-li">
                                            <li >
                                                <span>Air Freight</span>
                                            </li>
                                        </Link>

                                        <Link href="/services/warehouse" class="nix-li">
                                            <li >
                                                <span>Warehouse Management.</span>
                                            </li>
                                        </Link>

                                        <Link href="/services/brokage" class="nix-li">
                                            <li >
                                                <span>Custom Brokage</span>
                                            </li>
                                        </Link>

                                        <Link href="/services/logistics" class="nix-li">
                                            <li >
                                                <span>Logistics</span>
                                            </li>
                                        </Link>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="d-flex flex-column gap-3">
                                    <span class="fs-5 fw-bold text-white">Help</span>
                                    <ul class="d-flex flex-column gap-3">
                                        <Link href="/services#faqs" class="nix-li">
                                            <li >
                                                <span>Faqs</span>
                                            </li>
                                        </Link>

                                        <Link href="/" class="nix-li">
                                            <li >
                                                <span>Help Center</span>
                                            </li>
                                        </Link>

                                        <Link href="/privacy" class="nix-li">
                                            <li >
                                                <span>Privacy</span>
                                            </li>
                                        </Link>

                                        <Link href="/contact" class="nix-li">
                                            <li >
                                                <span>Support</span>
                                            </li>
                                        </Link>
                                        
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <span class="fw-bold text-white fs-6 text-center d-flex justify-content-center">
                        2026 @ All rights reserved
                    </span>
                </div>

              </div>
            </div>
        </section>
    </div>
</template>