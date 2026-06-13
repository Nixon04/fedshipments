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
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const togglecontroller = useToggleBurger();
const auth_controller = useAuthController();
const pages = usePage();
const generaltable = useGeneralTable();
const data = (pages.props?.data as any) || [];


import debounce from 'lodash-es/debounce';
import { useGeneralTable } from '../../reactive-component/general-table';
import { onMounted, watch } from 'vue';
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
            <title>FedShipment | Home Dashboard</title>
        </header>
        <div class="nix-main">
            <div class="main-body-flex">
                <Aside :navtoggle="togglecontroller"/>
                <topHeader :toggle="togglecontroller"/>

                <div class="main-body-column">
                    <div class="col-lg-12">
                        <div class="card-shadow">
                            <div class="bottom-grass-bottom">
                                <img :src="AssetImage('white_grass.png')" alt="">
                            </div>

                            <div class="d-flex justify-content-between p-2">
                                <span class="fw-bold fs-5">Overview</span>
                            </div>
                            
                            <div class="shadow-inner-board">
                                <div class="row gx-1 gy-1">

                                <div class="col-lg-4 col-12">
                                <div class="card-contents-fill">
                                    <div class="d-flex flex-column gap-3 space-gap-start">
                                        <span>Total Shipping</span>
                                        <span class="fs-2"> {{ data.total ?? 0 }}</span>
                                        <div :class="[Number(0) > 70 ? 'revenue-increase': 'revenue-decrease']">
                                            <span>{{ 0}} %</span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        

                                <div class="col-lg-4 col-12">
                                    <div class="card-contents-fill">
                                        <div class="d-flex flex-column gap-3 space-gap-start">
                                            <span>Transit</span>
                                            <span class="fs-2"> {{ data.in_transit ?? 0 }}</span>
                                            <div :class="[Number(0) > 70 ? 'revenue-increase': 'revenue-decrease']">
                                                <span>{{ 0}} %</span>
                                            </div>
                                        </div>
                                    </div>
                                 </div>


                                <div class="col-lg-4 col-12">
                                    <div class="card-contents-fill">
                                        <div class="d-flex flex-column gap-3 space-gap-start">
                                            <span>Transit</span>
                                            <span class="fs-2"> {{ data.delivered }}</span>
                                            <div :class="[Number(0) > 70 ? 'revenue-increase': 'revenue-decrease']">
                                                <span>{{ 0}} %</span>
                                            </div>
                                        </div>
                                    </div>
                                 </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    
                            <!-- Quick Actions -->
                            <div class="row g-3 mb-4">
                    
                                <div class="col-lg-12">
                                    <div class="call-border-card text-center">
                    
                                        <h5>Create Shipment</h5>
                    
                                        <p class="text-muted">
                                            Add new package
                                        </p>
                    
                                        <Link href="/jay-funds/dashboard/shipment">
                                            <button class="action-main-button">
                                                New Shipment
                                            </button>
                                        </Link>
                    
                                    </div>
                                </div>
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