<script lang="ts" setup>
import headers from './components/headers.vue';
import Footer from './components/footer.vue';
import { useToggleBurger } from './reactive-component/toggle-burger';
import General_ads_info from './components/general_ads_info.vue';
import { Link } from '@inertiajs/vue3';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/company/${filename}`;
const ServiceImages = (filename: any) => `/splashimage/${filename}`;
const togglecontroller = useToggleBurger();
</script>

<template>
    <div>
        <header>
            <title>FedShipment | Board Your Goods Far and Beyond</title>
        </header>
        <div class="nix-main">
            <headers/>
                <section class="nix-flex-container-all">
                    <div class="nix-main-content">
                        <div class="min-auto-flex">
                            <div class="row gx-1 gy-1 py-5 p-3">
                                <div class="col-lg-6 col-12">
                                    <div class="d-flex flex-column gap-3">
                                        <span class="fs-1 text-white">Reliable Shipping Solutions Across Cities, Countries & Continents.</span>
                                        <span class="text-white">
                                            Streamlining global trade with surgical precision. From last-mile delivery to international air frieight, we move your business forward.
                                        </span>
                                    </div>

                                    <div class="py-5">
                                        <Link href="/tracker" class="text-white text-decoration-none">
                                        <div class="nix-mid-button d-flex gap-2">                                          
                                            <span class="fw-bold text-white">Track Today</span>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                            </span>
                                        </div>
                                       </Link>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="position-relative z-1">
                                        <img :src="AssetImage('landing-page-cargo.png')" class="hero-main-image-cover" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- card rolling -->
                            <div class="nix-scroll-wrapper">
                                <div class="nix-card-overflow">
                            
                                    <!-- FIRST SET -->
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 5.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 6.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 7.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 8.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 9.png')" width="200" alt="">
                                    </div>
                            
                                    <!-- DUPLICATED SET -->
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 5.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 6.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 7.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 8.png')" width="200" alt="">
                                    </div>
                            
                                    <div class="nix-card-logos">
                                        <img :src="LogoImages('image 9.png')" width="200" alt="">
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="section-borde py-3 p-3 nix-main-backgroun ">
                   <div class="min-auto-flex">
                    <div class="d-flex justify-content-between align-items-center">
                        <div></div>
                        
                        <div class="d-flex gap-4">
                            <div class="nix-mini-rounded-grey" @click="togglecontroller.ScrollTestimonials('left')">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12t.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388t.375.875t-.375.875z"/></svg>
                                </span>
                            </div>
                            <div class="nix-mini-rounded-grey"  @click="togglecontroller.ScrollTestimonials('right')">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg> 
                                </span>
                            </div>
                        </div>
                    </div>
 
                     <div class="row gx-1 gy-1 py-5 p-1">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column gap-2 w-75">
                                <span class="fs-1 text-dark fw-bold">Holistic Transport & Logistics.</span>
                                <span>
                                    Our comprehensive logistics services are designed to handle every stage of your supply chain with precision. From freight forwarding and warehousing.
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 card-row">
                            <div class="card-row" :ref="(el) => (togglecontroller.testimonialSlider = el as HTMLElement)">
                                <div class="card-list-x-pricing" :style="{backgroundImage: `url(${ServiceImages('courier.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                    <div class="card-floating-right">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                        </span>
                                    </div>

                                    <div class="d-flex flex-column gap-1 card-floating-bottom w-75">
                                        <span class="fw-bold fs-3 text-white">Logistics Solutions</span>
                                        <span class="text-white">
                                            From pickup to final delivery, Fedshipment provides end-to-end logistics solutions designed to keep your goods moving efficiently. We streamline transportation, route planning, and shipment management to ensure timely and secure deliveries for businesses and individuals.

                                        </span>
                                    </div>
                                    <div class="overlay-auto-inset"></div>
                                </div>

                                <div class="card-list-x-pricing" :style="{backgroundImage: `url(${ServiceImages('cargos.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                    <div class="card-floating-right">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                        </span>
                                    </div>

                                    <div class="d-flex flex-column gap-1 card-floating-bottom w-75">
                                        <span class="fw-bold fs-3 text-white">Ocean Freight</span>
                                        <span class="text-white">
                                            Ship large volumes of cargo across international waters with confidence. Our ocean freight services offer cost-effective and reliable transportation solutions, supported by global carrier networks and end-to-end shipment visibility.
                                        </span>
                                    </div>
                                    <div class="overlay-auto-inset"></div>
                                </div>

                                <div class="card-list-x-pricing" :style="{backgroundImage: `url(${ServiceImages('freight.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                    <div class="card-floating-right">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                        </span>
                                    </div>

                                    <div class="d-flex flex-column gap-1 card-floating-bottom w-75">
                                        <span class="fw-bold fs-3 text-white">Air Freight</span>
                                        <span class="text-white">
                                            When speed matters, our air freight services ensure rapid and secure transportation of goods worldwide. Ideal for urgent shipments, high-value cargo, and time-sensitive deliveries.
                                        </span>
                                    </div>
                                    <div class="overlay-auto-inset"></div>
                                </div>


                                <div class="card-list-x-pricing" :style="{backgroundImage: `url(${ServiceImages('shipments.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                    <div class="card-floating-right">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                        </span>
                                    </div>

                                    <div class="d-flex flex-column gap-1 card-floating-bottom w-75">
                                        <span class="fw-bold fs-3 text-white">Warehouse Management</span>
                                        <span class="text-white">
                                            Optimize storage, inventory control, and order fulfillment through our modern warehouse management solutions. We help businesses maintain efficiency, visibility, and scalability across their supply chains.
                                        </span>
                                    </div>
                                    <div class="overlay-auto-inset"></div>
                                </div>


                                <div class="card-list-x-pricing" :style="{backgroundImage: `url(${ServiceImages('brokages.png')})`, backgroundSize: 'cover', backgroundPosition: 'center'}">
                                    <div class="card-floating-right">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 19v-9H3V8h11v11zm5-5V5H8V3h11v11z"/></svg>
                                        </span>
                                    </div>

                                    <div class="d-flex flex-column gap-1 card-floating-bottom w-75">
                                        <span class="fw-bold fs-3 text-white">Customs Brokerage</span>
                                        <span class="text-white">
                                            Simplify international trade with expert customs brokerage services. Our team manages documentation, compliance requirements, duties, and clearance procedures to ensure smooth border crossings.
                                        </span>
                                    </div>
                                    <div class="overlay-auto-inset"></div>
                                </div>
                                
                            </div>
                        </div>
                     </div>

                    </div>
                </section>
                

                <section class="section-border py-3 p-3 background-grey">
                    <div class="min-auto-flex">
                   
                     <div class="row gx-4 gy-1 py-5 p-1">
                        <div class="col-lg-6 col-12">
                            <div class="position-relative z-1">
                                <img :src="ServiceImages('service-image.png')" class="hero-main-image-cover" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="d-flex flex-column gap-3">
                                <span class="fs-1 text-dark">We Deliver Everywhere That Matters.</span>
                                <span class="text-dark">
                                    From local neighborhoods to international destinations, Fedshipments connects businesses and people across regions with a strong global delivery network.
                                </span>
                            </div>

                            <div class="py-5">
                                <Link href="/contact" class="text-decoration-none">
                                    <div class="nix-mid-button d-flex gap-2">
                                        <span class="fw-bold text-white">Contact Us</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
                                        </span>
                                    </div>
                                </Link>
                            </div>
                        </div>

                    </div>
                    </div>
                </section>

                <section class="section-border py-3 p-3 background-grey">
                    <div class="min-auto-flex">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div></div>
                        
                        <div class="d-flex gap-4">
                            <div class="nix-mini-rounded-grey" @click="togglecontroller.ScrollTestimonialsX('left')">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12t.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388t.375.875t-.375.875z"/></svg>
                                </span>
                            </div>

                            <div class="nix-mini-rounded-grey"  @click="togglecontroller.ScrollTestimonialsX('right')">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="15" height="15" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg> 
                                </span>
                            </div>
                        </div>
                    </div>
 
                     <div class="row gx-4 gy-1 py-5 p-1">
                        <div class="col-lg-12">
                            <span class="fs-3 ">Chosen By 5k Still Growing.</span>
                        </div>
                     </div>

                     <div class="card-row d-flex gap-4 overflow-auto scroll-smooth py-3" :ref="(el) => (togglecontroller.testimonialSliders = el as HTMLElement)">
                        <div class="card-list-x">
                            <div class="d-flex flex-column gap-2">
                              <div class="d-flex gap-2 mb-1 align-items-center">
                                <span>Sarah K.</span>
                              </div>
                          
                              <div class="d-flex flex-column gap-2 mb-3">
                                <span class="fw-bold">Fast Same-Day Delivery</span>
                                <span>
                                  Feds Shipment delivered my package within hours. The tracking was accurate and I could see every movement in real time. Very reliable service for urgent deliveries.
                                </span>
                              </div>
                          
                              <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="d-flex gap-1">
                                  <span v-for="i in 5" :key="i">
                                    <svg class="nix-warning-color" width="18" height="18" viewBox="0 0 24 24">
                                      <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                  </span>
                                </div>
                                <div>30/06/2026</div>
                              </div>
                            </div>
                          </div>

                          <div class="card-list-x">
                            <div class="d-flex flex-column gap-2">
                              <div class="d-flex gap-2 mb-1 align-items-center">
                                <span>Daniel M.</span>
                              </div>
                          
                              <div class="d-flex flex-column gap-2 mb-3">
                                <span class="fw-bold">International Shipping Experience</span>
                                <span>
                                  I shipped goods from Canada to the UK and everything went smoothly. Customs handling was well managed and I received updates at every stage of the journey.
                                </span>
                              </div>
                          
                              <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="d-flex gap-1">
                                  <span v-for="i in 5" :key="i">
                                    <svg class="nix-warning-color" width="18" height="18" viewBox="0 0 24 24">
                                      <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                  </span>
                                </div>
                                <div>12/05/2026</div>
                              </div>
                            </div>
                          </div>

                          <div class="card-list-x">
                            <div class="d-flex flex-column gap-2">
                              <div class="d-flex gap-2 mb-1 align-items-center">
                                <span>Grace T</span>
                              </div>
                          
                              <div class="d-flex flex-column gap-2 mb-3">
                                <span class="fw-bold">Business Logistics Support</span>
                                <span>
                                  We use Feds Shipment for our e-commerce deliveries. Their fulfillment and bulk delivery system has reduced delays and improved customer satisfaction significantly.
                                </span>
                              </div>
                          
                              <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="d-flex gap-1">
                                  <span v-for="i in 5" :key="i">
                                    <svg class="nix-warning-color" width="18" height="18" viewBox="0 0 24 24">
                                      <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                  </span>
                                </div>
                                <div>08/03/2026</div>
                              </div>
                            </div>
                          </div>

                          <div class="card-list-x">
                            <div class="d-flex flex-column gap-2">
                              <div class="d-flex gap-2 mb-1 align-items-center">
                                <span>Quando D</span>
                              </div>
                          
                              <div class="d-flex flex-column gap-2 mb-3">
                                <span class="fw-bold">Reliable Tracking System</span>
                                <span>
                                  The tracking system is one of the best I’ve used. I always know exactly where my shipment is and when it will arrive. Very transparent and professional.
                                </span>
                              </div>
                          
                              <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="d-flex gap-1">
                                  <span v-for="i in 5" :key="i">
                                    <svg class="nix-warning-color" width="18" height="18" viewBox="0 0 24 24">
                                      <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                  </span>
                                </div>
                                <div>21/01/2026</div>
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