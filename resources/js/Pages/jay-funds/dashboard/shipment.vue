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
                            <span class="fw-bold fs-3">Create Shipment</span>
                            <div class="d-flex pointer justify-content-end" @click="togglecontroller.ToggleEventChange">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12c0-4.714 0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464C22 4.93 22 7.286 22 12s0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12Z"/><path stroke-linecap="round" d="m14.5 9.5l-5 5m0-5l5 5"/></g></svg>
                            </div>
                        </div>
                        <div class="p-3 text-center d-flex flex-column gap-1">
                            <div class="text-start mb-1 fs-5">
                              
                            </div>
    
                            <div class="d-flex flex-column gap-2">
                                <div class="input-label-text">
                                    <label for="" class="d-flex justify-content-start w-100">Title (Name Of Good)</label>
                                    <input type="text"
                                    class="form-control-main py-4"
                                    v-model="auth_controller.title"
                                     placeholder="Title">
                                     <div v-if="auth_controller.errors">
                                        <span class="text-danger d-flex justify-content-start w-100">
                                            {{ (auth_controller.errors as any).title?.[0] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-label-text">
                                            <label for="" class="d-flex justify-content-start w-100">Sender Name</label>
                                            <input type="text"
                                            class="form-control-main py-4"
                                            v-model="auth_controller.sender_name"
                                             placeholder="Sender Name">
                                             <div v-if="auth_controller.errors">
                                                <span class="text-danger d-flex justify-content-start w-100">
                                                    {{ (auth_controller.errors as any).sender_name?.[0] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="input-label-text">
                                            <label for="" class="d-flex justify-content-start w-100">Receiver Name</label>
                                            <input type="text"
                                            class="form-control-main py-4"
                                            v-model="auth_controller.receiver_name"
                                             placeholder="Receiver Name">
                                             <div v-if="auth_controller.errors">
                                                <span class="text-danger d-flex justify-content-start w-100">
                                                    {{ (auth_controller.errors as any).receiver_name?.[0] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-label-text">
                                            <label for="" class="d-flex justify-content-start w-100">Origin (Starting Address)</label>
                                            <input type="text"
                                            class="form-control-main py-4"
                                            v-model="auth_controller.origin"
                                             placeholder="Origin">
                                             <div v-if="auth_controller.errors">
                                                <span class="text-danger d-flex justify-content-start w-100">
                                                    {{ (auth_controller.errors as any).origin?.[0] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="input-label-text">
                                            <label for="" class="d-flex justify-content-start w-100">Destination (Receivers Address)</label>
                                            <input type="text"
                                            class="form-control-main py-4"
                                            v-model="auth_controller.destination"
                                             placeholder="Destination">
                                             <div v-if="auth_controller.errors">
                                                <span class="text-danger d-flex justify-content-start w-100">
                                                    {{ (auth_controller.errors as any).destination?.[0] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="input-label-text">
                                        <label for="" class="d-flex justify-content-start w-100">Delivery (Date)</label>
                                        <input type="date"
                                        class="form-control-main py-4"
                                        v-model="auth_controller.delivery"
                                         placeholder="Date">
                                         <div v-if="auth_controller.errors">
                                            <span class="text-danger d-flex justify-content-start w-100">
                                                {{ (auth_controller.errors as any).delivery?.[0] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                     </div>
    
    
                     <div class="d-flex justify-content-end gap-2 mb-4">
                        <button class="action-stats-button text-center py-3 w-100" @click="auth_controller.CreateShipment(pages.props.csrf_token as string)"
                            :class="{'bg-main-button-disabled' : auth_controller.shipmentloader}"
                            :disabled="auth_controller.shipmentloader">
                            <template v-if="auth_controller.shipmentloader">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from EOS Icons by SUSE UX/UI team - https://gitlab.com/SUSE-UIUX/eos-icons/-/blob/master/LICENSE --><path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5"/><path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z"><animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate"/></path></svg>
                            Loading
                            </template>
                            <template v-else><span class="fw-bold fs-6">Create Shipment.</span></template>
                        </button>
                     </div>
    
    
                </div>
            </div>

            
            <div class="main-body-flex">
                <Aside :navtoggle="togglecontroller"/>
                <topHeader :toggle="togglecontroller"/>

                <div class="main-body-column">
                            <!-- Top Stats -->
                            <h4 class="fw-bold fs-4 mb-4">Shipments</h4>
                            <div class="d-flex justify-content-end mb-5">
                                <button class="action-stats-button" @click="togglecontroller.ToggleEventChange">
                                  Create Shipment           
                                </button>
                            </div>

                            <div class="p-2 card-outline">
                                <div>
                                    <div class="table table-responsive">
                                     <div class="p-1">
                                         <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-column">
                                                <input type="text" class="form-control-x outline-0 py-2"
                                                v-model="generaltable.searchQuery"
                                                placeholder="Search...">
                                            </div>
            
                                            <!-- <div class="col-lg-6 col-12 d-none d-lg-block">
                                                <div class="d-flex justify-content-end">
                                                  <div class="d-flex gap-3 justify-content-end align-items-center">
                                                    <div class="d-flex gap-3">
                                                        <button class="border-reversed-background p-auto-padmax"
                                                        :class="{'active-black' : generaltable.tabselect == 'active'} "
                                                        @click="generaltable.tabselect = 'active'">
                                                            Active
                                                        </button>
                                    
                                                        <button class="border-reversed-background  p-auto-padmax"
                                                         :class="{'active-black' : generaltable.tabselect == 'pending'} "
                                                        @click="generaltable.tabselect = 'pending' ">
                                                           Pending
                                                        </button>
            
                                                        <button class="border-reversed-background  p-auto-padmax"
                                                        :class="{'active-black' : generaltable.tabselect == 'rejected'} "
                                                       @click="generaltable.tabselect = 'rejected' ">
                                                          Rejected
                                                       </button>
            
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-6 d-lg-none">
                                                <select name="" id="" class="form-select py-3" v-model="generaltable.tabselect">
                                                  <option value="active">Active</option>
                                                  <option value="pending">Pending</option>
                                                  <option value="rejected">Rejected</option>
                                                </select>
                                              </div> -->
                                            </div>
                                        </div>
                                     <hr>
            
                                     <div class="table-scroll-wrapper">
                                        <table class="table pointer custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Date_issued</th>
                                                    <th>Tracking Code</th>
                                                    <th>Title</th>
                                                    <th>Sender Name</th>
                                                    <th>Receiver Name</th>
                                                    <th>Origin</th>
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                    <th>Delivery Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-if="generaltable.isLoading">
                                                    <td colspan="6" class="text-center py-5">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Line Icons by Vjacheslav Trushkin - https://github.com/cyberalien/line-md/blob/master/license.txt --><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="18" d="M12 3c4.97 0 9 4.03 9 9"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="18;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path><path stroke-dasharray="60" d="M12 3c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9c0 -4.97 4.03 -9 9 -9Z" opacity=".3"><animate fill="freeze" attributeName="stroke-dashoffset" dur="1.2s" values="60;0"/></path></g></svg>
                                                       <p class="mt-2">Loading...</p>
                                                    </td>
                                                  </tr>
            
                                                <tr v-else v-for="item in (generaltable.reviewPagination as any)" :key="item.id">
                                                    <td>
                                                        <div>
                                                            {{ auth_controller.formattedDate(item.created_at) }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div>
                                                          {{ item.tracking_code }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                          {{ item.title }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                          {{ item.sender_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                          {{ item.receiver_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span>{{item.origin}}</span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div>
                                                            <span>{{item.destination}}</span>
                                                        </div>
                                                    </td>


                                                    <td>
                                                        <div>
                                                            <span>{{item.status}}</span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div>
                                                            <span>{{auth_controller.formattedDateWithTime(item.expected_delivery)}}</span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="dialog-grey pointer" @click="auth_controller.DeleteShipment(pages.props?.csrf_token as string, item.reference)">
                                                            <template v-if="auth_controller.deleteshipmentloader">Loading...</template>
                                                            <template v-else>
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE --><path fill="currentColor" d="m20.37 8.91l-1 1.73l-12.13-7l1-1.73l3.04 1.75l1.36-.37l4.33 2.5l.37 1.37zM6 19V7h5.07L18 11v8a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2m2 0h8v-6.8L10.46 9H8z"/></svg>
                                                                </span>
                                                            </template>
                                                        </div>
                                                    </td>


                                                    <td>
                                                        <Link :href="`/jay-funds/dashboard/shipment-update/${item.reference}`" class="text-decoration-none text-dark">
                                                            <div class="dialog-grey pointer">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M6.4 18L5 16.6L14.6 7H6V5h12v12h-2V8.4z"/></svg>
                                                                </span>
                                                            </div>
                                                        </Link>
                                                    </td>
                                                </tr>
            
                                                <tr v-if="generaltable.noResults && !generaltable.isLoading">
                                                    <td colspan="6" class="text-center py-5 text-muted">
                                                        No Information Found.
                                                      <br v-if="generaltable.searchQuery">
                                                      <small v-if="generaltable.searchQuery">(try a different search term)</small>
                                                    </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                    
                                   
                                    <div class="p-1">
                                        <div class="row gx-1 gy-1 align-items-center">
                                          <div class="col-lg-6 d-flex justify-content-start">
                                            <div class="d-flex gap-2 align-items-center">
                                        
                                              <select
                                                v-model="generaltable.rowsPerPage"
                                                class="form-select w-auto">
                                                <option v-for="num in generaltable.dropOption" :key="num" :value="num">
                                                  {{ num }}
                                                </option>
                                              </select>
                                        
                                              <span class="text-muted">
                                                Showing {{ generaltable.reviewPagination.length }} of {{ generaltable.serverData?.total || 0 }}
                                              </span>
                                        
                                            </div>
                                          </div>
                                        
                                          <div class="col-lg-6 d-flex justify-content-lg-end justify-content-start">
                                            <div class="d-flex gap-2">
                                        
                                              <button
                                                class="btn btn-outline-secondary btn-sm"
                                                :disabled="generaltable.currentPage === 1 || generaltable.isLoading"
                                                @click="generaltable.prevPage">
                                                Previous
                                              </button>
                                        
                                              <span class="align-self-center fw-medium">
                                                Page {{ generaltable.currentPage }} of {{ generaltable.totalPages }}
                                              </span>
                                        
                                              <button
                                                class="btn btn-outline-secondary btn-sm"
                                                :disabled="generaltable.currentPage >= generaltable.totalPages || generaltable.isLoading"
                                                @click="generaltable.nextPage">
                                                Next
                                              </button>
                                        
                                            </div>
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