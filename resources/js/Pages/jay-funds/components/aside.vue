<script lang="ts" setup>
 import { Link, usePage } from '@inertiajs/vue3';
import { useAuthController } from '../../reactive-component/auth-controller';
 const AssetImage = (filename: any) => `/asset_images/${filename}`;
 const LandingImage = (filename:string) => `/assets/landing_images/${filename}`;
 const pages = usePage();
 const auth_controller = useAuthController();

 const  {navtoggle} = defineProps<{
    navtoggle: any,
 }>();
 </script>
<template>
    <div>
        <div class="aside-container" :class="{'show' : navtoggle.navigationstatus}">
            <div class="aside-top-content w-100">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div class="home-icon-contain">
                        <div class="logo">
                            <img :src="AssetImage('fed-dark-logo.png')" width="100" class="img-fluid"  alt="_Logo_Image">
                        </div>
                    </div>
                    <div class="display-mobile-none pointer" @click="navtoggle.ToggleNavigationHolder">
                        <span class="bg-main-color">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" fill-rule="evenodd" d="M12 22c-4.714 0-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464C22 4.93 22 7.286 22 12s0 7.071-1.465 8.535C19.072 22 16.714 22 12 22M8.97 8.97a.75.75 0 0 1 1.06 0L12 10.94l1.97-1.97a.75.75 0 0 1 1.06 1.06L13.06 12l1.97 1.97a.75.75 0 1 1-1.06 1.06L12 13.06l-1.97 1.97a.75.75 0 1 1-1.06-1.06L10.94 12l-1.97-1.97a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="aside-y-auto-content" @click="navtoggle.ToggleNavigationHolder" >   
                <ul class="ul-flex">
                   <Link href="/jay-funds/dashboard/home" class="text-decoration-none text-dark">
                    <li class="li-flex-x" :class="{'active': $page.component.endsWith('home')}">
                        <div class="d-flex gap-2 align-items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12.204c0-2.289 0-3.433.52-4.381c.518-.949 1.467-1.537 3.364-2.715l2-1.241C9.889 2.622 10.892 2 12 2s2.11.622 4.116 1.867l2 1.241c1.897 1.178 2.846 1.766 3.365 2.715S22 9.915 22 12.203v1.522c0 3.9 0 5.851-1.172 7.063S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.212S2 17.626 2 13.725z"/><path stroke-linecap="round" d="M12 15v3"/></g></svg>
                            </span>
                            <span>Home</span>
                        </div>
                    </li>
                    </Link>

                   <Link href="/jay-funds/dashboard/shipment" class="text-decoration-none text-dark">
                    <li class="li-flex-x"  :class="{'active': $page.component.endsWith('shipment') || $page.component.endsWith('shipment-update')}" >
                        <div class="d-flex gap-2 align-items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 10c0-3.771 0-5.657 1.172-6.828S7.229 2 11 2h2c3.771 0 5.657 0 6.828 1.172S21 6.229 21 10v4c0 3.771 0 5.657-1.172 6.828S16.771 22 13 22h-2c-3.771 0-5.657 0-6.828-1.172S3 17.771 3 14z"/><path stroke-linecap="round" d="M8 10h8m-8 4h5"/></g></svg>
                            </span>
                            <span>Shipment</span>
                        </div>
                    </li>
                   </Link>


                   <!-- <Link href="/jay-funds/dashboard/history" class="text-decoration-none text-dark">
                    <li class="li-flex-x"  :class="{'active': $page.component.endsWith('history')}">
                        <div class="d-flex gap-2 align-items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"> Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ <g fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" d="M22 10.5V12c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2h1.5"/><path stroke-linecap="round" d="m7 14l1.797-2.156c.712-.855 1.068-1.282 1.536-1.282c.469 0 .825.427 1.537 1.282l.26.312c.712.855 1.068 1.282 1.537 1.282s.824-.427 1.536-1.282L17 10"/><circle cx="19" cy="5" r="3"/></g></svg>                           
                            </span>
                            <span>History</span>
                        </div>
                    </li>
                   </Link> -->


                    <!-- <Link href="/jay-funds/dashboard/settings" class="text-decoration-none text-dark">
                        <li class="li-flex-x"  :class="{'active': $page.component.endsWith('settings')
                        || $page.component.endsWith('notification_list') || $page.component.endsWith('payouts_lists')
                        || $page.component.endsWith('verification_setup')
                         }">
                            <div class="d-flex gap-2 align-items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"> Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ <g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M13.765 2.152C13.398 2 12.932 2 12 2s-1.398 0-1.765.152a2 2 0 0 0-1.083 1.083c-.092.223-.129.484-.143.863a1.62 1.62 0 0 1-.79 1.353a1.62 1.62 0 0 1-1.567.008c-.336-.178-.579-.276-.82-.308a2 2 0 0 0-1.478.396C4.04 5.79 3.806 6.193 3.34 7s-.7 1.21-.751 1.605a2 2 0 0 0 .396 1.479c.148.192.355.353.676.555c.473.297.777.803.777 1.361s-.304 1.064-.777 1.36c-.321.203-.529.364-.676.556a2 2 0 0 0-.396 1.479c.052.394.285.798.75 1.605c.467.807.7 1.21 1.015 1.453a2 2 0 0 0 1.479.396c.24-.032.483-.13.819-.308a1.62 1.62 0 0 1 1.567.008c.483.28.77.795.79 1.353c.014.38.05.64.143.863a2 2 0 0 0 1.083 1.083C10.602 22 11.068 22 12 22s1.398 0 1.765-.152a2 2 0 0 0 1.083-1.083c.092-.223.129-.483.143-.863c.02-.558.307-1.074.79-1.353a1.62 1.62 0 0 1 1.567-.008c.336.178.579.276.819.308a2 2 0 0 0 1.479-.396c.315-.242.548-.646 1.014-1.453s.7-1.21.751-1.605a2 2 0 0 0-.396-1.479c-.148-.192-.355-.353-.676-.555A1.62 1.62 0 0 1 19.562 12c0-.558.304-1.064.777-1.36c.321-.203.529-.364.676-.556a2 2 0 0 0 .396-1.479c-.052-.394-.285-.798-.75-1.605c-.467-.807-.7-1.21-1.015-1.453a2 2 0 0 0-1.479-.396c-.24.032-.483.13-.82.308a1.62 1.62 0 0 1-1.566-.008a1.62 1.62 0 0 1-.79-1.353c-.014-.38-.05-.64-.143-.863a2 2 0 0 0-1.083-1.083Z"/></g></svg>
                                </span>
                                <span>Settings</span>
                            </div>
                        </li>    
                    </Link> -->


                    <hr>

                    <div class="text-decoration-none text-dark" @click="auth_controller.LogOut(pages.props?.csrf_token as string)">
                        <li class="li-flex-x"  :class="{'active': $page.component.endsWith('logout')}">
                            <div class="d-flex gap-2 align-items-center" @click="navtoggle.Logout(pages.props?.csrf_token)">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" d="M14.945 1.25c-1.367 0-2.47 0-3.337.117c-.9.12-1.658.38-2.26.981c-.524.525-.79 1.17-.929 1.928c-.135.737-.161 1.638-.167 2.72a.75.75 0 0 0 1.5.008c.006-1.093.034-1.868.142-2.457c.105-.566.272-.895.515-1.138c.277-.277.666-.457 1.4-.556c.755-.101 1.756-.103 3.191-.103h1c1.436 0 2.437.002 3.192.103c.734.099 1.122.28 1.4.556c.276.277.456.665.555 1.4c.102.754.103 1.756.103 3.191v8c0 1.435-.001 2.436-.103 3.192c-.099.734-.279 1.122-.556 1.399s-.665.457-1.399.556c-.755.101-1.756.103-3.192.103h-1c-1.435 0-2.436-.002-3.192-.103c-.733-.099-1.122-.28-1.399-.556c-.243-.244-.41-.572-.515-1.138c-.108-.589-.136-1.364-.142-2.457a.75.75 0 1 0-1.5.008c.006 1.082.032 1.983.167 2.72c.14.758.405 1.403.93 1.928c.601.602 1.36.86 2.26.982c.866.116 1.969.116 3.336.116h1.11c1.368 0 2.47 0 3.337-.116c.9-.122 1.658-.38 2.26-.982s.86-1.36.982-2.26c.116-.867.116-1.97.116-3.337v-8.11c0-1.367 0-2.47-.116-3.337c-.121-.9-.38-1.658-.982-2.26s-1.36-.86-2.26-.981c-.867-.117-1.97-.117-3.337-.117z"/><path fill="currentColor" d="M15 11.25a.75.75 0 0 1 0 1.5H4.027l1.961 1.68a.75.75 0 1 1-.976 1.14l-3.5-3a.75.75 0 0 1 0-1.14l3.5-3a.75.75 0 1 1 .976 1.14l-1.96 1.68z"/></svg>
                                </span>
                                <span>LogOut</span>
                            </div>
                        </li>    
                    </div>

                </ul>
            </div>
        </div>
    </div>
</template>