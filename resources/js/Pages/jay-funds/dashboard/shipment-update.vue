<script lang="ts" setup>
import headers from '../../components/headers.vue';
import Footer from '../../components/footer.vue';
import { useToggleBurger } from '../../reactive-component/toggle-burger';
import General_ads_info from '../../components/general_ads_info.vue';
import { useAuthController } from '../../reactive-component/auth-controller';
import { Link, usePage } from '@inertiajs/vue3';
import { Toaster } from 'vue-sonner';
import Aside from '../components/aside.vue';
import topHeader from '../components/top-header.vue';
import { useGeneralTable } from '../../reactive-component/general-table';
import { onMounted, watch } from 'vue';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const togglecontroller = useToggleBurger();
const auth_controller = useAuthController();
const generaltable = useGeneralTable();
const pages = usePage();
import debounce from 'lodash-es/debounce';
const debouncedFetch = debounce(fetchWithParams, 400);
const shipmentUpdates = (pages.props?.shipmentUpdates as any) || [];

const reference = (pages.props?.reference as any);

function fetchWithParams() {
  const params = {
    page: generaltable.currentPage,
    per_page: generaltable.rowsPerPage,
    tabselect: generaltable.tabselect.trim() || undefined,
    search: generaltable.searchQuery.trim() || undefined,
  };

  generaltable.fetchData(async () => {
    return await auth_controller.ShipmentHistory(pages.props?.csrf_token, params);
  });
}

watch(
  [
    () => generaltable.currentPage,
    () => generaltable.rowsPerPage,
    () => generaltable.searchQuery,
    () => generaltable.tabselect,
  ],
  (newValues, oldValues) => {
    // Reset page only when rowsPerPage or search changes
    if (newValues[1] !== oldValues[1] || newValues[2] !== oldValues[2]) {
      generaltable.currentPage = 1;
      generaltable.changeValueState?.();
    }
    if (newValues[2] !== oldValues[2]) {
      debouncedFetch();
    } else {
      fetchWithParams();
    }
  },
  { deep: true }
);

onMounted(() => {
  fetchWithParams();
});


</script>

<template>
    
    <div>
        <Toaster position="top-right"/>
        <header>
            <title>FedShipment | Shipment</title>
        </header>
        <div class="nix-main">

            <div class="blur-container" v-if="togglecontroller.indexchange">
                <div class="blur-context-container-min p-3">
                     <div class="mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="fw-bold fs-3">Location Update</span>
                            <div class="d-flex pointer justify-content-end" @click="togglecontroller.ToggleEventChange">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12c0-4.714 0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464C22 4.93 22 7.286 22 12s0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12Z"/><path stroke-linecap="round" d="m14.5 9.5l-5 5m0-5l5 5"/></g></svg>
                            </div>
                        </div>
                        <div class="p-3 text-center d-flex flex-column gap-1">
                            <div class="text-start mb-1 fs-5">
                            </div>
    
                            <div class="d-flex flex-column gap-2">
                                <div class="input-label-text">
                                    <label for="" class="d-flex justify-content-start w-100">Location (Current)</label>
                                    <input type="text"
                                    class="form-control-main py-4"
                                    v-model="auth_controller.location"
                                     placeholder="Address for current location">
                                     <div v-if="auth_controller.errors">
                                        <span class="text-danger d-flex justify-content-start w-100">
                                            {{ (auth_controller.errors as any).location?.[0] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="input-label-text">
                                    <label for="" class="d-flex justify-content-start w-100">Next Stop</label>
                                    <input type="text"
                                    class="form-control-main py-4"
                                    v-model="auth_controller.nextstop"
                                     placeholder="Address for next stop">
                                     <div v-if="auth_controller.errors">
                                        <span class="text-danger d-flex justify-content-start w-100">
                                            {{ (auth_controller.errors as any).location?.[0] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-label-text">
                                        <label for="" class="d-flex justify-content-start w-100">Description</label>
                                        <input type="text"
                                        class="form-control-main py-4"
                                        v-model="auth_controller.description"
                                         placeholder="Description">
                                         <div v-if="auth_controller.errors">
                                            <span class="text-danger d-flex justify-content-start w-100">
                                                {{ (auth_controller.errors as any).description?.[0] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <select name="" v-model="auth_controller.status_report" class="form-select py-4">
                                        <option value="picked_up">PickUp</option>
                                        <option value="in_transit">in_transit</option>
                                        <!-- <option value="checkpoint">checkpoint</option> -->
                                        <option value="arrived">Arrived</option>
                                        <option value="out_for_delivery">Out For Delivery</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                    <div v-if="auth_controller.errors">
                                        <span class="text-danger d-flex justify-content-start w-100">
                                            {{ (auth_controller.errors as any).status?.[0] }}
                                        </span>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                     </div>
    
                     <div class="d-flex justify-content-end gap-2 mb-4">
                        <button class="action-stats-button text-center py-3 w-100" @click="auth_controller.UpdateShipment(pages.props.csrf_token as string, reference)"
                            :class="{'bg-main-button-disabled' : auth_controller.updateshipmentloader}"
                            :disabled="auth_controller.updateshipmentloader">
                            <template v-if="auth_controller.updateshipmentloader">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from EOS Icons by SUSE UX/UI team - https://gitlab.com/SUSE-UIUX/eos-icons/-/blob/master/LICENSE --><path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5"/><path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z"><animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate"/></path></svg>
                            Loading
                            </template>
                            <template v-else><span class="fw-bold fs-6">Update Location.</span></template>
                        </button>
                     </div>
    
    
                </div>
            </div>

            
            <div class="main-body-flex">
                <Aside :navtoggle="togglecontroller"/>
                <topHeader :toggle="togglecontroller"/>

                <div class="main-body-column">
                            <!-- Top Stats -->
                            <h4 class="fw-bold fs-4 mb-4">Shipment</h4>

                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <Link href="/jay-funds/dashboard/shipment" class="text-dark">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m9.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675t-.15-.75t.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388t.375.875t-.375.875z"/></svg>
                                    </span>
                                </Link>
                                <button class="action-stats-button" @click="togglecontroller.ToggleEventChange">
                                  Update Location           
                                </button>
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
                     </div>


        </div>
    </div>
</template>