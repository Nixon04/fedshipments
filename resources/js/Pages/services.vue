<script lang="ts" setup>

import { Link } from '@inertiajs/vue3';
import { useToggleBurger } from './reactive-component/toggle-burger';
import Footer from './components/footer.vue';
import General_ads_info from './components/general_ads_info.vue';
import Headers from './components/headers.vue';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const ServiceImages = (filename: any) => `/splashimage/${filename}`;
const togglecontroller = useToggleBurger();
</script>

<template>
    <div>
        <header>
            <title>Fedshipments | Services</title>
        </header>
        <div class="nix-main">
            <headers/>
                <section class="nix-flex-container-all-hero">
                    <div class="nix-main-content-hero">

                        <div class="min-auto-flex-hero">
                            <div class="min-nix-center">
                                <div class="d-flex flex-column gap-3">
                                    <h1 class="text-white">Our Services</h1>
                                    <span class="text-white fs-4">Get started with our already made articulated services today</span>
                                </div>
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
                        <div class="col-lg-12">
                           <div class="row gx-2 gy-2">
                            <div class="col-lg-4">
                                <div class="row gx-1 gy-1">
                                    <div class="col-lg-12 nix-container-layer">
                                        <Link href="/services/logistics" class="text-decoration-none pointer text-dark">
                                            <div class="nix-service-card" :style="{backgroundImage: `url(${ServiceImages('courier.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="mb-3">
                                                    </div>
                                                    <div class="nix-overlay-top">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                                        </span>
                                                    </div>
                                                </div>
    
                                                <div class="d-flex flex-column gap-3 mb-3 nix-overlay-top">
                                                    <span class="fw-bold fs-3 text-white">Logistics Solutions.</span>
                                                    <span class="text-white">
                                                        From pickup to final delivery, Fedshipment provides end-to-end logistics solutions designed to keep your goods moving efficiently. We streamline transportation, route planning, and shipment management to ensure timely and secure deliveries for businesses and individuals.
                                                    </span>
                                                </div>
    
                                                <div class="d-flex justify-content-end">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                                    </span>
                                                </div>
    
                                            </div>
                                        </Link>
                                        <div class="nix-overlay"></div>
                                    </div>

                                    <div class="col-lg-12 nix-container-layer">
                                        <Link href="/services/ocean-freight" class="text-decoration-none text-dark">
                                            <div class="nix-service-card" :style="{backgroundImage: `url(${ServiceImages('cargos.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="mb-3">
                                                    </div>
                                                    <div class=" nix-overlay-top">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                                        </span>
                                                    </div>
                                                </div>
    
                                                <div class="d-flex flex-column gap-3 mb-3 nix-overlay-top">
                                                    <span class="fw-bold fs-3 text-white">Ocean Freight</span>
                                                    <span class="text-white">
                                                        Ship large volumes of cargo across international waters with confidence. Our ocean freight services offer cost-effective and reliable transportation solutions, supported by global carrier networks and end-to-end shipment visibility.
                                                    </span>
                                                </div>
    
                                                <div class="d-flex justify-content-end">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                                    </span>
                                                </div>    
                                            </div>
                                        </Link>
                                        <div class="nix-overlay"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="row gx-1 gy-1">
                                    <div class="col-lg-12 mb-2 nix-container-layer">
                                        <Link href="/services/air-freight" class="text-decoration-none text-dark">
                                            <div class="nix-service-card-center" :style="{backgroundImage: `url(${ServiceImages('freight.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="mb-3">
                                                    </div>
                                                    <div class=" nix-overlay-top">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                                        </span>
                                                    </div>
                                                </div>
    
                                                <div class="d-flex flex-column gap-3 mb-3 nix-overlay-top">
                                                    <span class="fw-bold fs-3 text-white">Air Freight</span>
                                                    <span class="text-white">
                                                        When speed matters, our air freight services ensure rapid and secure transportation of goods worldwide. Ideal for urgent shipments, high-value cargo, and time-sensitive deliveries.
                                                    </span>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                                    </span>
                                                </div>

                                            </div>
                                        </Link>
                                        <div class="nix-overlay"></div>
                                    </div>

                                    <div class="col-lg-12">
                                       <Link href="/contact" class="text-decoration-none text-dark">
                                        <div class="max-center-action-card">
                                            Get A Quote Today
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                            </span>
                                        </div>
                                      </Link>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="row gx-1 gy-1">
                                    <div class="col-lg-12 nix-container-layer">
                                        <Link href="/services/warehouse" class="text-decoration-none text-dark">
                                            <div class="nix-service-card"  :style="{backgroundImage: `url(${ServiceImages('shipments.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="mb-3">
                                                    </div>
                                                    <div class=" nix-overlay-top">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                                        </span>
                                                    </div>
                                                </div>
    

                                                <div class="d-flex flex-column gap-3 mb-3 nix-overlay-top">
                                                            <span class="fw-bold fs-3 text-white">Warehouse Management</span>
                                                            <span class="text-white">
                                                                Optimize storage, inventory control, and order fulfillment through our modern warehouse management solutions. We help businesses maintain efficiency, visibility, and scalability across their supply chains.
                                                            </span>
                                                        </div>
                                                     <div class="d-flex justify-content-end">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                                    </span>
                                                </div>

                                            </div>
                                       </Link>
                                       <div class="nix-overlay"></div>
                                    </div>

                                    <div class="col-lg-12 nix-container-layer">
                                        <Link href="/services/brokage" class="text-decoration-none text-dark">
                                            <div class="nix-service-card"  :style="{backgroundImage: `url(${ServiceImages('brokages.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="mb-3">
                                                    </div>
                                                    <div class=" nix-overlay-top">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                                        </span>
                                                    </div>
                                                </div>
    

                                                <div class="d-flex flex-column gap-3 mb-3 nix-overlay-top">
                                                    <span class="fw-bold fs-3 text-white">Customs Brokerage</span>
                                                    <span class="text-white">
                                                        Simplify international trade with expert customs brokerage services. Our team manages documentation, compliance requirements, duties, and clearance procedures to ensure smooth border crossings.
                                                    </span>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                                    </span>
                                                </div>

                                            </div>
                                       </Link>
                                       <div class="nix-overlay"></div>
                                    </div>

                                </div>
                            </div>

                           </div>
                            
                        </div>
                    </div>
                    </div>
                </section>


                <section class="section-border py-3 p-3 nix-main-background" id="faqs">
                    <div class="min-auto-flex">
                        <div class="row gx-1 gy-1 py-5 p-1">
                            <div class="col-lg-2">
                                <span class="fs-3 text-white"></span>
                            </div>
                
                            <div class="col-lg-10">
                
                                <div class="d-flex flex-column gap-3 mb-5">
                                    <h1 class="text-white">
                                        Frequest Asked Questions (FAQ’s)
                                    </h1>
                                </div>
                
                                <div class="d-flex flex-column gap-3">
                                    <div class="faq-container">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark fw-bold">How do I track my shipment?</span>
                                            <span @click="togglecontroller.FaqToggle(1)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 21q-.425 0-.712-.288T11 20v-7H4q-.425 0-.712-.288T3 12t.288-.712T4 11h7V4q0-.425.288-.712T12 3t.713.288T13 4v7h7q.425 0 .713.288T21 12t-.288.713T20 13h-7v7q0 .425-.288.713T12 21"/></svg>
                                            </span>
                                        </div>

                                        <div class="faq-contents" v-if="togglecontroller.faqtoggleindex == 1">
                                            <hr class="text-dark">
                                            <span class="text-dark">
                                                Enter your tracking number on our Track Shipment page to receive real-time updates on your package's location, transit status, and estimated delivery date.
                                            </span>
                                        </div>
                                    </div>


                                    <div class="faq-container">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark fw-bold">How long does delivery take?</span>
                                            <span @click="togglecontroller.FaqToggle(2)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 21q-.425 0-.712-.288T11 20v-7H4q-.425 0-.712-.288T3 12t.288-.712T4 11h7V4q0-.425.288-.712T12 3t.713.288T13 4v7h7q.425 0 .713.288T21 12t-.288.713T20 13h-7v7q0 .425-.288.713T12 21"/></svg>
                                            </span>
                                        </div>

                                        <div class="faq-contents" v-if="togglecontroller.faqtoggleindex == 2">
                                            <hr class="text-dark">
                                            <span class="text-dark">
                                                Delivery times vary depending on the service selected. Same-Day Delivery is completed within hours, Express Delivery typically takes 1–2 business days, while Standard and International Shipping may take longer depending on destination.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="faq-container">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark fw-bold">Do you offer international shipping?</span>
                                            <span @click="togglecontroller.FaqToggle(3)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 21q-.425 0-.712-.288T11 20v-7H4q-.425 0-.712-.288T3 12t.288-.712T4 11h7V4q0-.425.288-.712T12 3t.713.288T13 4v7h7q.425 0 .713.288T21 12t-.288.713T20 13h-7v7q0 .425-.288.713T12 21"/></svg>
                                            </span>
                                        </div>

                                        <div class="faq-contents" v-if="togglecontroller.faqtoggleindex == 3">
                                            <hr class="text-dark">
                                            <span class="text-dark">
                                                Yes. Fedshipment provides international shipping services to multiple countries and assists with customs documentation and clearance processes where required.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="faq-container">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark fw-bold">Can I schedule a package pickup?</span>
                                            <span @click="togglecontroller.FaqToggle(4)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 21q-.425 0-.712-.288T11 20v-7H4q-.425 0-.712-.288T3 12t.288-.712T4 11h7V4q0-.425.288-.712T12 3t.713.288T13 4v7h7q.425 0 .713.288T21 12t-.288.713T20 13h-7v7q0 .425-.288.713T12 21"/></svg>
                                            </span>
                                        </div>

                                        <div class="faq-contents" v-if="togglecontroller.faqtoggleindex == 4">
                                            <hr class="text-dark">
                                            <span class="text-dark">
                                                Absolutely. You can schedule a pickup from your home, office, or warehouse, and our courier team will collect your shipment at the selected time.
                                            </span>
                                        </div>
                                    </div>


                                    <div class="faq-container">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark fw-bold">What items can I ship with Fedshipment?</span>
                                            <span @click="togglecontroller.FaqToggle(5)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 21q-.425 0-.712-.288T11 20v-7H4q-.425 0-.712-.288T3 12t.288-.712T4 11h7V4q0-.425.288-.712T12 3t.713.288T13 4v7h7q.425 0 .713.288T21 12t-.288.713T20 13h-7v7q0 .425-.288.713T12 21"/></svg>
                                            </span>
                                        </div>

                                        <div class="faq-contents" v-if="togglecontroller.faqtoggleindex == 5">
                                            <hr class="text-dark">
                                            <span class="text-dark">
                                                You can ship documents, parcels, business goods, e-commerce products, and commercial freight. Restricted or prohibited items may not be accepted based on shipping regulations.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="faq-container">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark fw-bold">How are shipping costs calculated?</span>
                                            <span @click="togglecontroller.FaqToggle(6)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 21q-.425 0-.712-.288T11 20v-7H4q-.425 0-.712-.288T3 12t.288-.712T4 11h7V4q0-.425.288-.712T12 3t.713.288T13 4v7h7q.425 0 .713.288T21 12t-.288.713T20 13h-7v7q0 .425-.288.713T12 21"/></svg>
                                            </span>
                                        </div>

                                        <div class="faq-contents" v-if="togglecontroller.faqtoggleindex == 6">
                                            <hr class="text-dark">
                                            <span class="text-dark">
                                                Shipping costs are based on package weight, dimensions, pickup and destination locations, delivery speed, and any additional services such as insurance.
                                            </span>
                                        </div>
                                    </div>


                                    <div class="faq-container">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark fw-bold">Is my shipment insured?</span>
                                            <span @click="togglecontroller.FaqToggle(7)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 21q-.425 0-.712-.288T11 20v-7H4q-.425 0-.712-.288T3 12t.288-.712T4 11h7V4q0-.425.288-.712T12 3t.713.288T13 4v7h7q.425 0 .713.288T21 12t-.288.713T20 13h-7v7q0 .425-.288.713T12 21"/></svg>
                                            </span>
                                        </div>

                                        <div class="faq-contents" v-if="togglecontroller.faqtoggleindex == 7">
                                            <hr class="text-dark">
                                            <span class="text-dark">
                                                Yes. Optional shipment insurance is available to provide additional protection for valuable packages during transit.
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