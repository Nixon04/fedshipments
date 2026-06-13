<script lang="ts" setup>
import headers from './components/headers.vue';
import Footer from './components/footer.vue';
import General_ads_info from './components/general_ads_info.vue';

const AssetImage = (filename: any) => `/asset_images/${filename}`;
</script>

<template>
    <div>
        <header>
            <title>FedShipments | Privacy Policy</title>
        </header>

        <div class="nix-main">

            <headers />

            <!-- HERO -->
            <section class="nix-flex-container-all-hero">
                <div class="nix-main-content-hero">

                    <div class="min-auto-flex-hero">
                        <div class="min-nix-center">
                            <div>
                                <h1 class="text-white">Privacy Policy</h1>
                            <p class="text-white opacity-75 mt-2">
                                How FedShipments handles your data and protects your privacy
                            </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- CONTENT -->
            <section class="section-border py-5 p-3 nix-main-background">

                <div class="containe">

                    <div class="card border-0 shadow-sm p-4">

                        <h3 class="fw-bold mb-3">1. Introduction</h3>
                        <p class="text-dark">
                            FedShipments is committed to protecting your personal information.
                            This Privacy Policy explains how we collect, use, and safeguard your data
                            when you use our shipment tracking and logistics services.
                        </p>

                        <h3 class="fw-bold mt-4 mb-3">2. Information We Collect</h3>
                        <ul class="d-flex flex-column text-dark">
                            <li class="text-dark">Full name of sender and receiver</li>
                            <li>Phone numbers and email addresses</li>
                            <li>Shipment details (title, origin, destination)</li>
                            <li>Tracking and location updates</li>
                            <li>Device and usage information</li>
                        </ul>

                        <h3 class="fw-bold mt-4 mb-3">3. How We Use Your Information</h3>
                        <ul class="d-flex flex-column text-dark">
                            <li>To create and manage shipments</li>
                            <li>To provide real-time tracking updates</li>
                            <li>To improve our logistics services</li>
                            <li>To send notifications about shipment status</li>
                            <li>To prevent fraud and ensure security</li>
                        </ul>

                        <h3 class="fw-bold mt-4 mb-3">4. Data Protection</h3>
                        <p>
                            We implement strong security measures to protect your data from unauthorized access,
                            alteration, disclosure, or destruction. However, no method of transmission over the internet
                            is 100% secure.
                        </p>

                        <h3 class="fw-bold mt-4 mb-3">5. Sharing of Information</h3>
                        <p>
                            FedShipments does not sell your personal data. We may share information only with:
                        </p>
                        <ul>
                            <li>Delivery and logistics partners</li>
                            <li>Legal authorities when required by law</li>
                            <li>Service providers that help us operate our platform</li>
                        </ul>

                        <h3 class="fw-bold mt-4 mb-3">6. Cookies & Tracking</h3>
                        <p>
                            We use cookies to improve user experience, track shipment activity, and analyze platform usage.
                            You can disable cookies in your browser settings.
                        </p>

                        <h3 class="fw-bold mt-4 mb-3">7. Your Rights</h3>
                        <ul>
                            <li>Access your personal data</li>
                            <li>Request corrections to your information</li>
                            <li>Request deletion of your data</li>
                            <li>Opt-out of notifications where applicable</li>
                        </ul>

                        <h3 class="fw-bold mt-4 mb-3">8. Data Retention</h3>
                        <p>
                            We retain shipment and user data only as long as necessary to provide services
                            and comply with legal obligations.
                        </p>

                        <h3 class="fw-bold mt-4 mb-3">9. Updates to This Policy</h3>
                        <p>
                            FedShipments may update this Privacy Policy from time to time.
                            Changes will be posted on this page with an updated revision date.
                        </p>

                        <h3 class="fw-bold mt-4 mb-3">10. Contact Us</h3>
                        <p>
                            If you have any questions about this Privacy Policy, please contact our support team
                            through the FedShipments platform.
                        </p>

                        <div class="mt-4 text-muted small">
                            Last updated: June 2026
                        </div>

                    </div>

                </div>

            </section>

            <General_ads_info />
            <Footer />

        </div>
    </div>
</template>