<script lang="ts" setup>
import headers from '../components/headers.vue';
import { useToggleBurger } from '../reactive-component/toggle-burger';
import General_ads_info from '../components/general_ads_info.vue';
import { useAuthController } from '../reactive-component/auth-controller';
import { usePage } from '@inertiajs/vue3';
import { Toaster } from 'vue-sonner';
import Footer from '../components/footer.vue';

import { onMounted, onBeforeUnmount } from 'vue';
import * as THREE from 'three';

const AssetImage = (filename: any) => `/asset_images/${filename}`;
const togglecontroller = useToggleBurger();
const auth_controller = useAuthController();
const pages = usePage();
const shipmentUpdates = (pages.props?.shipmentUpdates as any) || [];
const shipment_info = (pages.props?.shipment_info as any) || [];

let animationId: number;
let renderer: THREE.WebGLRenderer | null = null;

const initThreeAnimation = () => {
    const container = document.getElementById('threejs-container-ANIMATION_3');
    if (!container) return;

    const width = container.clientWidth;
    const height = 400;

    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
    camera.position.z = 3;

    renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(width, height);
    renderer.setPixelRatio(window.devicePixelRatio);

    container.innerHTML = '';
    container.appendChild(renderer.domElement);

    // BOX
    const geometry = new THREE.BoxGeometry(1.5, 1, 1);

    const materials = [
        new THREE.MeshStandardMaterial({ color: 0xd2b48c }),
        new THREE.MeshStandardMaterial({ color: 0xd2b48c }),
        new THREE.MeshStandardMaterial({ color: 0xd2b48c }),
        new THREE.MeshStandardMaterial({ color: 0xd2b48c }),
        new THREE.MeshStandardMaterial({ color: 0xc19a6b }),
        new THREE.MeshStandardMaterial({ color: 0xc19a6b }),
    ];

    const box = new THREE.Mesh(geometry, materials);
    scene.add(box);

    // tape
    const tapeGeometry = new THREE.BoxGeometry(0.2, 0.01, 1.05);
    const tapeMaterial = new THREE.MeshStandardMaterial({ color: 0x555555 });
    const tape = new THREE.Mesh(tapeGeometry, tapeMaterial);
    tape.position.y = 0.51;
    box.add(tape);

    // lights
    scene.add(new THREE.AmbientLight(0xffffff, 0.6));

    const dirLight = new THREE.DirectionalLight(0xffffff, 0.8);
    dirLight.position.set(5, 5, 5);
    scene.add(dirLight);

    const animate = () => {
        animationId = requestAnimationFrame(animate);

        box.rotation.y += 0.01;
        box.rotation.x += 0.005;

        renderer?.render(scene, camera);
    };

    animate();

    const handleResize = () => {
        const w = container.clientWidth;
        const h = 400;

        renderer?.setSize(w, h);
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
    };

    window.addEventListener('resize', handleResize);

    onBeforeUnmount(() => {
        cancelAnimationFrame(animationId);
        window.removeEventListener('resize', handleResize);
        renderer?.dispose();
    });
};

onMounted(() => {
    initThreeAnimation();
});
</script>

<template>
<div>
    <Toaster position="top-right"/>

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

                    <!-- FULL LEFT SIDE (UNCHANGED DESIGN) -->
                    <div class="col-lg-6 col-12 mb-3">

                        <div class="call-border-card m-0 p-0">
                            <div class="card-grey-min">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column gap-1">
                                        <span>Shipment ID</span>
                                        <span class="fw-bold fs-3">{{shipment_info.tracking_code}}</span>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="bg-success-x badge-mask">{{ shipment_info.status}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="call-border-card">

                                <!-- LOCATION 1 -->
                                <div class="d-flex gap-3 mb-4">
                                    <div class="badge-mask"></div>

                                    <div class="d-flex flex-column gap-1">
                                        <span class="fs-6">Current Location</span>
                                        <span class="fs-4 fw-bold">{{shipment_info.current_location}}</span>
                                    </div>
                                </div>

                                <hr>

                                <!-- LOCATION 2 -->
                                <div class="d-flex gap-3 mb-4">
                                    <div class="badge-mask"></div>

                                    <div class="d-flex flex-column gap-1">
                                        <span class="fs-6">Next Stop</span>
                                        <span class="fs-4 fw-bold">{{shipment_info.next_stop}}</span>
                                    </div>
                                </div>

                                <!-- ROUTE PROGRESS (FIXED FLEX SHRINK) -->
                                <div class="d-flex flex-wrap justify-content-between w-100">
                                    <span>Route Progress</span>
                                    <span>{{shipment_info.progress}}% Complete</span>
                                </div>

                                <div class="progress mb-3" style="height:10px;">
                                    <div
                                        class="progress-bar bg-success"
                                        :style="{ width: shipment_info.progress + '%' }"
                                        ></div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between w-100">
                                    <span>{{shipment_info.origin}}</span>
                                    <span>{{shipment_info.destination}}</span>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- RIGHT 3D -->
                    <div class="col-lg-6 col-12">
                        <div class="call-border-card" style="height:400px;">
                            <div id="threejs-container-ANIMATION_3" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>


                <div class="card-outline">
                    <div class="call-border-card">

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <span class="fw-bold fs-5">Shipment History</span>
                            <span class="badge bg-light text-dark border">
                                {{ shipmentUpdates.length }} Updates
                            </span>
                        </div>
                    
                        <div class="timeline-wrapper">
                    
                            <div
                                v-for="(item,index) in shipmentUpdates"
                                :key="item.id"
                                class="timeline-item"
                            >
                    
                                <!-- line -->
                                <div
                                    v-if="index !== shipmentUpdates.length - 1"
                                    class="timeline-line"
                                ></div>
                    
                                <!-- icon -->
                                <div
                                    class="timeline-icon"
                                    :class="{
                                        'timeline-success': item.status === 'delivered'
                                    }"
                                >
                    
                                    <!-- Delivered -->

                                    <svg v-if="item.status === 'delivered'" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Huge Icons by Hugeicons - undefined --><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M21 7v5M3 7v10.161c0 1.383 1.946 2.205 5.837 3.848C10.4 21.67 11.182 22 12 22V11.355M15 19s.875 0 1.75 2c0 0 2.78-5 5.25-6"/><path d="M8.326 9.691L5.405 8.278C3.802 7.502 3 7.114 3 6.5s.802-1.002 2.405-1.778l2.92-1.413C10.13 2.436 11.03 2 12 2s1.871.436 3.674 1.309l2.921 1.413C20.198 5.498 21 5.886 21 6.5s-.802 1.002-2.405 1.778l-2.92 1.413C13.87 10.564 12.97 11 12 11s-1.871-.436-3.674-1.309M6 12l2 1m9-9L7 9"/></g></svg>
                                    <!-- Default -->

                                    <svg v-else xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 12.675L9.625 10.3q-.275-.275-.687-.275t-.713.275q-.3.3-.3.713t.3.712L11.3 14.8q.3.3.7.3t.7-.3l3.1-3.1q.3-.3.287-.7t-.312-.7q-.3-.275-.7-.288t-.7.288zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
                                 
                    
                                </div>
                    
                                <!-- content -->
                                <div class="timeline-content">
                                    <div class="fw-semibold">
                                        {{ item.title }}
                                    </div>

                                    {{ item.status }}
                    
                                    <small class="text-muted">
                                        {{ item.location }}
                                    </small>
                    
                                    <br>
                    
                                    <small class="text-muted">
                                        {{ item.created_at }}
                                    </small>
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